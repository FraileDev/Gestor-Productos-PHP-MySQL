<h1>Gestionar productos</h1>

<a href="<?= BASE_URL ?>producto/create" class="button button-small">
    <i class="fas fa-plus"></i> Crear producto
</a>

<?php if (isset($_SESSION['producto']) && $_SESSION['producto'] == 'ok'): ?>
    <strong class="alert_green">El producto se creo correctamente</strong>
<?php elseif (isset($_SESSION['producto']) && $_SESSION['producto'] != 'ok'): ?>	
    <strong class="alert_red">El producto no pudo ser creado</strong>
<?php endif; ?>
<?php Utils::deleteSession('producto');?>
<?php if(isset($_SESSION['deleteProducto']) && $_SESSION['deleteProducto'] == 'ok'): ?>
	<strong class="alert_green">El producto se elimino correctamente</strong>
<?php elseif(isset($_SESSION['deleteProducto']) && $_SESSION['deleteProducto'] != 'ok'): ?>	
	<strong class="alert_red">El producto no pudo ser eliminado</strong>
<?php endif; ?>
<?php Utils::deleteSession('deleteProducto');?>    
<br>
<table>
    <tr>
        <th>Código</th>
        <th>Nombre del producto</th>
        <th>Precio</th>
        <th>Existencia</th>
        <th>Editar</th>
        <th>Eliminar</th>        
    </tr>
    <?php while ($prod = $productos->fetch_object()): ?>
        <tr>
            <td><?= $prod->codproducto; ?></td>
            <td><?= $prod->nombre; ?></td>
            <td>$ <?= number_format($prod->precio, 2, ".", ","); ?></td>
            <td><?= $prod->existencia; ?></td>
                        <td width="25px">
                <a href="<?= BASE_URL ?>producto/edit&id=<?= $prod->codproducto ?>">
                    <i class="far fa-edit facolor"></i>
                </a>
            </td>            
            <td width="25px">
                <a href="<?= BASE_URL ?>producto/delete&id=<?= $prod->codproducto ?>">
                    <i class="far fa-trash-alt facolor"></i>
                </a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>

