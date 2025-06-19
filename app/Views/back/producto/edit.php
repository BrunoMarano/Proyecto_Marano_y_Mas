<div class="container mt-5">
    <h2 class="text-center mb-4">Modificar Producto</h2>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <form action="<?= base_url('modifica/' . $old['id']) ?>" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del producto</label>
            <input type="text" class="form-control" name="nombre" id="nombre" value="<?= esc($old['nombre']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="categoria_id" class="form-label">Categoría</label>
            <select name="categoria_id" id="categoria_id" class="form-control" required>
                <?php foreach($categorias as $cat): ?>
                    <option value="<?= $cat['id_categoria'] ?>" <?= $old['categoria_id'] == $cat['id_categoria'] ? 'selected' : '' ?>>
                        <?= esc($cat['descripcion']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="costo" class="form-label">Costo</label>
            <input type="number" step="0.01" class="form-control" name="costo" id="costo" value="<?= esc($old['costo']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" step="0.01" class="form-control" name="precio" id="precio" value="<?= esc($old['precio']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" class="form-control" name="stock" id="stock" value="<?= esc($old['stock']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="stock_min" class="form-label">Stock mínimo</label>
            <input type="number" class="form-control" name="stock_min" id="stock_min" value="<?= esc($old['stock_min']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen actual</label><br>
            <img src="<?= base_url('assets/uploads/' . $old['imagen']) ?>" width="150" alt="Imagen actual">
        </div>

        <div class="mb-3">
            <label for="imagen" class="form-label">Cambiar imagen</label>
            <input type="file" class="form-control" name="imagen" id="imagen">
        </div>

        <button type="submit" class="btn btn-primary">Guardar cambios</button>
        <a href="<?= base_url('crud_productos') ?>" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
