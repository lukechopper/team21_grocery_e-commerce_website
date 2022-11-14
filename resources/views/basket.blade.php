@php
function calculateTotal($bOrders){
$returnTotal = 0;
foreach($bOrders as $bOrder){
$returnTotal += (float)$bOrder->price;
}
return number_format((float)$returnTotal, 2, '.', '');
}

function turnOrderIdsIntoString($bOrders){
$returnString = '';
for($i=0;$i < count($bOrders);$i++){ $bOrder=$bOrders[$i]; if($i===0){ $returnString .=$bOrder->id;
}else{
$returnString .= ', ' . $bOrder->id;
}
}
return $returnString;
}
@endphp

@extends('partials.header')

@section('title')
<title>PureFoods | Basket</title>
@endsection('title')

@section('css')
<!--all the links for style sheets custom and ready made bootstrap-->
<link rel="stylesheet" href="{{asset('css/basket.css')}}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
@endsection

@section('body')

<body>
    <div class="container mb-3">
        @if(session('success'))
        <div class="alert alert-success mt-2" role="alert">
            <p>Success. You have made the purchase!</p>
            <p class="mb-0">Click <a href="{{route('home')}}" class="alert-link">here</a> to go back to the homepage.</p>
        </div>
        @elseif(session('error'))
        <div class="alert alert-danger mt-2" role="alert">
            <p>Error. Something went wrong!</p>
            <p class="mb-0">Click <a href="{{route('viewBasket')}}" class="alert-link">here</a> to try again.</p>
        </div>
        @else
        <h1>Basket</h1>
        <div class="gray__border">
            @foreach($bOrders as $bOrder)
            <div class="row">
                <div class="col-md-2 col-sm-3">
                    <a href="{{route('viewProduct', $bOrder->product_id)}}" class="inline-link"><img class="media__image" src="{{$bOrder->product->url}}" alt="{{$bOrder->product->name}}"></a>
                </div>
                <form class="col-md-10 col-sm-9 align-self-center" action="{{route('deleteFromBasket')}}" method="post">
                    <h5><a href="{{route('viewProduct', $bOrder->product_id)}}" class="inline-link">{{$bOrder->product->name}} (x{{$bOrder->amount}}) – £{{$bOrder->price}}</a></h5>
                    @csrf
                    <input type="hidden" name="order_id" id="order_id" value="{{$bOrder->id}}" />
                    <button type="submit" class="btn btn-danger mt-2">Delete</button>
                </form>
            </div>
            @endforeach
            <h1 class="display-6 text-end">Total: £{{calculateTotal($bOrders)}}</h1>
        </div>
        <h1 class="mt-2">Purchase</h1>
        <form action="{{route('makePurchase')}}" method="post" class="mt-3">
            @csrf
            <input type="hidden" name="order_ids" value="{{turnOrderIdsIntoString($bOrders)}}" />
            <div class="mb-3 row">
                <div class="col-md-6">
                    <label for="first_name" class="form-label">First Name:</label>
                    <input type="text" id="first_name" name="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{old('first_name')}}">
                    @error('first_name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="col-md-6 medium_margin_top">
                    <label for="last_name" class="form-label">Last Name:</label>
                    <input type="text" id="last_name" name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{old('last_name')}}">
                    @error('last_name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-md-6">
                    <label for="address" class="form-label">Address:</label>
                    <input type="text" id="address" name="address" class="form-control @error('address') is-invalid @enderror" value="{{old('address')}}">
                    @error('address')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="col-md-6 medium_margin_top">
                    <label for="phone_number" class="form-label">Phone:</label>
                    <input type="text" id="phone_number" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" value="{{old('phone_number')}}">
                    @error('phone_number')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-auto">
                    <button type="submit" class="btn btn-success btn-block w-100">Order</button>
                </div>
            </div>
        </form>
        @endif
    </div>
</body>

</html>
@endsection
