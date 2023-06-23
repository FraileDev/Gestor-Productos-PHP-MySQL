<?php if(isset($prod) && is_object($prod)): ?>
	<h1>Editar producto <?=$prod->getDescripcion() ?></h1>
	<?php $url_action = BASE_URL."producto/save&id=".$prod->getCodcita() ; ?>
	
<?php else: ?>
	<h1>Crear nuevo producto</h1>
	<?php $url_action = BASE_URL."producto/save"; ?>
<?php endif; ?>

<div class="table-small">
    <form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">
        <label for="nombre">Nombre</label>
        <input type="text" style="width: 20em;" name="nombre" 
               value="<?=isset($prod) && is_object($prod) ? $prod->getDescripcion() : ''; ?>"
               autocomplete="off" required/>
        <label for="precio">Precio</label>
        <input type="text" style="width: 20em;" name="precio" 
               value="<?=isset($prod) && is_object($prod) ? $prod->getPrecio() : ''; ?>"
               autocomplete="off" required/>
        <label for="existencia">Existencia</label>
        <input type="text" style="width: 20em;" name="existencia" 
               value="<?=isset($prod) && is_object($prod) ? $prod->getTelefono() : ''; ?>"
               autocomplete="off" required/>
        <label for="categoria">Categoria</label>
        <select name="categoria" style="width: 20em;" required="required">
            <option value="">-- Seleccione una categoría --</option>
            <?php while ($cat = $categorias->fetch_object()): ?>
                <option value="<?= $cat->codcate; ?>" <?=isset($prod) && is_object($prod) && $cat->codcate == $prod->getCodigo() ? 'selected' : ''; ?>>
                    <?= $cat->categoria; ?>
                </option>
            <?php endwhile; ?>
        </select>
        <label for="marca">Marca</label>
        <select name="marca" style="width: 20em;" required="required">
            <option value="">-- Seleccione una marca --</option>
            <?php while ($marca = $marcas->fetch_object()): ?>
                <option value="<?= $marca->codmarca; ?>" <?=isset($prod) && is_object($prod) && $marca->codmarca == $prod->getCodservicio() ? 'selected' : ''; ?>>    
                    <?= $marca->marca ?>
                </option>
            <?php endwhile; ?>
        </select>
    	<label for="imagen">Imagen</label>
        <?php if(isset($prod) && is_object($prod) && !empty($prod->getImagen())): ?>
		<img src="<?=BASE_URL?>uploads/<?=$prod->getImagen()?>" class="thumb"/> 
        <?php endif; ?>
        <input type="file" name="imagen" accept="image/*" />
        <button name="submit" onclick="submit">
            <i class="far fa-save guardar"></i> Guardar
        </button>
    </form>
</div>
