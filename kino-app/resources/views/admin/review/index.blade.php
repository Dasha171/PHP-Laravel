@extends('layout.admin')

@section('title', 'Список отзывов');

@section('content')
<div class="row">
    <div class="col">

        <a href="{{route('reviews.create')}}" class="btn w-25 ml-auto btn-block btn-success  btn-flat">Добавить</a>
    </div>
</div>
<div class="row mt-4">
    <div class="col">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>№</th>
                    <th>Фильм</th>
                    <th>Пользователь</th>
                    <th>Сообщение</th>
                    <th>Оценка</th>
                    <th class="w-25">Удалить</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reviews as $review)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td><a href="{{ route('reviews.edit', $review->id) }}">{{ $review->film->name }}</a></td>
                    <td>{{ $review->user->fio }}</td>
                    <td>{{ $review->message }}</td>
                    <td>{{ $review->is_approved }}</td>
                    <td>
                        <form action="{{route('reviews.destroy', $review->id)}}" method="post">
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