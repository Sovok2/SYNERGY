@extends('layout.main')

@section('title', 'Update password')

@section('content')
@include('navbar.navbar')
<div class="container">
    <form action="{{route('auth.check-password-proccess')}}" method="POST" class="mt-5">
        @csrf
        <div class="mb-3">
          <label for="password" class="form-label">Пароль</label>
          <input type="password" class="form-control" name="password" id="password" placeholder="Введите свой пароль" required>
        </div>
        @error('password')
            <p class="alert alert-danger">{{$message}}</p>
        @enderror
        <button type="submit" class="btn btn-secondary">Подтвердить</button>
      </form>
    </div>
@endsection
