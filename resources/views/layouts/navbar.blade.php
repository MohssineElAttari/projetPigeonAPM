    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-lg navbar navbar-fixed align-items-center navbar-shadow navbar-brand-center" data-nav="brand-center">
        <div class="navbar-header d-xl-block d-none">
            <ul class="nav navbar-nav">
                <li class="nav-item"><a class="navbar-brand" href="{{ route('home') }}"><span class="brand-logo">
                            
                        <h2 class="brand-text mb-0">APM</h2>
                    </a></li>
            </ul>
        </div>
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon" data-feather="menu"></i></a></li>
                </ul>
            </div>
            <ul class="nav navbar-nav align-items-center ml-auto">
                <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon" data-feather="moon"></i></a></li>
                <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none"><span class="user-name font-weight-bolder">{{$associationGroup->prenom_res}} {{$associationGroup->nom_res}}</span><span class="user-status">{{$associationGroup->nom_asso}}</span></div><span class="avatar"><img class="round" src="{{ asset('images/logo') }}/{{$associationGroup->logo}}" alt="avatar" height="40" width="40"><span class="avatar-status-online"></span></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                        <a class="dropdown-item" href="page-profile.html"><i class="mr-50" data-feather="user"></i> Profile</a>
                        <a class="dropdown-item" href="{{ route('logout', ['id'=>1]) }}"><i class="mr-50" data-feather="power"></i> Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>


    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="horizontal-menu-wrapper">
        <div class="header-navbar navbar-expand-sm navbar navbar-horizontal floating-nav navbar-light navbar-shadow menu-border" role="navigation" data-menu="menu-wrapper" data-menu-type="floating-nav">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mr-auto"><a class="navbar-brand" href="{{ route('home') }}">
                        
                            <h2 class="brand-text mb-0">APM</h2>
                        </a></li>
                    <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i></a></li>
                </ul>
            </div>
            <div class="shadow-bottom"></div>
            <!-- Horizontal menu content-->
            <div class="navbar-container main-menu-content" data-menu="menu-container">
                    
                    <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
                    
                            <li class="{{ Request::is('home') ? 'active' : '' }}" data-menu=""><a class="dropdown-item d-flex align-items-center" href="{{ route('home') }}" data-i18n="eCommerce"><i data-feather="shopping-cart"></i><span data-i18n="eCommerce">Home</span></a>
                            </li>
                    <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center" href="#" data-toggle="dropdown"><i data-feather="package"></i><span data-i18n="Apps">Membre</span></a>
                        <ul class="dropdown-menu">
                            <li data-menu="" class="{{ Request::is('dashboard/membre') ? 'active' : '' }}"><a class="dropdown-item d-flex align-items-center" href="{{ route('membre') }}" data-toggle="dropdown" data-i18n="Email"><i data-feather="mail"></i><span data-i18n="Email">Gerer membre</span></a>
                            </li>
                            <li data-menu="" class="{{ Request::is('import-membre') ? 'active' : '' }}"><a class="dropdown-item d-flex align-items-center" href="{{ route('membre-mmport') }}" data-toggle="dropdown" data-i18n="Email"><i data-feather="mail"></i><span data-i18n="Email">Importe list membre</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center" href="#" data-toggle="dropdown"><i data-feather="layers"></i><span data-i18n="User Interface">Councours</span></a>
                        <ul class="dropdown-menu">
                            <li data-menu="" class="{{ Request::is('concour') ? 'active' : '' }}"><a class="dropdown-item d-flex align-items-center" href="{{ route('concour') }}" data-toggle="dropdown" data-i18n="Typography"><i data-feather="type"></i><span data-i18n="Typography">Gerer concours</span></a>
                            </li>
                            <li data-menu="" class="{{ Request::is('/dashboard/concour_resultat') ? 'active' : '' }}"><a class="dropdown-item d-flex align-items-center" href="{{ route('concour_resultat') }}" data-toggle="dropdown" data-i18n="Colors"><i data-feather="droplet"></i><span data-i18n="Colors">Resultat</span></a>
                            </li>
                            {{-- <li data-menu="" class="{{ Request::is('concour/resultat') ? 'active' : '' }}"><a class="dropdown-item d-flex align-items-center" href="#" data-toggle="dropdown" data-i18n="Feather"><i data-feather="eye"></i><span data-i18n="Feather">membre</span></a>
                            </li> --}}
                        </ul>
                    </li>
                    <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center" href="#" data-toggle="dropdown"><i data-feather="edit"></i><span data-i18n="Forms &amp; Tables">Resultat</span></a>
                        <ul class="dropdown-menu">
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="{{ Request::is('import-membre') ? 'active' : '' }}" data-toggle="dropdown" data-i18n="Form Layout"><i data-feather="box"></i><span data-i18n="Form Layout">gerer les eésultats</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="{{ Request::is('import-membre') ? 'active' : '' }}" data-toggle="dropdown" data-i18n="Form Wizard"><i data-feather="package"></i><span data-i18n="Form Wizard">pigeon</span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center" href="#" data-toggle="dropdown"><i data-feather="file-text"></i><span data-i18n="Pages">pigeon</span></a>
                        <ul class="dropdown-menu">
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="page-account-settings.html" data-toggle="dropdown" data-i18n="Account Settings"><i data-feather="settings"></i><span data-i18n="Account Settings">Gerer les pigeon</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href="page-profile.html" data-toggle="dropdown" data-i18n="Profile"><i data-feather="user"></i><span data-i18n="Profile">membre</span></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- END: Main Menu-->