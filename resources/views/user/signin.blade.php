@extends('layouts.app')

@section('title', 'ログイン')

@section('container')
<div class="signin-form">
    <h1>Laravle</h1>

    <form action="{{route('signin')}}" method="post">
        @csrf
        <div class="form-row">
            <label class="form-label">メールアドレス</label>
            <input type="email" name="email" class="form-input">
        </div>

        <div class="form-row">
            <label class="form-label">パスワード</label>
            <input type="password" name="password" class="form-input">
        </div>
        <p>{{$message}}</p>
        <button type="submit" class="signin-button">サインイン</button>
    </form>
</div>
@endsection