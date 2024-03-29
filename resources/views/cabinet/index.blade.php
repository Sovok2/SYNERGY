@extends('layout.main')

@section('title', 'Cabinet')

@section('content')
@include('navbar.navbar')
<div class="container">
    <div class="mt-3">
        <a href="{{route('cabinet.edit')}}" class="btn btn-secondary">Изменить данные профиля</a>
        <a href="{{route('auth.check-password')}}" class="btn btn-warning">Изменить пароль</a>
    </div>
    <div class="mt-3">
        <h3>Что подтолкнуло нас на создание этого проекта</h3>
        <p><i>Во первых - Добро пожаловать на наш сайт.
        На создание нашего собственного проекта нас вдохновил знаменитый проект под названием
        <strong>Instagram</strong>, потому что его все любят, он очень популярен среди молодежи и не только
        , у него очень удобный интерфейс там можно общаться с кем угодно и не только общаться, но и делиться
        публикациями и это еще не все.
    </i></p>
    </div>
    <div class="mt-2">
        <h3>О нашем проекте</h3>
        <p><i>Так <strong>{{auth('web')->user()->fullname}}</strong>  давайте я расскажу
            вам что представляет из себя наш проект. Как мы и сказали нас вдохновил <strong>Instagram</strong>
        ну мы и решили сделать что то наподобии этого.
    </i></p>
        <h5>В нашем сайте вы можете :</h5>
        <ul>
            <li><i> Смотреть публикации</i></li>
            <li><i> Создавать публикации</i></li>
            <li><i> Редактировать публикации</i></li>
            <li><i> Удалять публикации</i></li>
            <li><i> Искать публикации по их названию</i></li>
        </ul>
    </div>
    <div class="mt-2">
        <h3>Что ждет вас в далнейшем</h3>
        <p><i>У нас большие планы на этот проект, так что будьте с нами и вы скоро увидите
            большие анонсы которые точно порадуют вас.
        </i></p>
    </div>
</div>

@endsection
