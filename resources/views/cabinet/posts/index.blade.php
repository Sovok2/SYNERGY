@extends('layout.main')

@section('title', 'Posts')

@section('content')
@include('navbar.navbar')
<div class="container" >
    <div class="mt-3">
        <a href="{{route('posts.create')}}" class="btn btn-secondary">Добавить публикацию</a>
    </div>
    <div class="mt-3">
    @if (count($posts) == 0)
        <h3>Тут пока что нет публикаций</h3>
    @else
    <div class="" style="text-align: center">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Короткое название</th>
            <th scope="col">Полное название</th>
            <th scope="col">Почта Автора</th>
            <th scope="col">Действие</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($posts as $post)
        <tr>
            <th scope="row" style="padding-top: 30px">{{$i++}}</th>
            <td colspan="row"  style="padding-top: 30px">{{$post->title}}</td>
            <td colspan="row"  style="padding-top: 30px">{{$post->long_title}}</td>
            <td colspan="row" style="padding-top: 30px">{{$post->user->email}}</td>
            @can('update-delete-post', [$post])
            <td>
                <a class="btn btn-outline-primary" href="{{route('posts.edit', $post->id)}}">Редактировать</a>
                <form action="{{route('posts.destroy', $post->id)}}" method="POST" style="margin-top: 10px">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id">
                    <button class="btn btn-outline-danger">Удалить</button>
                </form>
            </td>
            @endcan
        </tr>
        @endforeach
        </tbody>
      </table>
    @endif
    </div>
</div>
@endsection
