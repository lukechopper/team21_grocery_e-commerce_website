@extends('partials.header')

@section('css')
   <!--all the links for style sheets custom and ready made bootstrap-->
   <link rel="stylesheet" href="{{asset('css/product.css')}}">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
@endsection

@section('body')
<body>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-auto">
            <div class="card card--no_border">
                <img src="{{$product->url}}" class="product-image"/>
                <div class="card-body">
                    <h5 class="card-title">{{$product->name}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{$product->price}} – {{$product->categories}}</h6>
                    <p class="card-text">{{$product->description}}</p>
                </div>
            </div>
        </div>
      </div>
    </div>
</body>

</html>
@endsection
