@extends('layouts.app')

@section('title', 'ダッシュボード')

@section('container')
{{-- ヘッダー帯表示 --}}
@include('layouts.header')
<div class="select-item-wrapper">
    <div class="select-left">
        <div class="select-item">
            <a href="{{route('userlist.index')}}" class="fa fa-user"></a>
            <p>ユーザー情報</p>
        </div>
    </div>
    <div class="select-right">
        <div class="select-item">
            <a href="{{route('matterlist.index')}}" class="fa fa-list"></a>
            <p>案件情報</p>
        </div>
    </div>
</div>

@endsection