<div class="container m-4" style="; color: #fff; border-radius: 10px; text-align: center;">
    <div class="d-flex justify-content-end">
        <a href="<?= site_url('/user-form') ?>" class="btn" 
           style="background-color: #ffdd57; color: #000; border: 1px solid #000; margin-bottom: 10px;">
            Agregar Usuario
        </a>
    </div>

    <?php if (session()->getFlashdata('msg')): ?>
        <div style="background-color: #ffdd57; color: #000; padding: 10px; border-radius: 5px;">
            <?= session()->getFlashdata('msg') ?>
        </div>
    <?php endif; ?>

    <div class="mt-2" style=  "margin-bottom: 20%; margin-left: 30%">
        <table id="users-list" class="table" 
               style="background-color: #111; color: #fff; border: 1px solid #ffdd57;">
            <thead style="background-color: #222; color: #ffdd57;">
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
                        <tr style="border-bottom: 1px solid #ffdd57;">
                            <td><?= esc($user['id_usuario']) ?></td>
                            <td><?= esc($user['nombre']) ?></td>
                            <td><?= esc($user['email']) ?></td>
                            <td><?= esc($user['perfil_id']) ?></td>
                            <td><?= esc($user['baja']) ?></td>
                            <td>
                                <a href="<?= base_url('edit-view/' . $user['id_usuario']) ?>" 
                                   class="btn btn-sm" 
                                   style="background-color: #fff; color: #000; border: 1px solid #000;">
                                   Editar
                                </a>
                                <a href="<?= base_url('deletelogico/' . $user['id_usuario']) ?>" 
                                   class="btn btn-sm" 
                                   style="background-color: #ff4d4d; color: #fff; border: none;">
                                   Borrar
                                </a>
                                <a href="<?= base_url('activar/' . $user['id_usuario']) ?>" 
                                   class="btn btn-sm" 
                                   style="background-color: #ffdd57; color: #000; border: 1px solid #000;">
                                   Activar
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center" style="color: #ffdd57;">
                            No hay usuarios registrados.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
