<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">

    <link rel="icon" href="/admin_assets/img/favicon.png">

    <!-- Фон для сафари -->
    <meta name="msapplication-TileColor" content="#A0D1FB">
    <meta name="theme-color" content="#A0D1FB">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Custom -->
    <link rel="stylesheet" href="/admin_assets/style.css">

    <title>Список идей | Вау! Список идей</title>
</head>

<body>

<div id="container">

    <nav class="header-nav">
        <div class="header-nav__logo"><a href="{{ route('category.index') }}">Список идей</a></div>
        <div class="header-nav__body">
            <ul class="header-nav__menu">
                <li class="header-nav__list active">
                    <a href="{{ route('category.index') }}">
                        <svg>
                            <use xlink:href="/admin_assets/img/nav.svg#list"></use>
                        </svg>
                        Список идей
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Navigation -->

    <header class="header" id="header">
        <div class="header__body">
            <div class="bars">
                <svg>
                    <use xlink:href="/admin_assets/img/sprite.svg#bars"></use>
                </svg>
            </div>
            <div class="header__logo"><a href="./"><img src="/admin_assets/img/logo.svg" alt=""></a></div>
            <div class="header__actions">
                <a href="#" class="header__action header__action-search">
                    <svg>
                        <use xlink:href="/admin_assets/img/sprite.svg#search-mob"></use>
                    </svg>
                </a>
                <a href="#" class="header__action header__action-mess">
                    <svg>
                        <use xlink:href="/admin_assets/img/sprite.svg#mess"></use>
                    </svg>
                </a>
            </div>
        </div>
    </header>
    <!-- Header -->

    <div id="content">
        <div class="page-header">
            <div class="_container">
                <div class="page-header__body">
                    <h1 class="page-header__title">Список идей</h1>
                    <div class="page-header__actions">
                        @yield('add')

                        <div class="page-header__list">
                            <div class="page-header__lang">
                                RU
                                <svg>
                                    <use xlink:href="/admin_assets/img/sprite.svg#drop"></use>
                                </svg>
                                <ul class="page-header__lang-list">
                                    <li><a href="#">eng</a></li>
                                    <li class="active"><a href="#">ru</a></li>
                                </ul>
                            </div>
                            <a href="" class="page-header__search">
                                <svg>
                                    <use xlink:href="/admin_assets/img/sprite.svg#search"></use>
                                </svg>
                            </a>
                            <a href="" class="page-header__mess">
                                <svg>
                                    <use xlink:href="/admin_assets/img/sprite.svg#messpc"></use>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <ul class="page-header__nav">
                        <li class="page-header__nav-item"><a href="#">Инструкция</a></li>
                        <li class="page-header__nav-item active"><a href="{{ route('category.index') }}">Категории
                                идей</a></li>
                        <li class="page-header__nav-item"><a href="{{ route('idea.index') }}">Список идей</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Page header -->


        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                <li>{{ session('error') }}</li>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                <li>{{ session('success') }}</li>
            </div>
    @endif


    @yield('filter')

    <!-- Filter -->

    @yield('content')

    <!-- Page table -->

    </div>
    <!-- Content -->

</div>


<!-- JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

<!-- Custom -->
<script src="/admin_assets/js/main.js"></script>
</body>

</html>
