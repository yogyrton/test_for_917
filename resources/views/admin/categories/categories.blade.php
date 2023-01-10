@extends('admin.layouts.layuot')

@section('add')
    <a href="{{ route('category.create') }}" class="btn btn__main">Добавить категорию</a>
@endsection

@section('filter')
    <div class="filter">
        <div class="_container">
            <div class="filter__body">
                <div class="filter-drops">
                    <div class="select filter-select">
                        <button class="btn select__btn filter-select__btn">
                            <span>Статус</span>
                            <svg>
                                <use xlink:href="/admin_assets/img/sprite.svg#drop"></use>
                            </svg>
                        </button>
                        <ul class="select__list filter-select__list">
                            <li class="select__item filter-select__item">Статус 1</li>
                            <li class="select__item filter-select__item">Статус 2</li>
                            <li class="select__item filter-select__item">Статус 3</li>
                        </ul>
                    </div>
                    <div class="select filter-select filter-select__search">
                        <div class="filter-select__search-froup">
                            <input type="text" class="filter-select__btn form-control" placeholder="Поиск...">
                            <button class="btn filter-select__search-btn">
                                <svg>
                                    <use xlink:href="/admin_assets/img/sprite.svg#search"></use>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="filter-act">
                    <div class="select filter-select">
                        <button class="btn select__btn filter-select__btn">
                            <span>Сортировать по...</span>
                            <svg>
                                <use xlink:href="/admin_assets/img/sprite.svg#drop"></use>
                            </svg>
                        </button>
                        <ul class="select__list filter-select__list">
                            <li class="select__item filter-select__item">По возрастанию</li>
                            <li class="select__item filter-select__item">По убыванию</li>
                            <li class="select__item filter-select__item">Цена</li>
                            <li class="select__item filter-select__item">Доступно</li>
                            <li class="select__item filter-select__item">Статус</li>
                        </ul>
                    </div>
                    <div class="filter-actions">
                        <button class="btn filter-reset">
                            <svg>
                                <use xlink:href="/admin_assets/img/sprite.svg#close"></use>
                            </svg>
                            Сбросить
                        </button>
                        <button class="btn btn__main filter-submit">
                            <svg>
                                <use xlink:href="/admin_assets/img/sprite.svg#check"></use>
                            </svg>
                            Применить
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="page-table">
        <div class="table-responsive">
            <table class="table with-action">
                <thead>
                <tr>
                    <td>#</td>
                    <td>Название</td>
                    <td>Описание</td>
                    <td>Кол-во идей</td>
                    <td>Кол-во лайков</td>
                    <td>Статус</td>
                    <td>Действие</td>
                </tr>
                </thead>
                <tbody>

                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->title }}</td>
                        <td>{{ $category->description }}
                        </td>
                        <td>{{ $category->ideas->count() }}</td>
                        <td></td>
                        <td>{{ $category->is_active }}</td>
                        <td>
                            <div>
                                <a href="{{ route('category.edit', $category->id) }}">
                                    <svg>
                                        <use xlink:href="/admin_assets/img/sprite.svg#arrow"></use>
                                    </svg>
                                </a>

                                <form action="{{ route('category.destroy', $category->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-lg">X</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
