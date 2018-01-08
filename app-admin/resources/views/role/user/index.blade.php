<?php
ufa()->extCss([
    'role/user/index'
]);
ufa()->extJs([
    'role/user/index',
]);
?>
@extends('layouts.master')
@section('master.content')
    <div class="filter-box">
        <div class="add">
            <a href="{{route('role.user.edit',['id'=>0])}}" class="button add-btn">+用户</a>
        </div>
        <table class="table" cellspacing="0" cellpadding="0">
            <thead>
            <tr>
                <th>#</th>
                <th width="150">账号</th>
                <th width="300">公司名称</th>
                <th width="200">职位</th>
                <th width="200">姓名</th>
                <th width="150">手机号</th>
                <th width="200">用户角色</th>
                <th width="100">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach(($items ?? []) as $item)
                <tr>
                    <th scope="row">{{$item['id'] or 0}}</th>
                    <td>{{$item['account'] or ''}}</td>
                    <td>{{$item['company_name'] or ''}}</td>
                    <td>{{$item['position'] or ''}}</td>
                    <td>{{$item['name'] or ''}}</td>
                    <td>{{$item['phone'] or ''}}</td>
                    <td>{{$item['roles'][0]['name'] or ''}}</td>
                    <td>
                        <a title="编辑" class="icon-edit" href="{{route('role.user.edit',['id'=>$item['id'] ?? 0])}}">
                            <i class="iconfont">&#xe626;</i>
                        </a>
                        <a title="删除" class="delete" data-id="{{$item['id']}}">
                            <i class="iconfont">&#xe601;</i>
                        </a>
                        <a title="密码重置" class="icon-edit" href="{{route('role.user.set-password',['id'=>$item['id'] ?? 0])}}">
                            <i class="iconfont">&#xe739;</i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    </div>
    {{--分页--}}
    @if(!$paginate->isEmpty())
        <div class="patials-paging">
            {!! $paginate->render() !!}
        </div>
    @endif
    @include('common.prompt-pop',['type'=>1])
    @include('common.confirm-pop' ,['type' => 2,'confirm_text' => ""])
@endsection