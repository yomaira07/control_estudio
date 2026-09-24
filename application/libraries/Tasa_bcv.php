<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tasa_bcv {

    protected $CI;

    const SENIAT_URL = 'https://tcseniat.extra.bcv.org.ve/tcseniat/resources/TipoCambio/fechaOperacion';
    const COTIZAVE_URL = 'https://api.cotizave.com/v1/fx/rates/reference';
    const COTIZAVE_KEY = 'ctz_live_9euKABsLQnDaK5QANVdvF0nEtijBTm6pIrjrRr';
    const TASA_FALLBACK_DIAS = 3;

    public function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->database();
        log_message('info', '[Tasa_bcv] Librería inicializada.');
    }

    /**
     * Calcula el monto en VES a partir de un monto en USD.
     */
    public function calcular_monto_ves($monto_usd) {
        log_message('debug', '[Tasa_bcv][calcular_monto_ves] INICIO - monto_usd: ' . $monto_usd);

        if (!is_numeric($monto_usd) || $monto_usd < 0) {
            log_message('error', '[Tasa_bcv][calcular_monto_ves] Monto USD inválido: ' . print_r($monto_usd, true));
            return null;
        }

        $tasa = $this->obtener_tasa_para_pago();

        if ($tasa === null) {
            log_message('error', '[Tasa_bcv][calcular_monto_ves] No se pudo obtener una tasa de cambio válida.');
            return null;
        }

        $resultado = round($monto_usd * $tasa['venta'], 2);

        log_message('info', '[Tasa_bcv][calcular_monto_ves] OK - USD: ' . $monto_usd
            . ' x Venta: ' . $tasa['venta']
            . ' = VES: ' . $resultado
            . ' (fecha_operacion: ' . $tasa['fecha_operacion'] . ')');

        return $resultado;
    }

    /**
     * Orquesta la obtención de la tasa desde las distintas fuentes.
     */
    private function obtener_tasa_para_pago() {
    log_message('debug', '[Tasa_bcv][obtener_tasa_para_pago] INICIO - Orquestando fuentes de tasa.');

    $tasa = null;
    $fuente = null;

    // 1. PRIMERO: Intentar con la tasa vigente del día en BD local
    log_message('debug', '[Tasa_bcv][obtener_tasa_para_pago] Intentando fuente: BD_LOCAL (tasa vigente del día).');
    $tasa = $this->_leer_tasa_vigente_hoy();
    if ($tasa !== null) {
        $fuente = 'BD_LOCAL_HOY';
    }

    // 2. Si no hay tasa vigente en BD, intentar con SENIAT
    if ($tasa === null) {
        log_message('debug', '[Tasa_bcv][obtener_tasa_para_pago] No hay tasa vigente en BD hoy, intentando SENIAT.');
        $tasa = $this->_consultar_seniat();
        if ($tasa !== null) {
            $fuente = 'SENIAT';
        }
    }

    // 3. Si SENIAT falla, intentar con COTIZAVE
    if ($tasa === null) {
        log_message('debug', '[Tasa_bcv][obtener_tasa_para_pago] SENIAT falló, intentando COTIZAVE.');
        $tasa = $this->_consultar_cotizave();
        if ($tasa !== null) {
            $fuente = 'COTIZAVE';
        }
    }

    // 4. Si todo lo anterior falla, usar última tasa local como fallback (con validación de antigüedad)
    if ($tasa === null) {
        log_message('debug', '[Tasa_bcv][obtener_tasa_para_pago] COTIZAVE falló, intentando CACHE_LOCAL (fallback).');
        $tasa = $this->_leer_ultima_tasa_local();
        if ($tasa !== null) {
            $fuente = 'CACHE_LOCAL';
            log_message('debug', '[Tasa_bcv][obtener_tasa_para_pago] Usando tasa desde caché local como fallback.');
        }
    }

    // Si no hay absolutamente nada, retornar null
    if ($tasa === null) {
        log_message('error', '[Tasa_bcv][obtener_tasa_para_pago] Ninguna fuente devolvió una tasa válida.');
        return null;
    }

    log_message('info', '[Tasa_bcv][obtener_tasa_para_pago] Tasa obtenida desde: ' . $fuente
        . ' | fecha_operacion: ' . $tasa['fecha_operacion']
        . ' | compra: ' . $tasa['compra']
        . ' | venta: ' . $tasa['venta']);

    // Guardar en BD para auditoría y futuro caché
    // (solo si vino de fuentes externas; si ya vino de BD, no se persiste de nuevo)
    if ($fuente === 'SENIAT' || $fuente === 'COTIZAVE') {
        log_message('debug', '[Tasa_bcv][obtener_tasa_para_pago] Persistiendo tasa en BD (fuente: ' . $fuente . ').');
        $this->_guardar_tasa($tasa, $fuente);
    } else {
        log_message('debug', '[Tasa_bcv][obtener_tasa_para_pago] Tasa vino de ' . $fuente . ', no se persiste nuevamente.');
    }

    log_message('debug', '[Tasa_bcv][obtener_tasa_para_pago] FIN - Retornando tasa.');
    return $tasa;
}

/**
 * Lee la tasa vigente del día actual desde la BD local.
 * Retorna null si no existe una tasa registrada para hoy.
 */
private function _leer_tasa_vigente_hoy() {
    log_message('debug', '[Tasa_bcv][_leer_tasa_vigente_hoy] INICIO - Buscando tasa vigente del día en BD.');

    $hoy = date('Y-m-d');
    log_message('debug', '[Tasa_bcv][_leer_tasa_vigente_hoy] Fecha a buscar: ' . $hoy);

    $sql = "SELECT * FROM tasas_bcv 
            WHERE fecha_operacion = ? 
            ORDER BY consultado_en DESC 
            LIMIT 1";
    $query = $this->CI->db->query($sql, [$hoy]);

    if ($query->num_rows() === 0) {
        log_message('debug', '[Tasa_bcv][_leer_tasa_vigente_hoy] No hay tasa registrada para hoy (' . $hoy . ').');
        return null;
    }

    $row = $query->row_array();

    $resultado = [
        'fecha_operacion' => $row['fecha_operacion'],
        'fecha_valor'     => $row['fecha_valor'],
        'compra'          => (float) $row['tasa_compra'],
        'venta'           => (float) $row['tasa_venta'],
    ];

    log_message('info', '[Tasa_bcv][_leer_tasa_vigente_hoy] OK - Tasa vigente encontrada para hoy: '
        . 'compra=' . $resultado['compra'] . ' | venta=' . $resultado['venta']
        . ' | fuente original=' . $row['fuente']);

    return $resultado;
}

    /**
     * Consulta el servicio XML del SENIAT.
     */
    private function _consultar_seniat() {
        log_message('debug', '[Tasa_bcv][_consultar_seniat] INICIO - URL: ' . self::SENIAT_URL);

        try {
            $ch = curl_init(self::SENIAT_URL);
            curl_setopt_array($ch, [
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_TIMEOUT        => 8,
                CURLOPT_CONNECTTIMEOUT => 5,
                CURLOPT_SSL_VERIFYPEER => false, // Útil en entornos de desarrollo
            ]);
            $body = curl_exec($ch);
            $http = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $error = curl_error($ch);
            curl_close($ch);

            log_message('debug', '[Tasa_bcv][_consultar_seniat] Respuesta HTTP: ' . $http
                . ' | cURL error: ' . ($error ?: 'ninguno'));

            if ($http !== 200 || $body === false) {
                throw new Exception('Error cURL SENIAT: HTTP ' . $http . ' - ' . $error);
            }

            log_message('debug', '[Tasa_bcv][_consultar_seniat] Body recibido (primeros 200 chars): '
                . substr($body, 0, 200));

            libxml_use_internal_errors(true);
            $xml = simplexml_load_string($body);
            if ($xml === false) {
                foreach (libxml_get_errors() as $error) {
                    log_message('error', '[Tasa_bcv][_consultar_seniat] XML Error: ' . $error->message);
                }
                libxml_clear_errors();
                return null;
            }

            $nodo_usd = $xml->xpath('//MONEDA[@SWIFT="USD"]');
            if (empty($nodo_usd)) {
                log_message('error', '[Tasa_bcv][_consultar_seniat] No se encontró USD en la respuesta del SENIAT.');
                return null;
            }

            $moneda = $nodo_usd[0];
            $resultado = [
                'fecha_operacion' => (string) $xml['FECHAOPERACION'],
                'fecha_valor'     => (string) $xml->MERCADO['FECHAVALOR'],
                'compra'          => (float) $moneda->BDCOMPRABID,
                'venta'           => (float) $moneda->BDVENTAASK,
            ];

            log_message('info', '[Tasa_bcv][_consultar_seniat] OK - fecha_operacion: ' . $resultado['fecha_operacion'].'fecha_valor: ' . $resultado['fecha_valor']
                . ' | compra: ' . $resultado['compra']
                . ' | venta: ' . $resultado['venta']);

            return $resultado;

        } catch (Exception $e) {
            log_message('debug', '[Tasa_bcv][_consultar_seniat] SENIAT no disponible: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Consulta la API de Cotizave.
     */
    private function _consultar_cotizave() {
        log_message('debug', '[Tasa_bcv][_consultar_cotizave] INICIO - URL: ' . self::COTIZAVE_URL);

        try {
            $ch = curl_init(self::COTIZAVE_URL);
            curl_setopt_array($ch, [
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_TIMEOUT        => 5,
                CURLOPT_HTTPHEADER     => [
                    'X-API-Key: ' . self::COTIZAVE_KEY,
                    'Accept: application/json',
                ],
                CURLOPT_SSL_VERIFYPEER => false,
            ]);
            $body = curl_exec($ch);
            $http = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $error = curl_error($ch);
            curl_close($ch);

            log_message('debug', '[Tasa_bcv][_consultar_cotizave] Respuesta HTTP: ' . $http
                . ' | cURL error: ' . ($error ?: 'ninguno'));

            if ($http !== 200 || $body === false) {
                throw new Exception('Error cURL Cotizave: HTTP ' . $http . ' - ' . $error);
            }

            log_message('debug', '[Tasa_bcv][_consultar_cotizave] Body recibido (primeros 200 chars): '
                . substr($body, 0, 200));

            $data = json_decode($body, true);
            if (empty($data['mid']) || !is_numeric($data['mid'])) {
                throw new Exception('Respuesta de Cotizave inválida.');
            }

            $resultado = [
                'fecha_operacion' => date('Y-m-d'),
                'fecha_valor'     => date('Y-m-d'),
                'compra'          => (float) $data['mid'],
                'venta'           => (float) $data['mid'],
            ];

            log_message('info', '[Tasa_bcv][_consultar_cotizave] OK - fecha_operacion: ' . $resultado['fecha_operacion']
                . ' | compra: ' . $resultado['compra']
                . ' | venta: ' . $resultado['venta']);

            return $resultado;

        } catch (Exception $e) {
            log_message('debug', '[Tasa_bcv][_consultar_cotizave] Cotizave también falló: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Lee la última tasa guardada en la BD como último recurso.
     */
    private function _leer_ultima_tasa_local() {
        log_message('debug', '[Tasa_bcv][_leer_ultima_tasa_local] INICIO - Consultando BD local.');

        $sql = "SELECT * FROM tasas_bcv ORDER BY fecha_operacion DESC LIMIT 1";
        $query = $this->CI->db->query($sql);  // ← $this->CI->db, NO $this->db

        if ($query->num_rows() === 0) {
            log_message('error', '[Tasa_bcv][_leer_ultima_tasa_local] No hay registros en tasas_bcv.');
            return null;
        }

        $row = $query->row_array();
        log_message('debug', '[Tasa_bcv][_leer_ultima_tasa_local] Registro encontrado - fecha_operacion: '
            . $row['fecha_operacion'] . ' | venta: ' . $row['tasa_venta']);

        // Validar que la tasa no sea demasiado antigua
        $fecha_operacion = new DateTime($row['fecha_operacion']);
        $hoy = new DateTime();
        $diferencia = $hoy->diff($fecha_operacion)->days;

        log_message('debug', '[Tasa_bcv][_leer_ultima_tasa_local] Días de antigüedad: ' . $diferencia
            . ' | máximo permitido: ' . self::TASA_FALLBACK_DIAS);

        if ($diferencia > self::TASA_FALLBACK_DIAS) {
            log_message('error', '[Tasa_bcv][_leer_ultima_tasa_local] La tasa de caché local es demasiado antigua ('
                . $diferencia . ' días).');
            return null;
        }

        $resultado = [
            'fecha_operacion' => $row['fecha_operacion'],
            'fecha_valor'     => $row['fecha_valor'],
            'compra'          => (float) $row['tasa_compra'],
            'venta'           => (float) $row['tasa_venta'],
        ];

        log_message('info', '[Tasa_bcv][_leer_ultima_tasa_local] OK - Tasa local válida usada como fallback.');

        return $resultado;
    }

    /**
     * Guarda o actualiza la tasa en la base de datos.
     * Usa ON DUPLICATE KEY UPDATE de MySQL para respetar la clave única.
     */
    private function _guardar_tasa($tasa, $fuente) {
        log_message('debug', '[Tasa_bcv][_guardar_tasa] INICIO - Guardando tasa desde fuente: ' . $fuente);

        // Consulta SQL directa porque CI3 no tiene upsert nativo
        $sql = "INSERT INTO tasas_bcv 
                    (fecha_operacion, fecha_valor, tasa_compra, tasa_venta, fuente, consultado_en) 
                VALUES (?, ?, ?, ?, ?, NOW()) 
                ON DUPLICATE KEY UPDATE 
                    tasa_compra = VALUES(tasa_compra), 
                    tasa_venta = VALUES(tasa_venta), 
                    consultado_en = NOW()";

        $params = [
            $tasa['fecha_operacion'],
            $tasa['fecha_valor'],
            $tasa['compra'],
            $tasa['venta'],
            $fuente
        ];

        log_message('debug', '[Tasa_bcv][_guardar_tasa] Parámetros: ' . json_encode($params));

        $resultado = $this->CI->db->query($sql, $params);

        if ($resultado === false) {
            $db_error = $this->CI->db->error();
            log_message('error', '[Tasa_bcv][_guardar_tasa] Error al guardar tasa en BD: '
                . $db_error['message'] . ' (código: ' . $db_error['code'] . ')');
            return false;
        }

        $affected = $this->CI->db->affected_rows();
        log_message('info', '[Tasa_bcv][_guardar_tasa] OK - Tasa guardada/actualizada. Filas afectadas: ' . $affected
            . ' | fuente: ' . $fuente);

        return true;
    }
}