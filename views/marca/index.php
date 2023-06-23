<h1>Gestionar marcas</h1>

<a href="<?= BASE_URL ?>marca/create" class="button button-small">
    <i class="fas fa-plus"></i> Crear marca
</a>

<?php if (isset($_SESSION['marca']) && $_SESSION['marca'] == 'ok'): ?>
    <strong class="alert_green">La marca se creo correctamente</strong>
<?php elseif (isset($_SESSION['marca']) && $_SESSION['marca'] != 'ok'): ?>	
    <strong class="alert_red">La marca no pudo ser creada</strong>
<?php endif; ?>
<?php Utils::deleteSession('marca');?>
<?php if(isset($_SESSION['deleteMarca']) && $_SESSION['deleteMarca'] == 'ok'): ?>
	<strong class="alert_green">La marca se elimino correctamente</strong>
<?php elseif(isset($_SESSION['deleteMarca']) && $_SESSION['deleteMarca'] != 'ok'): ?>	
	<strong class="alert_red">La marca no pudo ser eliminada</strong>
<?php endif; ?>
<?php Utils::deleteSession('deleteMarca');?>
        
<br>        
<table class="table table-small">
    <tr>
        <th>Código</th>
        <th>Nombre de la marca</th>
        <th>Editar</th>
        <th>Eliminar</th>
    </tr>
    <?php while ($marca = $marcas->fetch_object()): ?>
        <tr>
            <td width="30px"><?=$marca->codmarca;?></td>
            <td><?= $marca->marca; ?></td>
            <td width="25px">
                <a href="<?= BASE_URL ?>marca/edit&id=<?= $marca->codmarca ?>">
                    <i class="far fa-edit facolor"></i>
                </a>
            </td>            
            <td width="25px">
                <a href="<?= BASE_URL ?>marca/delete&id=<?= $marca->codmarca ?>">
                    <i class="far fa-trash-alt facolor"></i>
                </a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>