@extends('partials.header')

@section('title')
<title>PureFoods | Sign Up</title>
@endsection('title')

@section('css')
<!--all the links for style sheets custom and ready made bootstrap-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link rel="stylesheet" href="css/style.css">
@endsection

@section('body')

<body>
    <div class="container">
        <h1>Sign Up</h1>
        <p class="lead">Create and account to keep track of your orders</p>
        <form action="" method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" class="form-control" value="{{old('username')}}" />
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" value="{{old('email')}}" />
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" />
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" />
            </div>
            <div class="row">
                <div class="col-12 col-xl-auto mt-2">
                    <button type="submit" class="btn btn-success btn-block w-100">Submit</button>
                </div>
                <div class="col-12 col-xl-auto mt-2">
                    <button type="submit" class="btn btn-danger btn-block w-100">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
@endsection
