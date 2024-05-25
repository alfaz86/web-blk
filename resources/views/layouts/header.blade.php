<div class="jumbotron jumbotron-fluid position-relative overlay-bottom" style="margin-bottom: 90px;">
    <div class="container text-center d-flex align-items-center justify-content-center h-100">
        @if ($page == 'home')
            <h1 class="text-white display-1">BLK Komunitas Ponpes Darul Falah</h1>
        @else
            <h1 class="text-white display-3">{{ $title }}</h1>
            <div class="d-inline-flex text-white">
                <p class="m-0 text-uppercase"><a class="text-white" href="/">BERANDA</a></p>
                @foreach ($breadcrumbs as $item)
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">{{ $item }}</p>
                @endforeach
            </div>
        @endif
    </div>
</div>
