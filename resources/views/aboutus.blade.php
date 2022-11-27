@extends('partials.header')


@section('title')
<title>PureFoods | Contact Us</title>
@endsection('title')

@section('css')
<!--all the links for style sheets custom and ready made bootstrap-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('css/input.css')}}">
<link rel="stylesheet" href="{{asset('css/TPdraft.css')}}">
@endsection

@section('body')

<body>
<div class="container">
    <header class="about_main">
        <h1 class="heading">About Us</h1>
    </header>
    <div class="about_main">
        <h2>Know more about us! </h2><br>
        <p>At Pure Foods, we strive to sell products of the highest quality at a low cost! Our goal is to ensure that inclusivity is met by showcasing a wide variety of products to appease customers of all types of backgrounds.</p>
        <p>We ensure: that the process of buying products is as simple and efficient as possible, that are employees work to the best of their ability and at the same time we uphold their rights and develop a safe & inclusive workplace, that the process of buying products is as simple and efficient as possible.
        <br>We are known for ensuring that our employees work to the best of their ability and at the same time. <br>
        we have an outstaning reputation when it comes to upholding their rights and developing a safe, inclusive workplace.</p>
        <p>As a result of our outstanding values we have won many awards and accumulated many 5 star ratings from various reviewing companies.</p><br>
        <div class="container" style="max-width: 700px;">
            <img src="{{asset('images/market.jpg')}}" class="img-fluid">
        </div>
        <h2>Our history</h2>
        <p>Since 1975, we have been helping to give customers a wide range of high quality products.<br>Our company started as a humble little shop in Birmingham offering hand made and farm-bought products to passers-by.</br>
        Since then, our company has expanded to over 200 stores across the UK as well as the website you are in right now!<br></p>

        <h2>Climate action</h2>
        <p>One of our main priorities is to improve both customer experiences and the environment!</p>
        <p>Considering the big issues regarding the climate, one of our main goals is to ensure sustainable shopping to help tackle the global crisis<br>
        which includes helping to reduce carbon emissions and discouraging the use of plastic bags.<br>

        <p>Another form of action we have taken includes the purchasing of Fairtrade products. <br>We want to give back to our communities all around the work by using schemes that will benefit both them and us.</p><br><br>

    </div>
</div>
</body>
</html>
</html>


@endsection
