<h1>Algunos de los nuevos productos</h1>

<?php while ($prod = $productos->fetch_object()): ?>
    <div class="product">
        <img src="<?=BASE_URL?>uploads/<?=$prod->imagen?>" class="thumb2"/>
        <h2><?= $prod->nombre ?></h2>
        <p>$<?=sprintf('%0.2f', $prod->precio)?></p>
        <br/>
    </div>
<?php endwhile; ?>
