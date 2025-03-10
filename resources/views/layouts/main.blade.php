<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Financeiro - @yield('title')</title>

        @vite([
            'resources/css/app.css',
            'resources/js/app.js',
        ])

        @yield('head')
        </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="#">Financeiro</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Perfil</a></li>
                        <li><a class="dropdown-item" href="#!">Avisos</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Sair</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Sistema</div>
                            <a @class(['nav-link', 'active' => isset($menu) && $menu=='dashboard' ]) href="{{ route('dashboard.index') }}">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-tachometer-alt"></i>
                                </div>
                                Dashboard
                            </a>
                            <a @class(['nav-link', 'active' => isset($menu) && $menu=='operation' ]) href="{{ route('operation.index') }}">
                                <div class="sb-nav-link-icon">
                                    <i class="fa-solid fa-money-bill-transfer"></i>
                                </div>
                                Conta Corrente
                            </a>
                            <div class="sb-sidenav-menu-heading">Cartáo de Crédito</div>
                            <a @class(['nav-link', 'active' => isset($menu) && $menu=='creditcarddashboard' ]) href="{{ route('creditcard.dashboard') }}">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-tachometer-alt"></i>
                                </div>
                                Dashboard
                            </a>
                            <a @class(['nav-link', 'active' => isset($menu) && $menu=='payment' ]) href="{{ route('payment.index') }}">
                                <div class="sb-nav-link-icon">
                                    <i class="fa-solid fa-cash-register"></i>
                                </div>
                                Pagamentos
                            </a>
                            <a @class(['nav-link', 'active' => isset($menu) && $menu=='creditcard' ]) href="{{ route('creditcard.index') }}">
                                <div class="sb-nav-link-icon">
                                    <i class="fa-regular fa-credit-card"></i>
                                </div>
                                Cartões
                            </a>                            
                            <div class="sb-sidenav-menu-heading">Cadastro</div>
                            <a @class(['nav-link', 'active' => isset($menu) && $menu=='category' ]) href="{{ route('category.index') }}">
                                <div class="sb-nav-link-icon fa-lg">
                                    <i class="fa-solid fa-list"></i>
                                </div>
                                Categorias
                            </a>
                            <a @class(['nav-link', 'active' => isset($menu) && $menu=='expense' ]) href="{{ route('expense.index') }}">
                                <div class="sb-nav-link-icon">
                                    <i class="fa-solid fa-money-check-dollar"></i>
                                </div>
                                Despesas
                            </a>
                            <a @class(['nav-link', 'active' => isset($menu) && $menu=='bank' ]) href="{{ route('bank.index') }}">
                                <div class="sb-nav-link-icon">
                                    <i class="fa-solid fa-building-columns"></i>
                                </div>
                                Bancos
                            </a>
                            <a @class(['nav-link', 'active' => isset($menu) && $menu=='account' ]) href="{{ route('account.index') }}">
                                <div class="sb-nav-link-icon">
                                    <i class="fa-solid fa-receipt"></i>
                                </div>
                                Contas
                            </a>
                            <div class="sb-sidenav-menu-heading">Administração</div>
                            <a @class(['nav-link', 'active' => isset($menu) && $menu=='users' ]) href="{{ route('user.index') }}">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                Usuários
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Usuário:</div>
                        Fabio Francisco
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    @yield('content')
                </main>
            </div>
        </div>
        
        @yield('scripts')
    </body>
</html>