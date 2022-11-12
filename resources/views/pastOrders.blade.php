@php
function calculateTotalSpent($pOrders){
$returnTotal = 0;
foreach($pOrders as $pOrder){
$returnTotal += (float)$pOrder['price'];
}
return number_format((float)$returnTotal, 2, '.', '');
}
@endphp

@extends('partials.header')

@section('title')
<title>PureFoods | Past Orders</title>
@endsection('title')

@section('css')
<!--all the links for style sheets custom and ready made bootstrap-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
@endsection

@section('body')

<body>
    <div class="container">
        <h1>Past Orders</h1>
        @foreach($pOrders as $index=>$pOrder)
        <div class="row">
            <div class="col-md-3">
                <h5>{{$pOrder['desc']}}</h5>
            </div>
            <div class="col-md-1 align-self-center text-md-center">
                <p>£{{number_format((float)$pOrder['price'], 2, '.', '')}}</p>
            </div>
            <div class="col-md-2 align-self-center text-md-center">
                <p>{{$pOrder['address']}}</p>
            </div>
            <div class="col-md-2 align-self-center text-md-center">
                <p>{{$pOrder['first_name']}}</p>
            </div>
            <div class="col-md-2 align-self-center text-md-center">
                <p>{{$pOrder['last_name']}}</p>
            </div>
            <div class="col-md-2 align-self-center text-md-center">
                <p>{{$pOrder['phone_number']}}</p>
            </div>
        </div>
        @if($index < count($pOrders) - 1)
        <hr />
        @endif
        @endforeach
        <h1 class="display-6 text-md-end mt-3">Total Spent: £{{calculateTotalSpent($pOrders)}}</h1>
    </div>
</body>

</html>
@endsection
