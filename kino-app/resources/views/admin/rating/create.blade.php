@extends('layout.admin')

@section('title', isset($rating) ? 'Редактировать рейтинг к фильму: '.$rating->film->name : 'Добавить рейтинг')

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <form action="{{ isset($rating) ? route('ratings.update', $rating->id) : route('ratings.store') }}" method="POST">
                    @csrf
                    @isset($rating) 
                        @method("PATCH")
                    @endisset
                    <div class="form-group">
                        <label for="film_id">Фильм</label>
                        <select name="film_id" id="film" class="form-control @error('film_id') is-invalid @enderror">
                            <option value="">Выберите фильм</option>
                            @foreach (\App\Models\Film::all() as $film)
                                <option value="{{ $film->id }}" {{ isset($rating) && $rating->film_id == $film->id ? 'selected' : '' }}>{{ $film->name }}</option>
                            @endforeach
                        </select>
                        <label for="user">Пользователь</label>
                        <select name="user_id" id="user" class="form-control @error('user_id') is-invalid @enderror">
                            <option value="">Выберите пользователя</option>
                            @foreach (\App\Models\User::all() as $user)
                                <option value="{{ $user->id }}" {{ isset($rating) && $rating->user_id == $user->id ? 'selected' : '' }}>{{ $user->fio }}</option>
                            @endforeach
                        </select>
                        <label for="ball">Балл</label>
                        <input type="text" name="ball" value="{{ isset($rating) ? $rating->ball : '' }}" id="ball" class="form-control @error('ball') is-invalid @enderror">
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
                        @error('ball')
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