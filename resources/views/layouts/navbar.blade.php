<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0 px-lg-5">
        <a href="/" class="navbar-brand ml-lg-3">
            <h1 class="m-0 text-uppercase text-primary"><i class="fa fa-book-reader mr-3"></i>WEB BLK</h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between px-lg-3" id="navbarCollapse">
            <div class="navbar-nav mx-auto py-0">
                <a href="/" class="nav-item nav-link active">Beranda</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Profil</a>
                    <div class="dropdown-menu m-0">
                        <a href="#" class="dropdown-item">Struktur Organisasi</a>
                        <a href="#" class="dropdown-item">Visi dan Misi</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Media & Informasi</a>
                    <div class="dropdown-menu m-0">
                        <a href="#" class="dropdown-item">Video</a>
                        <a href="#" class="dropdown-item">Berita</a>
                    </div>
                </div>
                <a href="#" class="nav-item nav-link">Hubungi Kami</a>
                <a href="{{ route('registration.form') }}" class="nav-item nav-link">Pendaftaran</a>
            </div>
            <a href="{{ backpack_url('/login') }}" class="btn btn-primary py-2 px-4 d-none d-lg-block">Login</a>
        </div>
    </nav>
</div>
