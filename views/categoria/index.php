<h1>Gestionar categorías</h1>

<a href="<?= BASE_URL ?>categoria/create" class="button button-small">
    <i class="fas fa-plus"></i> Crear categoría
</a>

<?php if (isset($_SESSION['categoria']) && $_SESSION['categoria'] == 'ok'): ?>
    <strong class="alert_green">La categoría se creo correctamente</strong>
<?php elseif (isset($_SESSION['categoria']) && $_SESSION['categoria'] != 'ok'): ?>	
    <strong class="alert_red">La categoría no pudo ser creada</strong>
<?php endif; ?>
<?php Utils::deleteSession('categoria');?>
<?php if(isset($_SESSION['deleteCategoria']) && $_SESSION['deleteCategoria'] == 'ok'): ?>
	<strong class="alert_green">La categoría se elimino correctamente</strong>
<?php elseif(isset($_SESSION['deleteCategoria']) && $_SESSION['deleteCategoria'] != 'ok'): ?>	
	<strong class="alert_red">La categoría no pudo ser eliminada</strong>
<?php endif; ?>
<?php Utils::deleteSession('deleteCategoria');?>
        
<br>        
<table class="table table-small">
    <tr>
        <th>Código</th>
        <th>Nombre de la categoría</th>
        <th>Editar</th>
        <th>Eliminar</th>
    </tr>
    <?php while ($cate = $categorias->fetch_object()): ?>
        <tr>
            <td width="30px"><?=$cate->codcate;?></td>
            <td><?= $cate->categoria; ?></td>
            <td width="25px">
                <a href="<?= BASE_URL ?>categoria/edit&id=<?= $cate->codcate ?>">
                    <i class="far fa-edit facolor"></i>
                </a>
            </td>            
            <td width="25px">
                <a href="<?= BASE_URL ?>categoria/delete&id=<?= $cate->codcate ?>">
                    <i class="far fa-trash-alt facolor"></i>
                </a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>


