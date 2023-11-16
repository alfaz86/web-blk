@if ($crud->hasAccess('show'))
    <a href="{{ url($crud->route.'/'.$entry->getKey().'/page') }}" class="btn btn-sm btn-link" target="_blank"><i class="la la-columns"></i> Lihat Berita</a>
@endif