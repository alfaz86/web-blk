<div style="background-color: rgba(22, 104, 219, 0.875)">
    <div class="container mb-3 py-2">
        <div class="d-flex justify-content-between align-items-center text-white">
            <div class="text-left">
                <h1 class="text-white">{{ $title }}</h1>
            </div>
            <div class="d-inline-flex text-right">
                <p class="m-0"><a class="text-white" href="/">Beranda</a></p>
                @foreach ($breadcrumbs as $item)
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0">{{ $item }}</p>
                @endforeach
            </div>
        </div>
    </div>
</div>
