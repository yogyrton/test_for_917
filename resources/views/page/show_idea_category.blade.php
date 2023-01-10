<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <link rel="icon" href="/page/img/favicon.png">

    <!-- Фон для сафари -->
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta name="theme-color" content="#FFFFFF">

    <!-- Fancybox -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css"/>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

    <!-- Swiper  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>

    <!-- Custom -->
    <link rel="stylesheet" href="/page/style.css">

    <title>Лэндинг | Вау! Инструменты</title>
</head>

<body>

<div class="wrapper">

    <main class="main">

        <section class="page-header">
            <div class="_container">
                <h1 class="page-header-title">Список идей </h1>
            </div>
        </section>

        <section class="page-desc">
            <div class="_container">
                <div class="page-desc-body">
                    <p>Мы постоянно в поисках актуальных инновационных идей, которые мы могли бы воплотить в жизнь.</p>
                    <p>Эта страница - возможность каждому поделиться своими мыслями по улучшению или дополнению к нашим
                        проектам и готовым решениям, и выразить поддержку идеям, предложенным другими.</p>
                </div>
            </div>
        </section>


        @if (!empty($categories) && count($categories) > 0)
            <section class="category-list">
                <div class="_container">
                    <div class="category-list-header">
                        <h3 class="category-list-title">Выберите проект, в который Вы хотите добавить идею или
                            проголосовать</h3>
                        <div class="swiper-nav">
                            <div class="slider-prev">
                                <svg>
                                    <use xlink:href="/page/img/sprite.svg#nav-prev"></use>
                                </svg>
                            </div>
                            <div class="slider-next">
                                <svg>
                                    <use xlink:href="/page/img/sprite.svg#nav-next"></use>
                                </svg>
                            </div>
                        </div>
                    </div>


                    <div class="category-list-slider swiper-container">
                        <div class="swiper-wrapper">

                            @foreach($categories as $category)
                                <div class="swiper-slide">
                                    <article class="category-item">
                                        <div class="category-item-content">
                                            <a href="{{ route('show_idea_category', $category->title) }}">
                                                <figure class="category-item-img"><img
                                                        src="/storage/{{ $category->thumbnail }}"
                                                        alt="{{ $category->title }}"></figure>
                                            </a>
                                            <div class="category-item-body">
                                                <h4 class="category-item-title">{{ $category->title }}</h4>
                                                <p class="category-item-desc">{{ $category->description }}</p>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </section>
        @endif

        @if (!empty($categories) && count($categories) > 0)
            <section class="ideas">
                <div class="_container">
                    <div class="ideas-filter">
                        <div class="ideas-filter-selects">
                            <div class="ideas-filter-select select">
                                <button class="btn select__btn ideas-filter-btn">
                                    <span>Статус</span>
                                    <svg>
                                        <use xlink:href="/page/img/sprite.svg#drop"></use>
                                    </svg>
                                </button>
                                <ul class="ideas-filter-list select__list">
                                    <li class="ideas-filter-item select__item" data-value="status-1">Статус 1</li>
                                    <li class="ideas-filter-item select__item" data-value="status-2">Статус 2</li>
                                </ul>
                                <input type="text" class="select__input" hidden/>
                            </div>
                            <div class="ideas-filter-select select">
                                <button class="btn select__btn ideas-filter-btn">
                                    <span>Сортировать по...</span>
                                    <svg>
                                        <use xlink:href="/page/img/sprite.svg#drop"></use>
                                    </svg>
                                </button>
                                <ul class="ideas-filter-list select__list">
                                    <li class="ideas-filter-item select__item" data-value="sort-1">По возрастанию</li>
                                    <li class="ideas-filter-item select__item" data-value="sort-2">По убыванию</li>
                                    <li class="ideas-filter-item select__item" data-value="sort-3">По дате создания</li>
                                </ul>
                                <input type="text" class="select__input" hidden/>
                            </div>
                        </div>
                        <button class="btn btn__main ideas-filter-modal" data-bs-toggle="modal" data-bs-target="#idea">
                            Поделиться идеей
                        </button>
                    </div>
                    @endif

                    @if (!empty($ideas) && count($ideas) > 0)
                        <div class="ideas-list">
                            @foreach($ideas as $idea)
                                <article class="ideas-item">
                                    <div class="ideas-item-content">
                                        <h3 class="ideas-item-title">{{ $idea->title }}<a
                                                href="#">
                                                <svg>
                                                    <use xlink:href="/page/img/sprite.svg#skrepka"></use>
                                                </svg>
                                            </a></h3>
                                        <div class="ideas-item-info">
                                            <div class="ideas-item-proccess">{{ $idea->status }}</div>
                                            <p>от: {{ $idea->author }}</p>
                                            <p>{{ date_format($idea->created_at, 'd.m.Y') }}</p>
                                        </div>
                                        <div class="ideas-item-desc">
                                            <div class="ideas-item-desc-text">
                                                <p>{{ $idea->description }}</p>

                                            </div>
                                        </div>
                                        <a href="#" class="ideas-item-desc-more" data-up="Свернуть"
                                           data-down="Читать далее">Читать
                                            далее</a>
                                    </div>
                                    <div class="ideas-item-fav">
                                        <svg>
                                            <use xlink:href="/page/img/sprite.svg#fav"></use>
                                        </svg>
                                        <span>{{ $idea->likes }}</span>
                                    </div>
                                </article>
                            @endforeach

                        </div>
                        {{ $ideas->links() }}
                    @endif
                </div>
            </section>


            <form action="{{ route('show_form') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal fade modal-idea" id="idea" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <button type="button" class="btn modal-close" data-bs-dismiss="modal">
                                <svg>
                                    <use xlink:href="/page/img/sprite.svg#close"></use>
                                </svg>
                            </button>
                            <h1 class="modal-idea-title">Поделиться идеей</h1>
                            <form class="modal-idea-form needs-validation" novalidate>
                                <div class="modal-idea-form-group">
                                    <label for="firstname">Автор</label>
                                    <input type="text" class="form-control" name="firstname" id="firstname"
                                           placeholder="Автор"
                                           required>
                                </div>
                                <div class="modal-idea-form-group">
                                    <label for="theme">Тема</label>
                                    <input type="text" class="form-control" name="theme" id="theme" placeholder="Тема"
                                           required>
                                </div>
                                <div class="modal-idea-form-group">
                                    <label for="comment">Описание</label>
                                    <textarea name="comment" id="comment" class="textarea form-control"
                                              placeholder="Описание"
                                              required></textarea>
                                </div>
                                <div class="modal-idea-form-btn modal-idea-file">
                                    <label class="modal-idea-form-file">
                                        <input type="file" name="file" id="file" accept=".png, .jpg, .jpeg" hidden/>
                                        <div class="btn btn__more">Прикрепить файл</div>
                                    </label>
                                    <div class="modal-idea-form-file-result">
                                        <figure>
                                            <img data-src="" src="" alt="">
                                            <figcaption>Название файла</figcaption>
                                        </figure>
                                        <a href="#">
                                            <svg>
                                                <use xlink:href="/page/img/sprite.svg#close"></use>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                <div class="modal-idea-form-btn">
                                    <button class="btn btn__main" type="submit">Предложить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </form>

    </main>

</div>

<!-- JQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Fancybox -->
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Swiper -->
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

<!-- Custom -->
<script src="/page/js/main.js"></script>

</body>

</html>
