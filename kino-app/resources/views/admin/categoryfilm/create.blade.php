@extends('layout.admin')

@section('title', isset($categoryFilm) ? 'Редактировать жанр фильма: ' . $categoryFilm->category : 'Добавить жанр фильма')

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <form action="{{ isset($categoryFilm) ? route('categoryfilms.update', $categoryFilm->id) : route('categoryfilms.store') }}" method="POST">
                    @csrf
                    @isset($categoryFilm) 
                        @method("PATCH")
                    @endisset
                    <div class="form-group">
                        <label for="category_id">Категория</label>
                        <select name="category_id" id="category" class="form-control" form-control @error('category_id') is-invalid @enderror>
                            <option value="">Выберите категорию</option>
                            @foreach (\App\Models\Category::all() as $category)
                                <option value="{{ $category->id }}" {{ isset($categoryFilm) && $categoryFilm->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <label for="film_id">Фильм</label>
                        <select name="film_id" id="film" class="form-control" @error('film_id') is-invalid @enderror>
                            <option value="">Выберите фильм</option>
                            @foreach (\App\Models\Film::all() as $film)
                                <option value="{{ $film->id }}" {{ isset($categoryFilm) && $categoryFilm->film_id == $film->id ? 'selected' : '' }}>{{ $film->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="invalid-feedback">
                            Ошибка: {{ $message }}
                        </div>
                        @enderror
                        @error('film_id')
                        <div class="invalid-feedback">
                            Ошибка: {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary ">Добавить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection