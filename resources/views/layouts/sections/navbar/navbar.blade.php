@php
  $containerNav = $containerNav ?? 'container-fluid';
  $navbarDetached = ($navbarDetached ?? '');

@endphp

  <!-- Navbar -->
@if(isset($navbarDetached) && $navbarDetached == 'navbar-detached')
  <nav
    class="layout-navbar {{$containerNav}} navbar navbar-expand-xl {{$navbarDetached}} align-items-center bg-navbar-theme"
    id="layout-navbar">
    @endif
    @if(isset($navbarDetached) && $navbarDetached == '')
      <nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
        <div class="{{$containerNav}}">
          @endif

          <!--  Brand demo (display only for navbar-full and hide on below xl) -->
          @if(isset($navbarFull))
            <div class="navbar-brand app-brand demo d-none d-xl-flex py-0 me-4">
              <a href="{{url('/')}}" class="app-brand-link gap-2">
                <span
                  class="app-brand-logo demo">@include('_partials.macros',["width"=>25,"withbg"=>'var(--bs-primary)'])</span>
                <span class="app-brand-text demo menu-text fw-bold">{{config('variables.templateName')}}</span>
              </a>
            </div>
          @endif

          <!-- ! Not required for layout-without-menu -->
          @if(!isset($navbarHideToggle))
            <div
              class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0{{ isset($menuHorizontal) ? ' d-xl-none ' : '' }} {{ isset($contentNavbar) ?' d-xl-none ' : '' }}">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>
          @endif

          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <!-- Search -->
            <div class="col">
              <form id="form-busca" action="{{ route('busca') }}" style="margin-block-end:0 !important;">
                <div class="navbar-nav align-items-center w-100">
                  <div class="nav-item d-flex align-items-center flex-grow-1">
                    <i class="bx bx-search fs-4 lh-0"></i>
                    <input
                      type="text"
                      name="q"
                      id="busca"
                      class="form-control border-0 shadow-none ps-1 ps-sm-2"
                      placeholder="Busque por nome, campus ou modalidade"
                      aria-label="Buscar..."
                      value="{{ request('q') }}">
                    <button type="button" id="microfone" class="btn btn-primary btn-sm rounded-circle">
                      <i class='bx bxs-microphone'></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>

            <!-- Separador vertical -->
            <div class="vertical-separator"></div>

            <!-- Botão de login e outros itens -->
            <ul class="navbar-nav flex-row align-items-center ms-auto">
              @guest
                <a type="button" class="btn btn-outline-primary btn-sm" href="{{route('login')}}">
                  <i class='bx bxs-lock-alt me-2'></i>Login
                </a>
              @endguest
              @auth
                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                     data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="{{ asset('assets/img/avatars/1.jpg') }}" alt
                           class="w-px-40 h-auto rounded-circle">
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="javascript:void(0);">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="{{ asset('assets/img/avatars/1.jpg') }}" alt
                                   class="w-px-40 h-auto rounded-circle">
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-medium d-block">{{auth()->user()->name}}</span>
                            <small class="text-muted">Admin</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="{{route('perfil')}}">
                        <i class='bx bx-cog me-2'></i>
                        <span class="align-middle">Configurações</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="{{route('logout')}}">
                        <i class='bx bx-power-off me-2'></i>
                        <span class="align-middle">Sair</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              @endauth
            </ul>
          </div>

          @if(!isset($navbarDetached))
        </div>
        @endif
      </nav>
      <!-- / Navbar -->
  </nav>
@include('_partials.microfone_modal')
<style>
  #form-busca {
    display: flex;
    align-items: center;
    width: 100%;
  }

  #busca {
    flex: 1; /* Faz com que o input ocupe o espaço restante disponível */
    margin-right: 8px; /* Espaço entre o input e o botão */
  }

  #microfone {
    flex-shrink: 0; /* Garante que o botão microfone não encolha */
  }

  .vertical-separator {
    width: 1px; /* Largura da linha */
    background-color: #ccc; /* Cor da linha (ajuste conforme necessário) */
    height: 30px; /* Altura da linha, ajuste conforme necessário */
    margin: 0 10px; /* Espaço ao redor da linha */
    align-self: center; /* Alinha a linha vertical no centro dos itens adjacentes */
  }

</style>
