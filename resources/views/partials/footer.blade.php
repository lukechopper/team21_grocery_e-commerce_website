<!-- footer section starts-->
@yield('css')
<link rel="stylesheet" href="{{asset('css/TPdraft.css')}}">
@section('css')
<!--all the links for style sheets custom and ready made bootstrap-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/3cc03d8fde.js" crossorigin="anonymous"></script>
@endsection

@section('body')
<body>
<div class = "icons-container">
 <div class="container">
    <div class="footer_col1">
        <div class="info">
                <h3>Free Delivery</h3>
                <span>on orders over £30</span></div>
               
                <div class="info">
            <h3>Secure payments</h3>
            <span>Protected </span>
        </div>
 
        <div class="info">
            <h3>Address</h3>
            <span>21 Aston Street<br> United Kingdom, Birmingham <br> B4 7DE</span>
        </div>
 
        <div class="info">
            <h3>Returns</h3>
            <span>7 Day returns</span>
        </div>
 
    </div><!--footer col1-->

    <div class="footer_col2">
    
    <!--<a href="{{route('home')}}" class="navbar__image"><img class = "pf" src = "{{asset('images/PFlogo.png')}}" width="300px"></a>-->
    <a href="{{route('home')}}" ><img class="footer_logo" src = "{{asset('images/PFlogo.png')}}" width="300px"></a>

        <div class=footer_col2_row2>
            <a href="https://linkedin.com/in/pure-foodsltd"><img src = "{{asset('images/in.png')}}" width="40px"></a>
            <a href="https://www.instagram.com/purefoods.ltd/"><img src = "{{asset('images/tw.png')}}" width="40px"></a>
            <a href="https://twitter.com/PureFoods_ltd"><img src = "{{asset('images/is.png')}}" width="40px"></a>

        </div><!--footer_col2_row2-->
</div><!--footer_col2-->
</div><!--container-->
</div><!--icons-container-->
</body>