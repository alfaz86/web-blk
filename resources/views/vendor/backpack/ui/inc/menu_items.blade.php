{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link text-error" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<li class="nav-separator">Modul</li>
<x-backpack::menu-item title="User" icon="la la-user" :link="backpack_url('user')" />
<x-backpack::menu-item title="Video" icon="la la-video" :link="backpack_url('video')" />
<x-backpack::menu-item title="Berita" icon="la la-newspaper" :link="backpack_url('news')" />
<x-backpack::menu-item title="Pendaftaran" icon="la la-clipboard-list" :link="backpack_url('registration')" />
<x-backpack::menu-item title="Profil" icon="la la-sitemap" :link="backpack_url('profile')" />

<li class="nav-separator">Website</li>
<li class="nav-item"><a class="nav-link" href="/"><i class="la la-columns nav-icon"></i> Lihat Website</a></li>