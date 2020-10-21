@extends('layouts.app')

@section('title', 'ユーザ情報')

@section('container')
    {{-- ヘッダー帯表示 --}}
    @include('layouts.header')
    <div class="user-list">
        <h2 id="title">ユーザー情報</h2>
        <div class="header">
            <button class="search" onclick="search_modal_show()">絞り込み</button>
        </div>
        <table>
            <th class="user-list-id">ID</th>
            <th class="user-list-name">名前</th>
            <th class="user-list-belong">所属</th>
            <th class="user-list-details"></th>
            @isset($users)
            @foreach ($users as $user)
            <tr>
                <td class="user-list-id">{{$user->id}}</td>
                <td class="user-list-name">{{$user->name}}</td>
                <td class="user-list-belong">{{$user->profile->belong}}</td>
                <td class="user-list-details">
                    <button class="details-button" id="details{{$loop->index}}" onclick="details_modal_show(this.id)">詳細</button>
                </td>
            </tr>
            <div class="details-modal mask hidden modal" id="details{{$loop->index}}-modal">
                <div class="form-row">
                    <label class="modal-label">ID</label>
                    <label class="modal-value">{{$user->id}}</label>
                </div>
                <div class="form-row">
                    <label class="modal-label">名前</label>
                    <label class="modal-value">{{$user->name}}</label>
                </div>
                <div class="form-row">
                    <label class="modal-label">メール</label>
                    <label class="modal-value">{{$user->email}}</label>
                </div>
                <div class="form-row">
                    <label class="modal-label">所属</label>
                    <label class="modal-value">{{$user->profile->belong}}</label>
                </div>
                <div class="form-row">
                    <label class="modal-label">年齢</label>
                    <label class="modal-value">{{$user->profile->age}}</label>
                </div>
                <div class="form-row">
                    <label class="modal-label">住所</label>
                    <label class="modal-value">{{$user->profile->address}}</label>
                </div>
                <div class="button-row">
                    <button class="chancel" id="{{$loop->index}}-modal" onclick="details_modal_hidden(this.id)">閉じる</button>
                    <button class="done" id="details{{$loop->index}}-edit" onclick="details_edit_modal_show(this.id)">編集</button>
                </div>
            </div>

            <div class="details-edit-modal mask hidden modal" id="details{{$loop->index}}-edit-modal">
                <form action="{{route('userlist.update', $user->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <input type="text" name="id" style="display: none" value="{{$user->id}}">
                    <div class="form-row">
                        <label class="modal-label">メール</label>
                    <input type="text" name="email" value="{{$user->email}}">
                    </div>
                    <div class="form-row">
                        <label class="modal-label">名前</label>
                        <input type="text" name="name" value="{{$user->name}}">
                    </div>
                    <div class="form-row">
                        <label class="modal-label">所属</label>
                        <input type="text" name="belong" value="{{$user->profile->belong}}">
                    </div>
                    <div class="form-row">
                        <label class="modal-label">年齢</label>
                        <input type="number" name="age" maxlength="3" value="{{$user->profile->age}}">
                    </div>
                    <div class="form-row">
                        <label class="modal-label">住所</label>
                        <input type="text" name="address" value="{{$user->profile->address}}">
                    </div>
                    <div class="button-row">
                        <button type="button" class="chancel" id="{{$loop->index}}-edit-modal" onclick="details_modal_hidden(this.id)">閉じる</button>
                        <button type="submit" class="done">登録</button>
                    </div>
                </form>
            </div>
            
            @endforeach
            @endisset
        </table>
        <button class="add" onclick="add_modal_show()">新規登録</button>
    </div>
    <div class="mask hidden" id="mask">
        <div class="search-modal mask hidden modal" id="search-modal">
            <form action="{{route('userlist.index')}}" method="get">
                @csrf
                <div class="form-row">
                    <label class="modal-label">ID</label>
                    <input type="text" name="id">
                </div>
                <div class="form-row">
                    <label class="modal-label">名前</label>
                    <input type="text" name="name">
                </div>
                <div class="form-row">
                    <label class="modal-label">所属</label>
                    <input type="text" name="belong">
                </div>
                <div class="button-row">
                    <button type="button" class="chancel" onclick="search_modal_hidden()">閉じる</button>
                    <button type="submit" class="done">絞り込み</button>
                </div>
            </form>
        </div>
        
        <div class="add-modal mask hidden modal" id="add-modal">
            <form action="{{route('userlist.create')}}" method="get">
                @csrf
                <div class="form-row">
                    <label class="modal-label">メール</label>
                    <input type="text" name="email">
                </div>
                <div class="form-row">
                    <label class="modal-label">名前</label>
                    <input type="text" name="name">
                </div>
                <div class="form-row">
                    <label class="modal-label">パスワード</label>
                    <input type="text" name="password">
                </div>
                <div class="form-row">
                    <label class="modal-label">所属</label>
                    <input type="text" name="belong">
                </div>
                <div class="form-row">
                    <label class="modal-label">年齢</label>
                    <input type="number" name="age" maxlength="3">
                </div>
                <div class="form-row">
                    <label class="modal-label">住所</label>
                    <input type="text" name="address">
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

