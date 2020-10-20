@extends('layouts.app')

@section('title', '案件情報')

@section('container')
{{-- ヘッダー帯表示 --}}
@include('layouts.header')
<div class="user-list">
    <h2>案件情報</h2>
    <div class="header">
        <button class="search" onclick="search_modal_show()">絞り込み</button>
    </div>
    <table>
        <th class="matter-list-id">ID</th>
        <th class="matter-list-name">案件名</th>
        <th class="matter-list-price">金額</th>
        @isset($matters)
            @foreach ($matters as $matter)
            <tr>
                <td class="matter-list-id">{{$matter->id}}</td>
                <td class="matter-list-name">{{$matter->matter_name}}</td>
                <td class="matter-list-price">{{$matter->price}}</td>
            </tr>
            @endforeach
        @endisset
    </table>
    <button class="add" onclick="add_modal_show()">新規登録</button>
</div>

<div class="mask hidden" id="mask">
    <div class="search-modal mask hidden modal" id="search-modal">
        <form aaction="{{route('matterlist.index')}}" method="get">
            @csrf
            <div class="form-row">
                <label class="modal-label">ID</label>
                <input type="text" name="id">
            </div>
            <div class="form-row">
                <label class="modal-label">案件名</label>
                <input type="text" name="name">
            </div>
            <div class="form-row">
                <label class="modal-label">見積金額</label>
                <input type="number" name="price">
            </div>
            <div class="button-row">
                <button type="button" class="chancel" onclick="search_modal_hidden()">閉じる</button>
                <button type="submit" class="done">絞り込み</button>
            </div>
        </form>
    </div>

    <div class="add-modal-matter mask hidden modal" id="add-modal">
        <form action="{{route('matterlist.create')}}" method="get">
            @csrf
            <div class="form-row">
                <label class="modal-label">名前</label>
                <input type="text" name="name">
            </div>
            <div class="form-row">
                <label class="modal-label">見積金額</label>
                <input type="number" name="price" maxlength="3">
            </div>
            
            <div class="button-row">
                <button type="button" class="chancel" onclick="add_modal_hidden()">閉じる</button>
                <button type="submit" class="done">登録</button>
            </div>
        </form>
    </div>
</div>
@endsection

<script src=" {{asset('js/modal.js')}}"></script>