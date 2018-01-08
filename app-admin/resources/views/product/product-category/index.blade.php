<?php
ufa()->extCss([
    'product/product-category/index'
]);
ufa()->extJs([
    'product/product-category/index',
]);
?>
@extends('layouts.master')
@section('master.content')
    <div class="filter-box">
        <div class="add">
            <a href="{{route('product.product-category.edit')}}" class="button add-btn">添加</a>
        </div>
    </div>
    <table class="table" cellspacing="0" cellpadding="0">
        <thead>
        <tr>
            <th width="150">排序</th>
            <th width="450">分类名称</th>
            <th width="150">是否启用</th>
            <th width="250">操作</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>燃气灶</td>
                <td>是</td>
                <td>
                    <a class="icon-edit" title="编辑" href="{{route('product.product-category.edit')}}">
                        <i class="iconfont">&#xe626;</i>
                    </a>
                    <a data-id="" title="删除" class="delete">
                        <i class="iconfont">&#xe601;</i>
                    </a>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>燃气灶</td>
                <td>是</td>
                <td>
                    <a class="icon-edit" title="编辑" href="{{route('product.product-category.edit')}}">
                        <i class="iconfont">&#xe626;</i>
                    </a>
                    <a data-id="" title="删除" class="delete">
                        <i class="iconfont">&#xe601;</i>
                    </a>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>燃气灶</td>
                <td>是</td>
                <td>
                    <a class="icon-edit" title="编辑" href="{{route('product.product-category.edit')}}">
                        <i class="iconfont">&#xe626;</i>
                    </a>
                    <a data-id="" title="删除" class="delete">
                        <i class="iconfont">&#xe601;</i>
                    </a>
                </td>
            </tr>
            <tr>
                <td>4</td>
                <td>燃气灶</td>
                <td>是</td>
                <td>
                    <a class="icon-edit" title="编辑" href="{{route('product.product-category.edit')}}">
                        <i class="iconfont">&#xe626;</i>
                    </a>
                    <a data-id="" title="删除" class="delete">
                        <i class="iconfont">&#xe601;</i>
                    </a>
                </td>
            </tr>
            <tr>
                <td>5</td>
                <td>燃气灶</td>
                <td>是</td>
                <td>
                    <a class="icon-edit" title="编辑" href="{{route('product.product-category.edit')}}">
                        <i class="iconfont">&#xe626;</i>
                    </a>
                    <a data-id="" title="删除" class="delete">
                        <i class="iconfont">&#xe601;</i>
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
@endsection