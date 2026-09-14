<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_bdv extends CI_Controller {
    
    private $afiliado = '73002974';
    private $clave = '4k0DpHbn';
    
    public function __construct() {
        parent::__construct();
        require_once(APPPATH . 'libraries/ipg2-bdv.php');
    }
    
    /**
     * Detecta dinámicamente qué clase está disponible en la librería
     * (IpgBdv o IpgBdv2) para evitar errores "Class not found"
     */
    private function getPaymentProcess() {
      if (class_exists('IpgBdv2')) {
            return new IpgBdv2($this->afiliado, $this->clave);
        } else {
            throw new Exception('No se encontró la clase IpgBdv ni IpgBdv2 en la librería ipg2-bdv.php');
        }
    }
    
    /**
     * Prueba de conexión BDV - Persona Natural
     */
    public function index() {
        echo "<h1>🧪 Prueba BDV - Persona Natural</h1>";
        echo "<hr>";
        
        echo "<h3>Credenciales:</h3>";
        echo "Afiliado: " . $this->afiliado . "<br>";
        echo "Clave: " . str_repeat('*', 8) . "<br>";
        echo "<hr>";
        
        $Payment = null;
        
        try {
            $PaymentProcess = $this->getPaymentProcess();
            
            // ================================================
            // CREAR SOLICITUD DE PRUEBA - PERSONA NATURAL
            // ================================================
            $Payment = new IpgBdvPaymentRequest();
            $Payment->idLetter = 'V';
            $Payment->idNumber = '17141072';          // ✅ Cédula válida de la lista de pruebas
            $Payment->amount = 100;
            $Payment->currency = 1;                  // 1 = Bolívar (según mensaje de error BDV)
            $Payment->reference = 'TEST_PN_' . date('YmdHis');
            $Payment->title = 'Prueba BDV - Persona Natural';
            $Payment->description = 'Prueba de integración BDV con FENFMP';
            $Payment->email = 'tecnologia@enf.edu.ve';
            $Payment->cellphone = '04121234567';
            
            // ✅ CORREGIDO: incluir el placeholder {ID} para que BDV devuelva el token
            $Payment->urlToReturn = base_url() . 'test_bdv/confirmacion?token={ID}';
            
            // ✅ IMPORTANTE: Inicializar RIF aunque sea persona natural (evita null en el JSON)
            $Payment->rifLetter = '';
            $Payment->rifNumber = '';
            
            echo "<h3>📤 Enviando solicitud...</h3>";
            echo "<pre>";
            echo "Cédula: V-" . $Payment->idNumber . "\n";
            echo "Monto: Bs. " . number_format($Payment->amount, 2, ',', '.') . "\n";
            echo "Moneda: " . $Payment->currency . " (1=Bs, 2=USD)\n";
            echo "Referencia: " . $Payment->reference . "\n";
            echo "URL Retorno: " . $Payment->urlToReturn . "\n";
            echo "</pre>";
            
            $response = $PaymentProcess->createPayment($Payment);
            
            // ================================================
            // MOSTRAR RESPUESTA DETALLADA
            // ================================================
            echo "<h3>📥 Respuesta BDV:</h3>";
            echo "<pre>";
            print_r($response);
            echo "</pre>";
            
            if ($response->success == true && $response->responseCode == 0) {
                echo "<p style='color:green;font-size:18px;'>✅ ¡Prueba exitosa!</p>";
                echo "<strong>Payment ID:</strong> " . $response->paymentId . "<br>";
                echo "<strong>URL de Pago:</strong> <a href='" . $response->urlPayment . "' target='_blank' style='color:#003366;'>" . $response->urlPayment . "</a><br>";
                echo "<br><a href='" . $response->urlPayment . "' target='_blank' style='display:inline-block;padding:10px 20px;background:#28a745;color:white;text-decoration:none;border-radius:5px;'>🔗 Ir a Pagar</a>";
            } else {
                // ================================================
                // MANEJO DETALLADO DE ERRORES
                // ================================================
                $this->mostrar_error($response, $Payment);
            }
            
        } catch (Exception $e) {
            echo "<p style='color:red;'>❌ Excepción: " . $e->getMessage() . "</p>";
            echo "<p>En " . $e->getFile() . " línea " . $e->getLine() . "</p>";
        }
    }
    
    /**
     * Prueba para Persona Jurídica
     */
    public function juridico() {
        echo "<h1>🧪 Prueba BDV - Persona Jurídica</h1>";
        echo "<hr>";
        
        echo "<h3>Credenciales:</h3>";
        echo "Afiliado: " . $this->afiliado . "<br>";
        echo "Clave: " . str_repeat('*', 8) . "<br>";
        echo "<hr>";
        
        $Payment = null;
        
        try {
            $PaymentProcess = $this->getPaymentProcess();
            
            // ================================================
            // CREAR SOLICITUD DE PRUEBA - PERSONA JURÍDICA
            // ================================================
            $Payment = new IpgBdvPaymentRequest();
            $Payment->idLetter = 'V';
            $Payment->idNumber = '17141072';          // ✅ Cédula del pagador (de la lista)
            $Payment->amount = 100.00;
            $Payment->currency = 0;                  // 0 = Bolívar
            $Payment->reference = 'TEST_PJ_' . date('YmdHis');
            $Payment->title = 'Prueba BDV - Persona Jurídica';
            $Payment->description = 'Prueba de integración BDV - Persona Jurídica';
            $Payment->email = 'test@fenfmp.edu.ve';
            $Payment->cellphone = '04121234567';
            
            // ✅ CORREGIDO: incluir el placeholder {ID}
            $Payment->urlToReturn = base_url() . 'test_bdv/confirmacion?token={ID}';
            
            // ================================================
            // DATOS DE PERSONA JURÍDICA (RIF)
            // ================================================
            $Payment->rifLetter = 'J';
            $Payment->rifNumber = '111111111';
            
            echo "<h3>📤 Enviando solicitud (Persona Jurídica)...</h3>";
            echo "<pre>";
            echo "Cédula del Pagador: V-" . $Payment->idNumber . "\n";
            echo "RIF: " . $Payment->rifLetter . "-" . $Payment->rifNumber . "\n";
            echo "Monto: Bs. " . number_format($Payment->amount, 2, ',', '.') . "\n";
            echo "Moneda: " . $Payment->currency . " (1=Bs, 2=USD)\n";
            echo "Referencia: " . $Payment->reference . "\n";
            echo "URL Retorno: " . $Payment->urlToReturn . "\n";
            echo "</pre>";
            
            $response = $PaymentProcess->createPayment($Payment);
            
            echo "<h3>📥 Respuesta BDV:</h3>";
            echo "<pre>";
            print_r($response);
            echo "</pre>";
            
            if ($response->success == true && $response->responseCode == 0) {
                echo "<p style='color:green;font-size:18px;'>✅ ¡Prueba exitosa!</p>";
                echo "<strong>Payment ID:</strong> " . $response->paymentId . "<br>";
                echo "<strong>URL de Pago:</strong> <a href='" . $response->urlPayment . "' target='_blank' style='color:#003366;'>" . $response->urlPayment . "</a><br>";
                echo "<br><a href='" . $response->urlPayment . "' target='_blank' style='display:inline-block;padding:10px 20px;background:#28a745;color:white;text-decoration:none;border-radius:5px;'>🔗 Ir a Pagar</a>";
            } else {
                $this->mostrar_error($response, $Payment);
            }
            
        } catch (Exception $e) {
            echo "<p style='color:red;'>❌ Excepción: " . $e->getMessage() . "</p>";
            echo "<p>En " . $e->getFile() . " línea " . $e->getLine() . "</p>";
        }
    }
    
    /**
     * Verificar estado de un pago por token
     */
    public function verificar() {
        $token = $this->input->get('token');
        if (empty($token)) {
            echo "❌ Token requerido";
            echo "<br><a href='" . base_url() . "test_bdv'>← Volver</a>";
            return;
        }
        
        try {
            $PaymentProcess = $this->getPaymentProcess();
            $response = $PaymentProcess->checkPayment($token);
            
            echo "<h1>🔍 Estado del Pago</h1>";
            echo "<hr>";
            
            echo "<h3>📋 Detalles:</h3>";
            echo "<pre>";
            print_r($response);
            echo "</pre>";
            
            if ($response->success == true && $response->status == 0) {
                echo "<p style='color:green;font-size:18px;'>✅ Pago confirmado!</p>";
                echo "<strong>Transacción ID:</strong> " . $response->transactionId . "<br>";
                echo "<strong>Fecha:</strong> " . $response->paymentDate . "<br>";
                echo "<strong>Código Autorización:</strong> " . $response->authorizationCode . "<br>";
            } elseif ($response->success == true) {
                echo "<p style='color:orange;font-size:18px;'>⏳ Pago pendiente (Status: " . $response->status . ")</p>";
                echo "Mensaje: " . ($response->responseMessage ?? 'Sin mensaje');
            } else {
                echo "<p style='color:red;font-size:18px;'>❌ Error: " . $response->responseMessage . "</p>";
                echo "Código: " . $response->responseCode;
            }
            
            echo "<br><br><a href='" . base_url() . "test_bdv'>← Volver a pruebas</a>";
            
        } catch (Exception $e) {
            echo "<p style='color:red;'>❌ Error: " . $e->getMessage() . "</p>";
        }
    }
    
    /**
     * Confirmación de pago (callback)
     */
    public function confirmacion() {
        $token = $this->input->get('token');
        $ref = $this->input->get('ref');
        
        echo "<h1>📩 Confirmación de Pago</h1>";
        echo "<hr>";
        echo "<strong>Token:</strong> " . ($token ?: 'No recibido') . "<br>";
        echo "<strong>Referencia:</strong> " . ($ref ?: 'No recibida') . "<br>";
        
        echo "<br><h3>Acciones:</h3>";
        if (!empty($token)) {
            echo "<a href='" . base_url() . "test_bdv/verificar?token=" . $token . "' style='display:inline-block;padding:8px 16px;background:#007bff;color:white;text-decoration:none;border-radius:5px;'>🔍 Verificar Estado</a>";
            echo " ";
        }
        echo "<a href='" . base_url() . "test_bdv' style='display:inline-block;padding:8px 16px;background:#6c757d;color:white;text-decoration:none;border-radius:5px;'>← Volver</a>";
    }
    
    // ================================================
    // FUNCIÓN AUXILIAR PARA MOSTRAR ERRORES
    // ================================================
    private function mostrar_error($response, $payment = null) {
        echo "<p style='color:red;font-size:16px;'>❌ Error: " . $response->responseMessage . "</p>";
        echo "<strong>Código:</strong> " . $response->responseCode . "<br>";
        
        // ================================================
        // DICCIONARIO DE ERRORES BDV
        // ================================================
        $errores = [
            1 => "Request NO válido, verifique el formato",
            2 => "La letra de la cédula es inválida (debe ser V, E o P)",
            3 => "El número de cédula es inválido",
            4 => "Moneda inválida (1=Bs, 2=USD)",
            5 => "El título es inválido",
            6 => "La referencia es inválida",
            7 => "El monto es inválido",
            8 => "Se superó el máximo de envíos de códigos",
            9 => "Pago no encontrado",
            12 => "Pago fuera de rango de fechas",
            13 => "Pago expirado",
            14 => "Instrumento de pago inválido",
            15 => "Compra Rechazada. Transacción Fallida",
            16 => "Excedido el número de intentos de verificación",
            17 => "Token de autenticación inválido",
            18 => "El teléfono es inválido",
            19 => "Código de seguridad de tarjeta inválido",
            21 => "Fecha de expiración inválida",
            22 => "Token de autenticación expirado",
            23 => "La descripción es inválida",
            24 => "Correo electrónico inválido",
            25 => "Afiliado no válido",
            26 => "No se encontró el token de autenticación",
            27 => "No se encontró el método de pago",
            29 => "Error enviando el token de autenticación",
            30 => "No se encontró el grupo de pago",
            31 => "No se encontró el método de autenticación",
            32 => "No se encontró la transacción solicitada",
            34 => "Token caducado",
            35 => "La letra del RIF es inválida",
            36 => "El número de RIF es inválido",
            99 => "Error en el servidor",
            401 => "Usuario y/o clave incorrectos",
            404 => "No se pudo conectar con el servidor BDV",
            500 => "Error en el servidor BDV"
        ];
        
        if (isset($errores[$response->responseCode])) {
            echo "<div style='background:#fff3cd;padding:10px;border-radius:5px;margin-top:10px;'>";
            echo "<strong>📖 Solución sugerida:</strong> " . $errores[$response->responseCode];
            echo "</div>";
        }
        
        // ================================================
        // ACCIONES SUGERIDAS SEGÚN CÓDIGO
        // ================================================
        if ($response->responseCode == 401) {
            echo "<div style='background:#f8d7da;padding:10px;border-radius:5px;margin-top:10px;'>";
            echo "⚠️ <strong>Verifica:</strong> Que el afiliado '{$this->afiliado}' y la clave sean correctos.";
            echo "</div>";
        } elseif ($response->responseCode == 404) {
            echo "<div style='background:#f8d7da;padding:10px;border-radius:5px;margin-top:10px;'>";
            echo "⚠️ <strong>Verifica:</strong> Conexión a internet y que la URL de BDV esté accesible.";
            echo "</div>";
        } elseif ($response->responseCode == 3 && $payment !== null) {
            echo "<div style='background:#f8d7da;padding:10px;border-radius:5px;margin-top:10px;'>";
            echo "⚠️ <strong>Verifica:</strong> Que la cédula {$payment->idNumber} esté en la lista de cédulas de prueba.";
            echo "</div>";
        } elseif ($response->responseCode == 4) {
            echo "<div style='background:#f8d7da;padding:10px;border-radius:5px;margin-top:10px;'>";
            echo "⚠️ <strong>Verifica:</strong> El valor de <code>currency</code>. Prueba con 1 (Bs) o 2 (USD).";
            echo "</div>";
        } elseif ($response->responseCode == 1) {
            echo "<div style='background:#f8d7da;padding:10px;border-radius:5px;margin-top:10px;'>";
            echo "⚠️ <strong>Verifica:</strong> Que todos los campos del request estén completos y con el tipo correcto.";
            echo "</div>";
        }
    }
}