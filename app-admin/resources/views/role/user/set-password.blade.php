<?php
ufa()->extCss([
    'role/user/set-password'
]);
ufa()->extJs([
    'role/user/set-password',
    '../lib/jquery-form-validator/jquery.form-validator',
]);
ufa()->addParam(['id' => $id ?? 0]);
?>
@extends('layouts.master')
@section('master.content')
    <div class="wrap-content">
        @if(empty($id))
            <p class="top-title">修改密码</p>
        @else
            <p class="top-title">设置密码</p>
        @endif
        <form id="form" onsubmit="return false">
            <div class="content-box">
                <div class="row">
                    <div class="small-8 columns">
                        <label>密码</label>
                    </div>
                    <div class="small-14 columns columns">
                        <input type="password" name="password" value=""
                               data-validation="required length"
                               data-validation-length="6 20"
                               data-validation-error-msg="请输入6-20位密码"/>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <input type="hidden" name="id" value="{{$id ?? 0}}">
                <input type="submit" class="button small-width save" value="保存">
                <a class="button small-width clone" href="JavaScript:history.back();">返回</a>
            </div>
        </form>
    </div>
    @include('common.success-pop')
    @include('common.loading-pop')
    @include('common.prompt-pop',['type'=>1])
@endsection