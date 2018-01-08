<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-collapse" id="bs-example-navbar-collapse-1">
            <div class="logo-box">
                <a href="/">后台管理系统</a>
            </div>

            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">
                        Hi，{{$basic_data['user']->name or ''}}
                    </a>
                </li>
                <li>
                    <a href="{{route('logout')}}">退出</a>
                </li>
            </ul>
        </div>
    </div>
</nav>