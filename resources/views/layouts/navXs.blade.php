<nav class="navbar navbar-default navbar-fixed-top visible-xs navbar-xs">
    <div class="container">
        <div class="nav navbar-header">
            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                <img class="img-circle" src="/img/logo.png" width="24" height="24" />
                {{--{{ config('app.name', 'Laravel') }}--}}
            </a>
        </div>

        <!-- Left Side Of Navbar -->
        <ul class="nav navbar-nav navbar-left">
            <li category-id="0"><a href="/">推荐</a></li>
            @foreach($categories as $category)
                <li category-id="{{$category->id}}"><a href="/category/{{$category->id}}">{{$category->name}}</a></li>
            @endforeach
        </ul>

        <!-- Right Side Of Navbar -->
        {{--<ul class="nav navbar-nav navbar-right">--}}
            {{--<!-- Authentication Links -->--}}
            {{--@if (Auth::guest())--}}
                {{--<li><a href="{{ url('/login') }}">登录</a></li>--}}
                {{--<li><a href="{{ url('/register') }}">注册</a></li>--}}
            {{--@else--}}
                {{--<li class="dropdown">--}}
                    {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">--}}
                        {{--{{ Auth::user()->name }} <span class="caret"></span>--}}
                    {{--</a>--}}

                    {{--<ul class="dropdown-menu" role="menu">--}}
                        {{--<li>--}}
                            {{--<a href="{{ url('/logout') }}"--}}
                               {{--onclick="event.preventDefault();--}}
                                                 {{--document.getElementById('logout-form').submit();">--}}
                                {{--退出--}}
                            {{--</a>--}}

                            {{--<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">--}}
                                {{--{{ csrf_field() }}--}}
                            {{--</form>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
            {{--@endif--}}
        {{--</ul>--}}
    </div>
</nav>