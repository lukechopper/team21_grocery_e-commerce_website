@extends('partials.header')

@section('title')
<title>PureFoods | Basket</title>
@endsection('title')

@section('css')
<!--all the links for style sheets custom and ready made bootstrap-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
@endsection

@section('body')

<body>
    <div class="container">
        <h1>Basket</h1>
        @foreach($bOrders as $bOrder)
        <p>{{$bOrder->product->name}}</p>
        @endforeach
    </div>
</body>

</html>
@endsection
