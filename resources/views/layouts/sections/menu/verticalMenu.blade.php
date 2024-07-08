<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

  <!-- ! Hide app brand if navbar-full -->
  <div class="app-brand demo">
    <a href="{{url('/')}}" class="app-brand-link">
      <span class="app-brand-logo demo">
       <img src="{{ asset('assets/img/avatars/1.jpg') }}" alt
            class="w-px-50 h-auto rounded-circle img-fluid">
      </span>
      <span style="text-transform: none !important;" class="app-brand-text demo menu-text fw-bold ms-2">Troféus</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>
  @auth
    <ul class="menu-inner py-1">
      @php $menuData = [
    (object)[
        'menu' => [
            (object)[
                'name' => 'Troféus',
                'icon' => 'bx bx-trophy',
                'slug' => 'trofeus',
                'submenu' => [
                    (object)[
                        'url' => 'trofeus/listagem',
                        'name' => 'Listagem',
                        'slug' => 'trofeus-listagem'
                    ],
                    (object)[
                        'url' => 'status/listagem',
                        'name' => 'Status do Troféu',
                        'slug' => 'status-listagem'
                    ]
                ]
            ],
            (object)[
                'name' => 'Campus',
                'icon' => 'bx bx-building',
                'slug' => 'campus-listagem',
                        'url' => 'campus/listagem',
            ],
            (object)[
                'name' => 'Modalidades',
                'icon' => 'bx bxs-ball',
                'slug' => 'modalidades-listagem',
                'url' => 'modalidades/listagem',
//                'submenu' => [
//                    (object)[
//                        'url' => 'modalidades/listagem',
//                        'name' => 'Listagem',
//                        'slug' => 'modalidades-listagem'
//                    ]
//                ]
            ],
        ]
    ]
];@endphp
      @foreach ($menuData[0]->menu as $menu)
        @if (isset($menu->menuHeader))
          <li class="menu-header small text-uppercase">
            <span class="menu-header-text">{{ __($menu->menuHeader) }}</span>
          </li>

        @else

          {{-- active menu method --}}
          @php
            $activeClass = null;
            $currentRouteName = Route::currentRouteName();

            if ($currentRouteName === $menu->slug) {
            $activeClass = 'active';
            }
            elseif (isset($menu->submenu)) {
            if (gettype($menu->slug) === 'array') {
            foreach($menu->slug as $slug){
            if (str_contains($currentRouteName,$slug) and strpos($currentRouteName,$slug) === 0) {
            $activeClass = 'active open';
            }
            }
            }
            else{
            if (str_contains($currentRouteName,$menu->slug) and strpos($currentRouteName,$menu->slug) === 0) {
            $activeClass = 'active open';
            }
            }

            }
          @endphp

          {{-- main menu --}}
          <li class="menu-item {{$activeClass}}">
            <a href="{{ isset($menu->url) ? url($menu->url) : 'javascript:void(0);' }}"
               class="{{ isset($menu->submenu) ? 'menu-link menu-toggle' : 'menu-link' }}"
               @if (isset($menu->target) and !empty($menu->target)) target="_blank" @endif>
              @isset($menu->icon)
                <i class="{{ $menu->icon }}"></i>
              @endisset
              <div>{{ isset($menu->name) ? __($menu->name) : '' }}</div>
              @isset($menu->badge)
                <div class="badge bg-{{ $menu->badge[0] }} rounded-pill ms-auto">{{ $menu->badge[1] }}</div>
              @endisset
            </a>

            {{-- submenu --}}
            @isset($menu->submenu)
              @include('layouts.sections.menu.submenu',['menu' => $menu->submenu])
            @endisset
          </li>
        @endif
      @endforeach
    </ul>
  @endauth
</aside>
