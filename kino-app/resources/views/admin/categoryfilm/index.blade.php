@extends('layout.admin')

@section('title', 'Список жанров фильмов');

@section('content')
<div class="row">
    <div class="col">

        <a href="{{route('categoryfilms.create')}}" class="btn w-25 ml-auto btn-block btn-success  btn-flat">Добавить</a>
    </div>
</div>
<div class="row mt-4">
    <div class="col">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>№</th>
                    <th>Жанр</th>
                    <th>Фильм</th>
                    <th class="w-25">Удалить</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categoryFilms as $categoryFilm)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td><a href="{{ route('categoryfilms.edit', $categoryFilm->id) }}">{{ $categoryFilm->category->name }}</a></td>
                    <td>{{ $categoryFilm->film->name }}</td>
                    <td>
                        <form action="{{ route('categoryfilms.destroy', $categoryFilm->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-block btn-danger btn-flat">Удалить</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection