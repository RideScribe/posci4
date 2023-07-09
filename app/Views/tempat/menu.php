<h1>
    Ini adalah halaman menu di meja <?= $meja['tempat'] ?>
</h1>

<ul>
    <?php foreach ($menu as $key => $val) : ?>
        <li><?= $val->item ?></li>
    <?php endforeach ?>
</ul>