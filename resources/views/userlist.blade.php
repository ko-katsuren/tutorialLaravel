@extends('layouts.app')

@section('title', 'ユーザ情報')

@section('container')
    {{-- ヘッダー帯表示 --}}
    @include('layouts.header')
    <div class="user-list">
        <h2>ユーザー情報</h2>
        <div class="header">
            <button class="search">絞り込み</button>
        </div>
        <table>
            <th>ID</th>
            <th>名前</th>
            <th>所属</th>
            <th></th>
            <tr>
                <td class="user-list-id">1</td>
                <td class="user-list-name">鈴木　太郎</td>
                <td class="user-list-belong">営業部営業課</td>
                <td class="user-list-details"><button class="details-button">詳細</button></td>
            </tr>
        </table>
        <button class="add">新規登録</button>
    </div>
    <div class="mask hidden">
        <div class="modal-search mask hidden">
            <form action="">
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
                    <button class="chancel">閉じる</button>
                    <button type="submit" class="done">絞り込み</button>
                </div>
            </form>
        </div>
        <div class="modal-details mask hidden">
            <div class="form-row">
                <label class="modal-label">ID</label>
                <label class="modal-value">1</label>
            </div>
            <div class="form-row">
                <label class="modal-label">名前</label>
                <label class="modal-value">2</label>
            </div>
            <div class="form-row">
                <label class="modal-label">所属</label>
                <label class="modal-value">3</label>
            </div>
            <div class="form-row">
                <label class="modal-label">年齢</label>
                <label class="modal-value">4</label>
            </div>
            <div class="form-row">
                <label class="modal-label">住所</label>
                <label class="modal-value">5</label>
            </div>
            <div class="button-row">
                <button class="chancel">閉じる</button>
                <button class="done">絞り込み</button>
            </div>
        </div>
        <div class="modal-add mask hidden">
            <form action="">
                <div class="form-row">
                    <label class="modal-label">名前</label>
                    <input type="text" name="name">
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
                    <button class="chancel">閉じる</button>
                    <button class="done">絞り込み</button>
                </div>
            </form>
        </div>
    </div>
@endsection

