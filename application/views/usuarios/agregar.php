<?= form_open() ?>

<div class="form-group">
    <label for="nombre" class="control-label">Nombre</label>
    <div>
        <input type="text" name="nombre" value="<?= set_value('nombre') ?>">
        <span class="help-block"><?= form_error('nombre') ?></span>
    </div>
</div>
<div class="form-group">
    <label for="apellido" class="control-label">Apellido</label>
    <div>
        <input type="text" name="apellido" value="<?= set_value('apellido') ?>">
        <span class="help-block"><?= form_error('apellido') ?></span>
    </div>
</div>
<div class="form-group">
    <label for="documento" class="control-label">Documento</label>
    <div>
        <input type="text" name="documento" value="<?= set_value('documento') ?>">
        <span class="help-block"><?= form_error('documento') ?></span>
    </div>
</div>

<a href="<?= base_url('index.php/usuarios') ?>" class="btn btn-outline-info"><< Volver</a>
<button type="submit" class="btn btn-outline-primary">Agregar Usuario</button>

<?= form_close() ?>
