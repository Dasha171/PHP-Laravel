@extends('layout.admin')

@section('title', isset($user) ? 'Редактировать пользователя: '.$user->fio : 'Добавить пользователя')

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <form action="{{ isset($user) ? route('users.update', $user->id) : route('users.store') }}" method="POST">
                    @csrf
                    @isset($user) 
                        @method("PATCH")
                    @endisset
                    <div class="form-group">
                        <label for="fio">ФИО</label>
                        <input type="text" name="fio" value="{{ isset($user)? old('name', $user->fio): '' }}" id="fio" class="form-control @error('fio') is-invalid @enderror">
                        <label for="birthday">День рождение</label>
                        <input type="date" name="birthday" value="{{ isset($user) ? $user->birthday : '' }}" id="birthday" class="form-control @error('birthday') is-invalid @enderror">
                        <label for="email">Email</label>
                        <input type="text" name="email" value="{{ isset($user) ? $user->email : '' }}" id="email" class="form-control @error('email') is-invalid @enderror">
                        <label for="password">Пароль</label>
                        <input type="text" name="password" value="{{ isset($user) ? $user->password : '' }}" id="password" class="form-control @error('password') is-invalid @enderror">
                        <label for="gender_id">Пол</label>
                        <select name="gender_id" id="gender" class="form-control @error('gender_id') is-invalid @enderror">
                            <option value="">Выберите пол</option>
                            @foreach (\App\Models\Gender::all() as $gender)
                                <option value="{{ $gender->id }}" {{ isset($user) && $user->gender_id == $gender->id ? 'selected' : '' }}>{{ $gender->name }}</option>
                            @endforeach
                        </select>
                        @error('fio')
                        <div class="invalid-feedback  ">
                            Ошибка: {{ $message }}
                        </div>
                        @enderror
                        @error('birthday')
                        <div class="invalid-feedback  ">
                            Ошибка: {{ $message }}
                        </div>
                        @enderror
                        @error('email')
                        <div class="invalid-feedback  ">
                            Ошибка: {{ $message }}
                        </div>
                        @enderror
                        @error('password')
                        <div class="invalid-feedback  ">
                            Ошибка: {{ $message }}
                        </div>
                        @enderror
                        @error('gender_id')
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