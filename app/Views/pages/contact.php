<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>THIS IS CONTACT PAGE</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt eos placeat fugit, dolor amet eum totam magni maiores repellat distinctio doloribus dignissimos! Veniam, labore neque dicta quia laboriosam est illo!</p>
            <?php foreach ($alamat as $key) : ?>
                <ul>
                    <li><?= $key['tipe']; ?></li>
                    <li><?= $key['alamat']; ?></li>
                    <li><?= $key['kota']; ?></li>
                </ul>
            <?php endforeach ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>