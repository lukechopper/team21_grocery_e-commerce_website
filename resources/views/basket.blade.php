@php
function calculateTotal($bOrders){
    $returnTotal = 0;
    foreach($bOrders as $bOrder){
        $returnTotal += (float)$bOrder->price;
    }
    return number_format((float)$returnTotal, 2, '.', '');
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
    <div class="container">
        <h1>Basket</h1>
        <div class="gray__border">
            @foreach($bOrders as $bOrder)
            <div class="row">
                <div class="col-md-2 col-sm-3">
                    <img class="media__image" src="{{$bOrder->product->url}}" alt="{{$bOrder->product->name}}">
                </div>
                <form class="col-md-10 col-sm-9 align-self-center" action="{{route('deleteFromBasket')}}" method="post">
                    <h5>{{$bOrder->product->name}} (x{{$bOrder->amount}}) – £{{$bOrder->price}}</h5>
                    @csrf
                    <input type="hidden" name="order_id" id="order_id" value="{{$bOrder->id}}" />
                    <button type="submit" class="btn btn-danger mt-2">Delete</button>
                </form>
            </div>
            @endforeach
            <h1 class="display-6 text-end">Total: £{{calculateTotal($bOrders)}}</h1>
        </div>
    </div>
</body>

</html>
@endsection
