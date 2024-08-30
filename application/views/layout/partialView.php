<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UMG | Test</title>

    <!-- Load CSS files -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css" rel="stylesheet">
    
    <!-- Load any additional CSS or Bootstrap here -->
    <?php $this->load->view('layout/header'); ?>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="<?= base_url('public/img/bootstrap-solid.svg'); ?>" width="30" height="30" class="d-inline-block align-top" alt="">
            Bootstrap
        </a>
    </nav>

    <div class="container-fluid" style="background-color: #ecf0f5;">
        <h2>Mi página con Bootstrap 4 y CodeIgniter 3</h2>
        <?php $this->load->view($vista) ?>
    </div>

    <!-- Load footer -->
    <?php $this->load->view('layout/footer'); ?>

    <!-- Load JS libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js"></script>

    <script>
    $(document).ready(function() {
        <?php if ($this->session->flashdata('swal')): ?>
            <?php if ($this->session->flashdata('swal') == 'insert_success'): ?>
                Swal.fire({
                    icon: 'success',
                    title: 'Registro creado',
                    text: 'El registro se creó satisfactoriamente.',
                    showConfirmButton: false,
                    timer: 2000
                });
            <?php elseif ($this->session->flashdata('swal') == 'insert_error'): ?>
                Swal.fire({
                    icon: 'error',
                    title: 'Error al crear',
                    text: 'Ocurrió un error al intentar crear el registro.',
                    showConfirmButton: false,
                    timer: 2000
                });
            <?php elseif ($this->session->flashdata('swal') == 'update_success'): ?>
                Swal.fire({
                    icon: 'success',
                    title: 'Registro actualizado',
                    text: 'El registro se actualizó satisfactoriamente.',
                    showConfirmButton: false,
                    timer: 2000
                });
            <?php elseif ($this->session->flashdata('swal') == 'update_error'): ?>
                Swal.fire({
                    icon: 'error',
                    title: 'Error al actualizar',
                    text: 'Ocurrió un error al intentar actualizar el registro.',
                    showConfirmButton: false,
                    timer: 2000
                });
            <?php elseif ($this->session->flashdata('swal') == 'delete_success'): ?>
                Swal.fire({
                    icon: 'success',
                    title: 'Registro eliminado',
                    text: 'El registro se eliminó satisfactoriamente.',
                    showConfirmButton: false,
                    timer: 2000
                });
            <?php elseif ($this->session->flashdata('swal') == 'delete_error'): ?>
                Swal.fire({
                    icon: 'error',
                    title: 'Error al eliminar',
                    text: 'Ocurrió un error al intentar eliminar el registro.',
                    showConfirmButton: false,
                    timer: 2000
                });
            <?php endif; ?>
        <?php endif; ?>

        // Delete confirmation using jQuery Confirm
        $('.delete-link').on('click', function(e) {
            e.preventDefault();
            var url = $(this).data('url');
            $.confirm({
                title: 'Confirmar eliminación',
                content: '¿Estás seguro que deseas eliminar este registro?',
                buttons: {
                    confirmar: {
                        text: 'Sí',
                        btnClass: 'btn-danger',
                        action: function(){
                            window.location.href = url;
                        }
                    },
                    cancelar: function () {
                        // nothing happens
                    }
                }
            });
        });
    });
    </script>

</body>

</html>
