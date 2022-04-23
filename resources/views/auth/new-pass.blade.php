@extends('layout.main')

@section('title', 'New password')

@section('content')
@include('navbar.navbar')
<div class="container">
    <form action="{{route('auth.update-password-proccess')}}" method="POST" class="mt-5">
        @csrf
        <div class="mb-3">
          <label for="password" class="form-label">Пароль</label>
          <input type="password" class="form-control" name="password" id="password" placeholder="Введите свой пароль" required>
        </div>
        @error('password')
            <p class="alert alert-danger">{{$message}}</p>
        @enderror
        <div class="mb-3">
          <label for="password_confirmation" class="form-label">Подтверждение пароля</label>
          <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Подтвердите пароль" required>
        </div>
        <button type="submit" class="btn btn-secondary">Подтвердить изменения</button>
      </form>
    </div>
@endsection
