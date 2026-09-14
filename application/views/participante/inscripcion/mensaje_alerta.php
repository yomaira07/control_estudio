<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mensaje</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <?php
        $info        = $this->session->flashdata('info');
        $tipo        = $this->session->flashdata('tipo');
        $redirect    = $this->session->flashdata('redirect_url');
        
        if (empty($info))     { $info = 'Operación completada'; }
        if (empty($tipo))     { $tipo = 'info'; }
        if (empty($redirect)) { $redirect = base_url(); }
    ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: '<?php echo $tipo; ?>',
                title: 'Aviso',
                text: '<?php echo addslashes($info); ?>',
                confirmButtonText: 'Aceptar',
                confirmButtonColor: '#003366',
                allowOutsideClick: false,
                allowEscapeKey: false
            }).then(function(result) {
                if (result.isConfirmed) {
                    window.location.href = '<?php echo $redirect; ?>';
                }
            });
        });
    </script>
</body>
</html>