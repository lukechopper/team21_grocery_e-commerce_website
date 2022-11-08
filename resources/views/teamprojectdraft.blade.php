@extends('partials.header')

@section('title')
<title>PureFoods | Homepage</title>
@endsection('title')

@section('css')
   <!--all the links for style sheets custom and ready made bootstrap-->
   <link rel="stylesheet" href="{{asset('css/teamprojectdraft.css')}}">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
@endsection

@section('body')
<body>
    <div class="container">
      @if(count($products))
      @for($i=0;$i < count($products); $i++)
        @if($i % 3 === 0 && $i > 1)
        </div>
        @endif
        @if($i % 3 === 0)
        <div class="row">
        @endif
        <div class="col-md-4 product-image__column" >
            <img src="{{$products[$i]->url}}" class="product-image"/>
            <h4 class="card-title">{{$products[$i]->name}}</h4>
            <p class="card-text">{{$products[$i]->price}}</p>
        </div>
        @if($i === count($products))
        </div>
        @endif
      @endfor
      @else
      <h1>Sorry. No products can be found</h1>
      @endif
    </div>
</body>

</html>
@endsection
