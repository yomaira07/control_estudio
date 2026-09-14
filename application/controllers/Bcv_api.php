<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bcv_api extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->driver('cache', array('adapter' => 'file'));
    }
    
    /**
     * Obtener la tasa oficial del BCV
     * @return float
     */
    public function obtenerTasa() {
        // Intentar obtener de caché primero (1 hora de duración)
        $tasa = $this->cache->get('tasa_bcv');
        
        if (!$tasa) {
            $tasa = $this->consultarTasaBCV();
            
            // Guardar en caché por 1 hora
            if ($tasa > 0) {
                $this->cache->save('tasa_bcv', $tasa, 3600);
            }
        }
        
        // Si es una petición AJAX, devolver JSON
        if ($this->input->is_ajax_request()) {
            echo json_encode(array(
                'success' => true,
                'tasa' => $tasa,
                'fecha_actualizacion' => date('d/m/Y H:i:s')
            ));
            return;
        }
        
        return $tasa;
    }
    
    /**
     * Consultar la tasa desde la API del BCV
     * @return float
     */
    private function consultarTasaBCV() {
        // Opción 1: API del BCV (oficial)
        $url = "https://www.bcv.org.ve/api/tasa";
        
        // Opción 2: API alternativa (si la oficial falla)
        // $url = "https://api.exchangerate-api.com/v4/latest/USD";
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36');
        
        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        if ($http_code == 200 && $response) {
            $data = json_decode($response, true);
            
            // Verificar estructura de la respuesta
            if (isset($data['tasa_oficial']) && is_numeric($data['tasa_oficial'])) {
                return floatval($data['tasa_oficial']);
            }
            
            // Estructura alternativa
            if (isset($data['tasa']) && is_numeric($data['tasa'])) {
                return floatval($data['tasa']);
            }
        }
        
        // Si falla, intentar con fuente alternativa
        return $this->consultarTasaAlternativa();
    }
    
    /**
     * Fuente alternativa para obtener la tasa
     * @return float
     */
    private function consultarTasaAlternativa() {
        // Opción: API de ExchangeRate (solo como referencia)
        $url = "https://api.exchangerate-api.com/v4/latest/USD";
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        
        $response = curl_exec($ch);
        curl_close($ch);
        
        if ($response) {
            $data = json_decode($response, true);
            if (isset($data['rates']['VES'])) {
                return floatval($data['rates']['VES']);
            }
        }
        
        // Si todo falla, devolver tasa de respaldo
        return $this->obtenerTasaRespaldo();
    }
    
    /**
     * Tasa de respaldo en caso de fallo de todas las APIs
     * @return float
     */
    private function obtenerTasaRespaldo() {
        // Esta tasa debe actualizarse manualmente cuando cambie
        // O se puede almacenar en base de datos con fecha de actualización
        $tasa_respaldo = 56.20;
        
        // Intentar obtener de base de datos
        $this->load->model('Configuracion_model');
        $tasa_db = $this->Configuracion_model->getTasaRespaldo();
        
        if ($tasa_db) {
            return floatval($tasa_db);
        }
        
        return $tasa_respaldo;
    }
    
    /**
     * Obtener tasa en formato JSON para actualización AJAX
     */
    public function getTasaJson() {
        $tasa = $this->obtenerTasa();
        
        // Verificar si la tasa es válida
        if (!$tasa || $tasa <= 0) {
            $tasa = $this->obtenerTasaRespaldo();
        }
        
        echo json_encode(array(
            'success' => true,
            'tasa' => number_format($tasa, 4, '.', ''),
            'tasa_formateada' => number_format($tasa, 2, ',', '.'),
            'fecha_actualizacion' => date('d/m/Y H:i:s')
        ));
    }
    
    /**
     * Obtener la conversión de Ref a Bs
     * @param float $monto_ref Monto en referencias
     */
    public function convertir($monto_ref = 0) {
        $tasa = $this->obtenerTasa();
        $monto_bs = floatval($monto_ref) * $tasa;
        
        echo json_encode(array(
            'success' => true,
            'monto_ref' => floatval($monto_ref),
            'tasa' => $tasa,
            'monto_bs' => number_format($monto_bs, 2, ',', '.'),
            'monto_bs_raw' => $monto_bs
        ));
    }
}
?>