<div class="container" style="margin-top: 5%; margin-bottom: 20%;">
    <h3>Consultas recibidas</h3>
    <?php if (!empty($consultas)): ?>
        <table class="table table-bordered" >
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Mensaje</th>
                    <th>Fecha</th>
                    <th>¿Respondido?</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($consultas as $consulta): ?>
                    <tr>
                        <td><?= esc($consulta['nombre']) ?></td>
                        <td><?= esc($consulta['email']) ?></td>
                        <td><?= esc($consulta['telefono']) ?></td>
                        <td><?= esc($consulta['mensaje']) ?></td>
                        <td><?= esc($consulta['fecha']) ?></td>
                        <td><?= $consulta['respondido'] ? 'Sí' : 'No' ?></td>
                        <td>
                            <?php if (!$consulta['respondido']): ?>
                                <form action="<?= base_url('responder_consulta') ?>" method="post" style="display:inline;">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="id" value="<?= esc($consulta['id']) ?>">
                                    <button type="submit" class="btn btn-sm btn-primary">Responder</button>
                                </form>
                            <?php else: ?>
                                <span class="text-success">Sí</span>
                                <form action="<?= base_url('eliminar_consulta') ?>" method="post" style="display:inline;" onsubmit="return confirm('¿Seguro que querés eliminar esta consulta?');">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="id" value="<?= esc($consulta['id']) ?>">
                                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No hay consultas registradas.</p>
    <?php endif; ?>
</div>