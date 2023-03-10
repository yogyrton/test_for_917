@extends('admin.layouts.layuot')

@section('content')

    <form action="{{ route('idea.update', $idea->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="add-new">
            <div class="add-new__header">
                <div class="_container">
                    <div class="add-new__header-body">
                        <h2 class="add-new__title">Редактирование идеи</h2>
                        <div class="add-new__actions">
                            <a href="{{ route('idea.index') }}" class="btn add-new__btn add-new__cancel">Отменить</a>

                            <button type="submit" class="btn btn__main add-new__btn add-new__save ">Редактировать</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="add-new__body">
                <div class="_container">
                    <div class="add-new__form">



                        <div class="add-new__form-group">
                            <div class="select add-new__select">

                                <select class="btn select__btn add-new__select-btn" name="category_id">

                                    @foreach($categories as $category)
                                        <ul class="select__list add-new__select-list">
                                            <option class="select__item add-new__select-item" value="{{ $category }}">{{ $category }}</option>
                                        </ul>
                                    @endforeach
                                </select>

                            </div>
                        </div>


                        <div class="add-new__form-group">
                            <input type="text" class="add-new__form-control form-control @error('author') is-invalid @enderror" name="author" value="{{ $idea->author }}">
                        </div>

                        <div class="add-new__form-group">
                            <input type="text" class="add-new__form-control form-control @error('title') is-invalid @enderror" name="title" value="{{ $idea->author }}">
                        </div>

                        <div class="add-new__form-group">
                            <input type="text" class="add-new__form-control form-control @error('description') is-invalid @enderror" name="description" value="{{ $idea->author }}">
                        </div>

                        <div class="add-new__form-group">
                            <div class="add-new__row">
                                <div class="add-new__col col-sm-6">
                                    <div class="select add-new__select">
                                        <select class="btn select__btn add-new__select-btn" name="status">
                                            <ul class="select__list add-new__select-list">
                                                <option class="select__item add-new__select-item" value="{{ $idea->status }}">{{ $idea->status }}</option>
                                                <option class="select__item add-new__select-item" value="Новая">Новая</option>
                                                <option class="select__item add-new__select-item" value="В реализации">В реализации</option>
                                                <option class="select__item add-new__select-item" value="Реализована">Реализована</option>
                                            </ul>
                                        </select>

                                    </div>
                                </div>
                                <div class="add-new__col col-sm-6">
                                    <label class="add-new__file w-100 h-100">
                                        <input type="file" name="thumbnail" id="file" accept=".png, .jpg, .jpeg" hidden/>
                                        <div class="btn btn__drop w-100 h-100">Прикрепить файл</div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>
@endsection
