@extends('layout.main')

@section('title', 'Edit profile')

@section('content')
@include('navbar.navbar')
<div class="container">
    <form action="{{route('cabinet.update')}}" method="POST" class="mt-5">
        @csrf
        <div class="mb-3">
          <label for="fullname" class="form-label">ФИО</label>
          <input type="text" class="form-control" value="{{ old('fullname') ?? $user->fullname }}" name="fullname" id="fullname" placeholder="Введите свое полное имя" required>
        </div>
        @error('fullname')
                <p class="alert alert-danger">{{$message}}</p>
        @enderror
        <div class="mb-3">
          <label for="email" class="form-label">Почта</label>
          <input type="email" class="form-control" value="{{old('email') ?? $user->email}}" name="email" id="email" placeholder="Введите почту" required>
        </div>
        @error('email')
                <p class="alert alert-danger">{{$message}}</p>
        @enderror
        <div class="mb-3">
          <label for="passport_data" class="form-label">Паспортные данные</label>
          <input type="text" class="form-control" value="{{old('passport_data') ?? $user->passport_data}}" name="passport_data" id="passport_data" placeholder="Введите паспортные данные" required>
        </div>
        @error('passport_data')
                <p class="alert alert-danger">{{$message}}</p>
        @enderror
        <button type="submit" class="btn btn-secondary">Подтвердить изменения</button>
      </form>
    </div>
@endsection
