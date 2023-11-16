{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link text-error" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<li class="nav-separator">Modul</li>
<x-backpack::menu-item title="Users" icon="la la-user" :link="backpack_url('user')" />
<x-backpack::menu-item title="Registrations" icon="la la-clipboard-list" :link="backpack_url('registration')" />
<x-backpack::menu-item title="News" icon="la la-newspaper" :link="backpack_url('news')" />
<x-backpack::menu-item title="Videos" icon="la la-video" :link="backpack_url('video')" />

<li class="nav-separator">Website</li>
<li class="nav-item"><a class="nav-link" href="/"><i class="la la-columns nav-icon"></i> Lihat Website</a></li>