@extends('partials.header')

@section('title')
<title>PureFoods | Login</title>
@endsection('title')

@section('css')
<!--all the links for style sheets custom and ready made bootstrap-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('css/input.css')}}">
@endsection

@section('body')

<body>
    <div class="container mb-4">
        <div class="wrapper">
        @if(session('success'))
        <div class="alert alert-success mt-2" role="alert">
            <p>Success. You are now logged in!</p>
            <p class="mb-0">Click <a href="{{route('home')}}" class="alert-link">here</a> to go back to the homepage.</p>
        </div>
        @else
        <h1>Login</h1>
        <p class="lead">Login to a registered account</p>
        @if(session('error'))
        <div class="alert alert-danger" role="alert">Wrong account details. Try again.</div>
        @endif
        <form action="{{route('accessAccount')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="@if(!empty(old('email'))){{old('email')}}@else{{session('email')}}@endif" />
                @error('email')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" />
                @error('password')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="remember" id="remember">
                <label class="form-check-label" for="remember">Remember me: </label>
            </div>
            <div class="row">
                <div class="col-12 col-md-auto mt-2">
                    <button type="submit" class="btn_style">Login</button>
                </div>
            </div>
        </form>
    @endif
</div>
    </div>
</body>

</html>
@endsection
