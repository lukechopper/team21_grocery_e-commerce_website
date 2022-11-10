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
            <div class="card card--no_border">
            <a href="{{route('viewProduct',$products[$i]->id)}}" class="inline-link"><img src="{{$products[$i]->url}}" class="card__product_image card-img-top"/></a>
                <div class="card-body">
                    <a href="{{route('viewProduct',$products[$i]->id)}}" class="inline-link">
                    <h4 class="card__title card__title--extra_height">{{$products[$i]->name}}</h4>
                    </a>
                    <p class="card-text">{{$products[$i]->price}} – {{$products[$i]->categories}}</p>
                </div>
            </div>
        </div>
        @if($i === count($products))
        </div>
        @endif
      @endfor
      @else
        <div class="alert alert-danger mt-2" role="alert">
        Sorry. No products could be found.
        </div>
      @endif
    </div>
</body>

</html>
@endsection
