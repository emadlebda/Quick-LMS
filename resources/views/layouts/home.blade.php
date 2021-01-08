<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>Quick LMS</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <style>
        body {
            padding-top: 100px;
        }
    </style>
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top ">
    <div class="container">
        <div class="col-lg-6">
            <div class="navbar-brand">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                        aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-lg-6 text-right" style="padding-top: 10px">
            @if (Auth::check())
                <div style="color:white">
                    Logged in as {{ Auth::user()->email }}
                    <form action="{{ route('logout') }}" method="post">
                        {{ csrf_field() }}
                        <input type="submit" value="Logout" class="btn btn-info">
                    </form>
                </div>
            @else
                <form action="{{ route('login') }}" method="post">
                    {{ csrf_field() }}
                    <input type="email" name="email" placeholder="Email"/>
                    <input type="password" name="password" placeholder="Password"/>
                    <input type="submit" value="Login" class="btn btn-info">
                </form>
            @endif
        </div>


    </div>
</nav>

<!-- Page Content -->
<div class="container ">

    <div class="row">

        <div class="col-lg-3">

            @yield('sidebar')

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">
            <div class="row">
                @yield('content')
            </div>
            <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="{{asset('js/app.js')}}"></script>

</body>

</html>
