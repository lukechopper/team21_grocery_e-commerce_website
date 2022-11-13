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
        <div class="alert alert-secondary mb-3" role="alert">
            Sorry. There are no customers... yet.
        </div>
        @else
        <h1>Customers</h1>
        <div class="row align-items-center d-none d-md-flex">
            <div class="col-md-4 text-md-center">
                <p><strong>Username</strong></p>
            </div>
            <div class="col-md-4 text-md-center">
                <p><strong>Email</strong></p>
            </div>
            <div class="col-md-4 text-md-center">
                <p><strong>Created At</strong></p>
            </div>
        </div>
        @foreach($customers as $index=>$customer)
            <div class="row align-items-center">
                <div class="col-md-4 text-md-center">
                    <p><span class="d-inline d-sm-inline d-md-none">Username: </span>{{$customer->username}}</p>
                </div>
                <div class="col-md-4 text-md-center">
                    <p><span class="d-inline d-sm-inline d-md-none">Email: </span>{{$customer->email}}</p>
                </div>
                <div class="col-md-4 text-md-center">
                    <p><span class="d-inline d-sm-inline d-md-none">Created At: </span>{{date_format($customer->created_at, 'd/m/Y')}}</p>
                </div>
            </div>
            @if($index < count($customers) - 1)
            <hr />
            @endif
        @endforeach
        <div class="mb-3"></div>
    @endif
    @if(!count($apOrders))
    <div class="alert alert-secondary mb-3" role="alert">
        Sorry. There are no currently placed orders... yet.
    </div>
    @else
    <h1>Currently Placed Orders</h1>
    <div class="row d-none d-md-flex">
        <div class="col-md-3">
            <p><strong>Description</strong></p>
        </div>
        <div class="col-md-1 align-self-center text-md-center">
            <p><strong>Price</strong></p>
        </div>
        <div class="col-md-2 align-self-center text-md-center">
            <p><strong>Address</strong></p>
        </div>
        <div class="col-md-2 align-self-center text-md-center">
            <p><strong>First Name</strong></p>
        </div>
        <div class="col-md-2 align-self-center text-md-center">
            <p><strong>Last Name</strong></p>
        </div>
        <div class="col-md-2 align-self-center text-md-center">
            <p><strong>Phone Number</strong></p>
        </div>
    </div>
    @foreach($apOrders as $index=>$apOrder)
    <div class="row">
        <div class="col-md-3 align-self-center">
            <p>{{$apOrder['desc']}}</p>
        </div>
        <div class="col-md-1 align-self-center text-md-center">
            <p><span class="d-inline d-sm-inline d-md-none">Price: </span>£{{number_format((float)$apOrder['price'], 2, '.', '')}}</p>
        </div>
        <div class="col-md-2 align-self-center text-md-center">
            <p><span class="d-inline d-sm-inline d-md-none">Address: </span>{{$apOrder['address']}}</p>
        </div>
        <div class="col-md-2 align-self-center text-md-center">
            <p><span class="d-inline d-sm-inline d-md-none">First Name: </span>{{$apOrder['first_name']}}</p>
        </div>
        <div class="col-md-2 align-self-center text-md-center">
            <p><span class="d-inline d-sm-inline d-md-none">Last Name: </span>{{$apOrder['last_name']}}</p>
        </div>
        <div class="col-md-2 align-self-center text-md-center">
            <p><span class="d-inline d-sm-inline d-md-none">Phone Number: </span>{{$apOrder['phone_number']}}</p>
        </div>
    </div>
    @if($index < count($apOrders) - 1)
    <hr />
    @endif
    @endforeach
    <div class="mb-3"></div>
    @endif
    @if(!count($products))
    <div class="alert alert-secondary" role="alert">
        Sorry. There are no products currently in stock... yet.
    </div>
    @else
    <h1>Products In Stock</h1>
    <div class="row align-items-center d-none d-md-flex">
        <div class="col-md-4 text-md-center">
            <p><strong>Name</strong></p>
        </div>
        <div class="col-md-4 text-md-center">
            <p><strong>Type</strong></p>
        </div>
        <div class="col-md-4 text-md-center">
            <p><strong>Price</strong></p>
        </div>
    </div>
    @foreach($products as $index=>$product)
        <div class="row align-items-center">
            <div class="col-md-4 text-md-center">
                <p><span class="d-inline d-sm-inline d-md-none">Name: </span>{{$product->name}}</p>
            </div>
            <div class="col-md-4 text-md-center">
                <p><span class="d-inline d-sm-inline d-md-none">Type: </span>{{$product->categories}}</p>
            </div>
            <div class="col-md-4 text-md-center">
                <p><span class="d-inline d-sm-inline d-md-none">Price: </span>{{$product->price}}</p>
            </div>
        </div>
        @if($index < count($products) - 1)
        <hr />
        @endif
    @endforeach
    @endif
    </div>
</body>

</html>
@endsection
