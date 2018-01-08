<?php
$menus = [
    '产品分类' => [
        'product.product-category.index',
        'product.product-category.edit'
    ],
    '角色管理' => [
        'role.role.index',
        'role.role.edit'
    ],
    '用户管理' => [
        'role.user.index',
        'role.user.edit'
    ]
];
$url_name = request()->route()->getName();
?>

<ul class="nav nav-pills nav-stacked nav-pills-stacked-example">
    <li role="presentation">
        <a href="#">
            <span class="caret"></span>产品管理</a>
        <ul class="nav sidebar-trans">
            <li @if(in_array($url_name,$menus['产品分类']) ) class="active" @endif>
                <a href="{{route('product.product-category.index')}}">
                    <i class="iconfont">&#xe60e;</i>产品分类
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="iconfont">&#xe661;</i>产品列表
                </a>
            </li>
        </ul>
    </li>

    <li role="presentation">
        <a href="#"><span class="caret"></span>后台设置</a>

        <ul class="nav sidebar-trans">
            <li @if(in_array($url_name,$menus['角色管理']) ) class="active" @endif>
                <a href="{{route('role.role.index')}}">
                    <i class="iconfont">&#xe600;</i>角色管理
                </a>
            </li>
            <li @if(in_array($url_name,$menus['用户管理']) ) class="active" @endif>
                <a href="{{route('role.user.index')}}">
                    <i class="iconfont">&#xe65f;</i>用户管理
                </a>
            </li>

        </ul>
    </li>
</ul>