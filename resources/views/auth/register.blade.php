@extends('layout.main')

@section('title',  'Sign Up')

@section('content')
<div class="container">
<form action="{{route('auth.register')}}" method="POST" class="mt-5">
    @csrf
    <div class="mb-3">
      <label for="fullname" class="form-label">ФИО</label>
      <input type="text" class="form-control" value="{{old('fullname')}}" name="fullname" id="fullname" placeholder="Введите свое полное имя" required>
    </div>
    @error('fullname')
            <p class="alert alert-danger">{{$message}}</p>
    @enderror
    <div class="mb-3">
      <label for="email" class="form-label">Почта</label>
      <input type="email" class="form-control" value="{{old('email')}}" name="email" id="email" placeholder="Введите почту" required>
    </div>
    @error('email')
            <p class="alert alert-danger">{{$message}}</p>
    @enderror
    <div class="mb-3">
      <label for="passport_data" class="form-label">Паспортные данные</label>
      <input type="text" class="form-control" value="{{old('passport_data')}}" name="passport_data" id="passport_data" placeholder="Введите паспортные данные" required>
    </div>
    @error('passport_data')
            <p class="alert alert-danger">{{$message}}</p>
    @enderror
    <div class="mb-3">
      <label for="password" class="form-label">Пароль</label>
      <input type="password" class="form-control" name="password" id="password" placeholder="Введите пароль" required>
    </div>
    @error('password')
            <p class="alert alert-danger">{{$message}}</p>
    @enderror
    <div class="mb-3">
      <label for="password_confirmation" class="form-label">Подтверждение пароля</label>
      <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Подтвердите пароль" required>
    </div>
    <button type="submit" class="btn btn-secondary">Зарегистрироваться</button>
    <a href="{{route('auth.login-form')}}" style="float: right; margin-top: 5px;">У вас уже есть аккаунт?</a>
  </form>
</div>
@endsection
