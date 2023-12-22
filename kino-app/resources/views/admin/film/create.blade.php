@extends('layout.admin')

@section('title', isset($film) ? 'Редактировать фильм: '.$film->name : 'Добавить фильм')

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <form action="{{ isset($film) ? route('films.update', $film->id) : route('films.store') }}" method="POST">
                    @csrf
                    @isset($film) 
                        @method("PATCH")
                    @endisset
                    <div class="form-group">
                        <label for="name">Название</label>
                        <input type="text" name="name" value="{{ isset($film)? old('name', $film->name): '' }}" id="name" class="form-control @error('name') is-invalid @enderror">
                        <label for="country_id">Страна</label>
                        <select name="country_id" id="country" class="form-control @error('country_id') is-invalid @enderror">
                            <option value="">Выберите страну</option>
                            @foreach (\App\Models\Country::all() as $country)
                                <option value="{{ $country->id }}" {{ isset($film) && $film->country_id == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                            @endforeach
                        </select>
                        <label for="duration">Продолжительность(минуты)</label>
                        <input type="text" name="duration" value="{{ isset($film) ? $film->duration : '' }}" id="duration" class="form-control @error('duration') is-invalid @enderror">
                        <label for="year_of_issue">Год выпуска</label>
                        <input type="text" name="year_of_issue" value="{{ isset($film) ? $film->year_of_issue : '' }}" id="year_of_issue" class="form-control @error('year_of_issue') is-invalid @enderror">
                        <label for="age">Возраст</label>
                        <input type="text" name="age" value="{{ isset($film) ? $film->age : '' }}" id="age" class="form-control @error('age') is-invalid @enderror">
                        @error('name')
                        <div class="invalid-feedback  ">
                            Ошибка: {{ $message }}
                        </div>
                        @enderror
                        @error('country_id')
                        <div class="invalid-feedback  ">
                            Ошибка: {{ $message }}
                        </div>
                        @enderror
                        @error('duration')
                        <div class="invalid-feedback  ">
                            Ошибка: {{ $message }}
                        </div>
                        @enderror
                        @error('year_of_issue')
                        <div class="invalid-feedback  ">
                            Ошибка: {{ $message }}
                        </div>
                        @enderror
                        @error('age')
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