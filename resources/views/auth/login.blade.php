@extends('layout.main')

@section('title',  'Sign Up')

@section('content')
<div class="container mt-5">
    <form action="{{route('auth.login')}}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="email" class="form-label">Почта</label>
          <input type="email" class="form-control" value="{{old('email')}}" name="email" id="email" placeholder="Введите почту" required>
        </div>
        @error('email')
            <p class="alert alert-danger">{{$message}}</p>
        @enderror
        <div class="mb-3">
          <label for="password" class="form-label">Пароль</label>
          <input type="password" class="form-control" name="password" id="password" placeholder="Введите пароль" required>
        </div>
        @error('password')
            <p class="alert alert-danger">{{$message}}</p>
        @enderror
        <button type="submit" class="btn btn-secondary">Submit</button>
        <a href="{{route('auth.register-form')}}" style="float: right; margin-top: 5px;">У вас еще нет аккаунта?</a>
      </form>
</div>
@endsection
