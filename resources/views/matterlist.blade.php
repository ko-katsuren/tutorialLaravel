@extends('layouts.app')

@section('title', '案件情報')

@section('container')
{{-- ヘッダー帯表示 --}}
@include('layouts.header')
<div class="user-list">
    <h2>案件情報</h2>
    <div class="header">
        <button class="search">絞り込み</button>
    </div>
    <table>
        <th class="">ID</th>
        <th class="">案件名</th>
        <th class="">金額</th>
        <th class=""></th>
        <tr>
            <td class="matter-list-id">1</td>
            <td class="matter-list-name">あいうえおビル建設工事</td>
            <td class="matter-list-belong">20,000,000</td>
            <td class="matter-list-details"><button class="details-button">詳細</button></td>
        </tr>
    </table>
    <button class="add">新規登録</button>
</div>
@endsection