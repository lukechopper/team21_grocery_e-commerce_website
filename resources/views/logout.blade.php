@extends('partials.header')

@section('title')
<title>PureFoods | Logout</title>
@endsection('title')

@section('css')
<!--all the links for style sheets custom and ready made bootstrap-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
@endsection

@section('body')

<body>
    <div class="container">
        <div class="alert alert-success mt-2" role="alert">
            <p>Success. You have been logged out!</p>
            <p class="mb-0">Click <a href="{{route('home')}}" class="alert-link">here</a> to go back to the homepage.</p>
        </div>
    </div>
</body>

</html>
@endsection
