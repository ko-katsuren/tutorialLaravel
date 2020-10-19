@extends('layouts.app')

@section('title', '新規登録')

@section('container')
<div class="signin-form">
    @isset($message)
    <p>{{$message}}</p>
    @endisset

    @isset($name)
    <p>{{$name}}</p>
    @endisset

    @isset($email)
    <p>{{$email}}</p>
    @endisset

    @isset($password)
    <p>{{$password}}</p>
    @endisset

    <form action="{{route('signup')}}" method="post">
        @csrf
        <div class="form-row">
            <label class="form-label">名前</label>
            <input type="text" name="name" class="form-input">
        </div>
        <div class="form-row">
            <label class="form-label">メールアドレス</label>
            <input type="email" name="email" class="form-input">
        </div>
        <div class="form-row">
            <label class="form-label">パスワード</label>
            <input type="password" name="password" class="form-input">
        </div>
        <button type="submit">登録</button>
    </form>
</div>
@endsection