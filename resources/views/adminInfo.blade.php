@extends('partials.header')

@section('title')
<title>PureFoods | Admin Info</title>
@endsection('title')

@section('css')
<!--all the links for style sheets custom and ready made bootstrap-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
@endsection

@section('body')

<body>
    <div class="container">
        @if(!count($customers))
        <div class="alert alert-secondary" role="alert">
            Sorry. There are no customers... yet.
        </div>
        @else
        <h1>All Customers</h1>
        <div class="row align-self-center d-none d-md-flex">
            <div class="col-md-6 align-self-center">
                <p><strong>Username</strong></p>
            </div>
            <div class="col-md-6 align-self-center">
                <p><strong>Email</strong></p>
            </div>
        </div>
        @foreach($customers as $index=>$customer)
            <div class="row">
                <div class="col-md-6">
                    <p><span class="d-inline d-sm-inline d-md-none">Username: </span>{{$customer->username}}</p>
                </div>
                <div class="col-md-6">
                    <p><span class="d-inline d-sm-inline d-md-none">Email: </span>{{$customer->email}}</p>
                </div>
            </div>
            @if($index < count($customers) - 1)
            <hr />
            @endif
        @endforeach
    @endif
    </div>
</body>

</html>
@endsection
