<div class="container m-4">
    <div class="d-flex justify-content-end">
        <a href="<?= site_url('/user-form') ?>" class="btn btn-success mb-2">Agregar Usuario</a>
    </div>

    <?php
    if (session()->getFlashdata('msg')) {
        echo '<div class="alert alert-info">' . session()->getFlashdata('msg') . '</div>';
    }
    ?>

    <div class="mt-2">
        <table class="table table-bordered table-secondary table-hover" id="users-list">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Perfil</th>
                    <th>Baja</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($users)): ?>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= esc($user['id_usuario']) ?></td>
                            <td><?= esc($user['nombre']) ?></td>
                            <td><?= esc($user['email']) ?></td>
                            <td><?= esc($user['perfil_id']) ?></td>
                            <td><?= esc($user['baja']) ?></td>
                            <td>
                                <a href="<?= base_url('edit-view/' . $user['id_usuario']) ?>" class="btn btn-primary btn-sm">Editar</a>
                                <a href="<?= base_url('deletelogico/' . $user['id_usuario']) ?>" class="btn btn-danger btn-sm">Borrar</a>
                                <a href="<?= base_url('activar/' . $user['id_usuario']) ?>" class="btn btn-secondary btn-sm">Activar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">No hay usuarios registrados.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Librerías necesarias para DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function () {
        $('#users-list').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
            }
        });
    });
</script>
