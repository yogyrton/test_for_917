@extends('admin.layouts.layuot')

@section('content')

    <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="add-new">
            <div class="add-new__header">
                <div class="_container">
                    <div class="add-new__header-body">
                        <h2 class="add-new__title">Добавление категории</h2>
                        <div class="add-new__actions">
                            <a href="{{ route('category.index') }}"
                               class="btn add-new__btn add-new__cancel">Отменить</a>
                            <button type="submit" class="btn btn__main add-new__btn add-new__save ">Создать</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="add-new__body">
                <div class="_container">
                    <div class="add-new__form">

                        <div class="add-new__form-group">
                            <input type="text" class="add-new__form-control form-control @error('title') is-invalid @enderror" name="title" placeholder="Название">
                        </div>

                        <div class="add-new__form-group">
                        <textarea class="add-new__form-control form-control textarea @error('description') is-invalid @enderror" name="description" id=""
                                  placeholder="Описание"></textarea>
                        </div>

                        <div class="add-new__form-group">
                            <label class="add-new__drop-zone drop-zone">
                                <input type="file" name="thumbnail" id="file" class="drop-zone__input"
                                       accept=".png, .jpg, .jpeg"/>
                                <p>Перетащите фото сюда или <span>выберите файл</span></p>
                                <div class="btn btn__drop">Загрузить</div>
                            </label>

                            <div class="drop-zone__thumb">
                                <a class="drop-zone__zoom" data-fancybox="dropfile">
                                    <svg>
                                        <use xlink:href="/admin_assets/img/sprite.svg#arrow"></use>
                                    </svg>
                                </a>
                                <a href="#">
                                    <svg>
                                        <use xlink:href="/admin_assets/img/sprite.svg#close"></use>
                                    </svg>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Add new single -->

    </form>
@endsection
