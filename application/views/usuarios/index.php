<div class="row">
    <div class="col-lg-12">
        <h1><?= isset($titulo) ? $titulo : 'Título por defecto.' ?></h1>
        <hr>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div>
            <a href="<?= base_url("index.php/usuarios/agregar") ?>" class="btn btn-outline-primary">Agregar Usuario</a>
        </div>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Documento</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if(isset($usuarios) && count($usuarios)  > 0): ?>
                    <?php foreach($usuarios as $usuario): ?>
                        <tr>
                            <td><?= $usuario->id ?></td>
                            <td><?= ucfirst($usuario->nombre) ?></td>
                            <td><?= ucfirst($usuario->apellido) ?></td>
                            <td><?= $usuario->documento ?></td>
                            <td><?= $usuario->estado ?></td>
                            <td>
                                <a href="<?= base_url("index.php/usuarios/editar/{$usuario->id}") ?>" class="btn btn-outline-info">Editar</a>
                                <a href="#" class="btn btn-outline-danger" data-toggle="modal" data-target="#eliminar-usuario-<?= $usuario->id ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6"><p>No se encontraron registros.</p></td>
                    </tr>
                <?php endif ?>
            </tbody>
        </table>
    </div>
</div>


<!-- Modal para eliminar Usuarios -->

<?php foreach($usuarios as $usuario): ?>
    <div class="modal fade" id="eliminar-usuario-<?= $usuario->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Eliminar Usuario</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="usuario_id" value="<?= $usuario->id ?>">
                    <p class="text-danger">Está seguro que desea eliminar al usuario <?= $usuario->nombre ?> <?= $usuario->apellido ?></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-default" data-dismiss="modal">Cerrar</button>
                    <a href="<?= base_url("index.php/usuarios/eliminar/{$usuario->id}") ?>" class="btn btn-outline-danger"><span class="glyphicon glyphicon-trash"></span> Eliminar</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>