
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="brand" href="{{ url('back') }}">Revent</a>
            <div class="nav-collapse collapse">

                <p class="navbar-text pull-right">
                    <a href="{{ url('/logout') }}" class="navbar-link" onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                        退出
                    </a>
                </p>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                      style="display: none;">
                    {{ csrf_field() }}
                </form>
                <ul class="nav">
                    <li class="active"><a href="{{ url('back') }}">首页</a></li>
                    {{-- <li class="dropdown">
                        <a href="#" class="dropdown-toggle hidden" data-toggle="dropdown">活动<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">类型 1</a></li>
                            <li><a href="#">类型 2</a></li>
                            <li><a href="#">类型 3</a></li>
                            <li class="divider"></li>
                            <li class="nav-header">事件</li>
                            <li><a href="#">类型 1</a></li>
                            <li><a href="#">类型 2</a></li>
                        </ul>
                    </li>
                    --}}
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>
