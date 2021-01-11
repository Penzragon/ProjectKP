<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <img src="/img/Logo BIP.png" class="logo">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="navbar-nav nav navbar-right">
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('/'); ?>">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('/pages/about'); ?>">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('/product'); ?>">Product</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('/pages/contact'); ?>">Contact</a>
            </li>
        </ul>
    </div>
</nav>