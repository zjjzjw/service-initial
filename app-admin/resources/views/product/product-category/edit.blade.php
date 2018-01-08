<?php
ufa()->extCss([
    'product/product-category/edit'
]);
ufa()->extJs([
    'product/product-category/edit',
]);
?>
@extends('layouts.master')
@section('master.content')
    <div class="wrap-content">
        <p class="top-title">添加分类</p>
        <form id="form" onsubmit="return false">

            <div class="row">
                <div class="small-12 columns">
                    <input type="text" name="" value=""
                           placeholder="创建分类"
                           data-validation="required length"
                           data-validation-length="max255"
                           data-validation-error-msg="创建分类"/>
                </div>
            </div>

            <div class="row">
                <div class="small-12 columns">
                    <input type="text" name="" value=""
                           placeholder="排序"
                           data-validation="required length"
                           data-validation-length="max255"
                           data-validation-error-msg="排序"/>
                </div>
            </div>

            <div class="row judge">
                <div class="small-4">
                    <label>是否启用</label>
                </div>
                <div class="small-8 option">
                    <input type="radio" name="" value=""
                                   id="checkbox-first"
                            />
                    <label for="checkbox-first">是</label>
                    <input type="radio" name="" value=""
                               id="checkbox-second"
                        />
                    <label for="checkbox-second">否</label>
                </div>
            </div>

            <div class="text-center">
                <input type="hidden" name="" value="">
                <input type="submit" class="button small-width save" value="保存">
                <a class="button small-width clone" href="JavaScript:history.back();">返回</a>
            </div>
        </form>
    </div>
@endsection