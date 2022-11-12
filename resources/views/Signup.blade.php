@extends('partials.header')

@section('title')
<title>PureFoods | Sign Up</title>
@endsection('title')

@section('css')
<!--all the links for style sheets custom and ready made bootstrap-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
@endsection

@section('body')

<body>
    <div class="container">
    @if(session('success'))
        <div class="alert alert-success mt-2" role="alert">
        <p>Success. The account has been created!</p>
        <p class="mb-0">Click here to <a href="{{route('login')}}" class="alert-link">Login.</a></p>
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger mt-2" role="alert">
        <p>Error. The account could not be created!</p>
        <p class="mb-0">Click <a href="{{route('signup')}}" class="alert-link">here</a> to try again.</p>
        </div>
    @else
        <h1>Sign Up</h1>
        <p class="lead">Create and account to keep track of your orders</p>
        <form action="{{route('register')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" value="{{old('username')}}" />
                @error('username')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" />
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
            <div class="form-group">
                <label for="password_confirmation">Confirm Password:</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" />
            </div>
            <div class="row">
                <div class="col-12 col-md-auto mt-2">
                    <button type="submit" class="btn btn-success btn-block w-100">Register</button>
                </div>
            </div>
        </form>
    @endif
    </div>
</body>

</html>
@endsection
