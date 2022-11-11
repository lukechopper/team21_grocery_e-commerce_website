@extends('partials.header')

@section('css')
<!--all the links for style sheets custom and ready made bootstrap-->
<link rel="stylesheet" href="{{asset('css/product.css')}}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
@endsection

@section('body')

<body>
    <div class="container">
        @if(session('success'))
        <div class="alert alert-success mt-2" role="alert">
            <p>Success. You have made the purchase!</p>
            <p class="mb-0">Click <a href="#" class="alert-link">here</a> to visit basket.</p>
        </div>
        @elseif(session('error'))
        <div class="alert alert-danger mt-2" role="alert">
            <p>Error. The purchase could not be made!</p>
            <p class="mb-0">Click <a href="{{route('viewProduct', $product->id)}}" class="alert-link">here</a> to try again.</p>
        </div>
        @else
        <div class="row justify-content-center">
            <div class="col-auto">
                <div class="card card--no_border">
                    <img src="{{$product->url}}" class="card__product_image" />
                    <div class="card-body">
                        <h5 class="card-title">{{$product->name}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{$product->price}} – {{$product->categories}}</h6>
                        <p class="card-text">{{$product->description}}</p>
                    </div>
                </div>
            </div>
            @guest
            <div class="alert alert-secondary" role="alert">
                Please <a href="{{route('login')}}" class="alert-link">Log In</a> to be able to buy this.
            </div>
            @endguest
            @auth
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form action="{{route('makeOrder')}}" method="post">
                        @csrf
                        <input type="hidden" name="total" id="hidden_total" />
                        <input type="hidden" name="product_id" id="product_id" value="{{$product->id}}" />
                        <div class="form-group">
                            <label for="display_amount">Total</label>
                            <h5 id="display_amount">{{$product->price}}</h5>
                        </div>
                        <div class="form-group">
                            <label for="amount_number">Amount</label>
                            <input type="number" name="amount" class="form-control" id="amount_number" min="1" value="1" />
                        </div>
                        <button type="submit" class="btn btn-success mt-3">Submit</button>
                    </form>
                </div>
            </div>
            @endauth
        </div>
        @endif
    </div>
</body>

</html>

<!-- SCRIPTS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('scripts/product.js')}}"></script>
@endsection
