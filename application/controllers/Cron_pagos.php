<?php
// application/controllers/Cron_bdv.php

class Cron_bdv extends CI_Controller {
    
    private $bdv_afiliado;
    private $bdv_clave;
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Registro_pago_model');
        $this->load->model('Materias_preinscrita_model');
        $this->load->model('Periodo_model');
        require_once(APPPATH . 'libraries/ipg2-bdv.php');
        
        $this->bdv_afiliado = $this->config->item('bdv_afiliado');
        $this->bdv_clave = $this->config->item('bdv_clave');
    }
    
    /**
     * Verificar pagos pendientes automáticamente
     * Ejecutar desde CRON cada 5 minutos
     */
    public function verificar_pendientes() {
        // Clave secreta para seguridad
        $token = $this->input->get('token');
        if ($token !== 'TU_TOKEN_SECRETO_CRON') {
            echo "Acceso denegado";
            return;
        }
        
        $periodo = $this->Periodo_model->PeriodoActivo();
        if (!$periodo) {
            echo "No hay período activo";
            return;
        }
        
        $pagos_pendientes = $this->Registro_pago_model->get_pagos_bdv_pendientes(20);
        $procesados = 0;
        
        foreach ($pagos_pendientes as $pago) {
            try {
                $PaymentProcess = new IpgBdv($this->bdv_afiliado, $this->bdv_clave);
                $response = $PaymentProcess->checkPayment($pago->token_bdv);
                
                if ($response->success == true && $response->status == 0) {
                    // Pago exitoso
                    $data = [
                        'status' => 1,
                        'transaction_id_bdv' => $response->transactionId,
                        'fecha_transferencia' => $response->paymentDate,
                        'quien_actualizo' => 0
                    ];
                    $this->Registro_pago_model->update($pago->id, $data);
                    
                    // Actualizar materias
                    $data_materias = [
                        'reg_pago' => 1,
                        'quien_actualizo' => 0,
                        'fecha_actualizacion' => date('Y-m-d H:i:s')
                    ];
                    $this->Materias_preinscrita_model->update_materia($pago->id_usuario, $periodo->id, $data_materias);
                    
                    $procesados++;
                    log_message('info', 'Pago BDV confirmado automáticamente - Usuario: ' . $pago->id_usuario . ' - Token: ' . $pago->token_bdv);
                }
            } catch (Exception $e) {
                log_message('error', 'Error en cron BDV: ' . $e->getMessage());
            }
        }
        
        echo "Procesados " . $procesados . " de " . count($pagos_pendientes) . " pagos pendientes";
    }
}