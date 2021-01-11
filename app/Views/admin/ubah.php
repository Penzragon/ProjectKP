<?= $this->extend('layout/templateAdmin'); ?>

<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Form Ubah Data</h1>
    <form action="/admin/update/<?= $product['id']; ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" name="slug" value="<?= $product['slug']; ?>">
        <input type="hidden" name="gambarLama" value="<?= $product['gambar']; ?>">
        <div class="form-group row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nama" name="nama" autofocus value="<?= $product['nama']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="harga" class="col-sm-2 col-form-label">Harga</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="harga" name="harga" value="<?= $product['harga']; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="harga" class="col-sm-2 col-form-label">Deskripsi</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"><?= $product['deskripsi']; ?></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
            <div class="col-sm-2">
                <img src="/img/<?= $product['gambar']; ?>" class="img-thumbnail img-preview">
            </div>
            <div class="col-sm-8">
                <div class="custom-file">
                    <input type="file" class="custom-file-input <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>" id="gambar" name="gambar" onchange="previewImg()">
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        <?= $validation->getError('gambar'); ?>
                    </div>
                    <label class="custom-file-label" for="gambar"><?= $product['gambar']; ?></label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Ubah Data</button>
            </div>
        </div>
    </form>
</div>
<!-- /.container-fluid -->

</div>
<?= $this->endSection(); ?>