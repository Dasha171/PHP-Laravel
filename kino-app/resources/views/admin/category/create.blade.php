@extends('layout.admin')

@section('title', isset($category) ? 'Редактировать жанр: '.$category->name : 'Добавить жанр')

@section('content')
<div class="row">
    <div class="col">
        <form action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}" method="post">
            @csrf
            @isset($category)
                @method('patch')
            @endisset
            <div class="form-group">
                <label>Название</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', isset($category) ? $category->name : '') }}" id="name" name="name">
            </div>
            <div class="form-group">
                <label>Родительская категория</label>
                <select class="form-control" @error('parent_id') is-invalid @enderror name="parent_id">
                    <option value="">Нет родительской категории</option>
                    @foreach(\App\Models\Category::all() as $cat)
                        @if(isset($category) && $category->id == $cat->id) @continue @endif
                            <option value="{{ $cat->id }}" {{ isset($category) && $category->parent_id == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                    @endforeach
                </select>
            @error('name')
                <div class="invalid-feedback  ">
                    Ошибка: {{ $message }}
                </div>
            @enderror
            @error('parent_id')
                <div class="invalid-feedback  ">
                    Ошибка: {{ $message }}
                </div>
            @enderror
            </div>
            <div>
              <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
        </form>
    </div>
</div>
@endsection