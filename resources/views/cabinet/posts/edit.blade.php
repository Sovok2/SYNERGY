@extends('layout.main')

@section('title', 'Edit post')

@section('content')
@include('navbar.navbar')
<div class="container">
    <form action="{{route('posts.update', $post->id)}}" method="POST" class="mt-5">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="title" class="form-label">Название</label>
          <input type="text" class="form-control" name="title" value="{{old('title') ?? $post->title}}" id="title" placeholder="Введите короткое название публикации" required>
        </div>
        @error('title')
                <p class="alert alert-danger">{{$message}}</p>
        @enderror
        <div class="mb-3">
          <label for="long_title" class="form-label">Полное название</label>
          <input type="text" class="form-control" name="long_title" value="{{old('long_title') ?? $post->long_title}}" id="long_title" placeholder="Введите полное название публикации" required>
        </div>
        @error('long_title')
                <p class="alert alert-danger">{{$message}}</p>
        @enderror
        <div class="mb-3">
            <label for="description" class="form-label">Описание (Необязательно)</label>
            <textarea name="description" class="form-control" id="description"></textarea>
        </div>
        <button type="submit" class="btn btn-secondary">Подтвердить изменения</button>
      </form>
    </div>
@endsection
