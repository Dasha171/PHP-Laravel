@extends('layout.admin')

@section('title', isset($review) ? 'Редактировать отзыв к фильму: '.$review->film->name : 'Добавить отзыв')

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <form action="{{ isset($review) ? route('reviews.update', $review->id) : route('reviews.store') }}" method="POST">
                    @csrf
                    @isset($review) 
                        @method("PATCH")
                    @endisset
                    <div class="form-group">
                        <label for="film_id">Фильм</label>
                        <select name="film_id" id="film" class="form-control @error('film_id') is-invalid @enderror">
                            <option value="">Выберите фильм</option>
                            @foreach (\App\Models\Film::all() as $film)
                                <option value="{{ $film->id }}" {{ isset($review) && $review->film_id == $film->id ? 'selected' : '' }}>{{ $film->name }}</option>
                            @endforeach
                        </select>
                        <label for="user">Пользователь</label>
                        <select name="user_id" id="user" class="form-control @error('user_id') is-invalid @enderror">
                            <option value="">Выберите пользователя</option>
                            @foreach (\App\Models\User::all() as $user)
                                <option value="{{ $user->id }}" {{ isset($review) && $review->user_id == $user->id ? 'selected' : '' }}>{{ $user->fio }}</option>
                            @endforeach
                        </select>
                        <label for="message">Сообщение</label>
                        <input type="text" name="message" value="{{ isset($review) ? $review->message : '' }}" id="message" class="form-control @error('message') is-invalid @enderror">
                        <label for="is_approved">Оценка</label>
                        <input type="text" name="is_approved" value="{{ isset($review) ? $review->is_approved : '' }}" id="is_approved" class="form-control @error('is_approved') is-invalid @enderror">
                        @error('film_id')
                        <div class="invalid-feedback  ">
                            Ошибка: {{ $message }}
                        </div>
                        @enderror
                        @error('user_id')
                        <div class="invalid-feedback  ">
                            Ошибка: {{ $message }}
                        </div>
                        @enderror
                        @error('message')
                        <div class="invalid-feedback  ">
                            Ошибка: {{ $message }}
                        </div>
                        @enderror
                        @error('is_approved')
                        <div class="invalid-feedback  ">
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