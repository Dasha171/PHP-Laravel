@extends('layout.admin')

@section('title', 'Список фильмов');

@section('content')
<div class="row">
    <div class="col">

        <a href="{{route('films.create')}}" class="btn w-25 ml-auto btn-block btn-success  btn-flat">Добавить</a>
    </div>
</div>
<div class="row mt-4">
    <div class="col">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>№</th>
                    <th>Название</th>
                    <th>Страна</th>
                    <th>Продолжительность</th>
                    <th>Год выпуска</th>
                    <th>Возраст</th>
                    <th class="w-25">Удалить</th>
                </tr>
            </thead>
            <tbody>
                @foreach($films as $film)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td><a href="{{route('films.edit', $film->id)}}">{{$film->name}}</a></td>
                    <td>{{($film->country->name)}}</td>
                    <td>{{($film->duration)}}</td>
                    <td>{{($film->year_of_issue)}}</td>
                    <td>{{($film->age)}}</a></td>
                    <td>
                        <form action="{{route('films.destroy', $film->id)}}" method="post">
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
