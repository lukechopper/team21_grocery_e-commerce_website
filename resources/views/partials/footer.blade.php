<!-- footer section starts-->
@yield('css')
    <link rel="stylesheet" href="{{asset('css/TPdraft.css')}}">
@section('css')
<!--all the links for style sheets custom and ready made bootstrap-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/3cc03d8fde.js"></script>
@endsection
<section class = "icons-container">
 
    <div class="footer">
        <div class="info">
            <i class="fa-solid fa-truck"></i>
                <h3>Free Delivery</h3>
                <span>on orders over £30</span></div>
               
                <div class="info">
            <i class="fa-regular fa-credit-card"></i>
            <h3>Secure payments</h3>
            <span>Protected </span>
        </div>
 
        <div class="info">
        <i class="fa-solid fa-location-dot"></i>
            <h3>Address</h3>
            <span>21 Aston Street<br> United Kingdom, Birmingham <br> B4 7DE</span>
        </div>
 
        <div class="info">
        <i class="fa-solid fa-arrow-right-arrow-left"></i>
            <h3>Returns</h3>
            <span>7 Day returns</span>
        </div>
 
    </div>
 
</section>
 
<!--footer section ends-->
