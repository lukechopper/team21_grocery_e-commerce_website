@php
function checkThatOrdersHaveNotAlreadyBeenPurchased($userOrders){
    $canFindUnorderedPurchase = false;
    foreach($userOrders as $order){
        if(!isset($order->whenPurchased)){$canFindUnorderedPurchase = true; }
    }
    return $canFindUnorderedPurchase;
}

function checkThatHavePurchasedInThePast($userOrders){
    $canFindUnorderedPurchase = false;
    foreach($userOrders as $order){
        if(isset($order->whenPurchased)){$canFindUnorderedPurchase = true; }
    }
    return $canFindUnorderedPurchase;
}
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{asset('images/favicon.png')}}">
    @yield('css')
    <link rel="stylesheet" href="{{asset('css/TPdraft.css')}}">
    @yield('title')
    @sectionMissing('title')
    <title>PureFoods | Groceries</title>
    @endif

</head>
<div class="overall__container">
<div>
<header>
<div class="navbar__itself">
    <div class="container">
    <a href="{{route('home')}}" class="navbar__image"><img class = "pf" src = "{{asset('images/PFlogo.png')}}" width="300px"></a>
    <div class = "navbar__navsection">
        <div class="navbar__itself">
            <a href="{{route('home')}}" class="navbar_item">Home</a>
            <a href="{{route('aboutUs')}}" class="navbar_item">About Us</a>
            <a href="{{route('contactUs')}}" class="navbar_item">Contact Us</a>
            @guest
            <a href="{{route('login')}}" class="navbar_item">Log In</a>
            <a href="{{route('signup')}}" class="navbar_item">Sign Up</a>
            @endguest
            @auth
            @if(auth()->user()->isAdmin)
            <a href="{{route('viewAdminInfo')}}" class="navbar_item">Admin Info</a>
            @endif
            @if(checkThatOrdersHaveNotAlreadyBeenPurchased(auth()->user()->orders))
            <a href="{{route('viewBasket')}}" class="navbar_item">Basket</a>
            @endif
            @if(checkThatHavePurchasedInThePast(auth()->user()->orders))
            <a href="{{route('viewPastOrders')}}" class="navbar_item">Past Orders</a>
            @endif
            <a href="{{route('logout')}}" class="navbar_item">Logout</a>
            @endauth
            <div class="navbar__dropdown">
                <button class="navbar__dropbtn">Filter</button>
                    <div class="navbar__dropdown-content">
                        <a href="{{route('filterHome', 'Frozen Food')}}" class="navbar_item navbar_item--dropdown">Frozen Food</a>
                        <a href="{{route('filterHome', 'Fruit and Veg')}}" class="navbar_item navbar_item--dropdown">Fruit and Veg</a>
                        <a href="{{route('filterHome', 'Chilled Food')}}" class="navbar_item navbar_item--dropdown">Chilled Food</a>
                        <a href="{{route('filterHome', 'Tinned Food')}}" class="navbar_item navbar_item--dropdown">Tinned Food</a>
                        <a href="{{route('filterHome', 'Drinks')}}" class="navbar_item navbar_item--dropdown">Drinks</a>
                    </div>
            </div>
        </div>
    </div>
</div>
</div>
</header>
@yield('body')
</div>
<div>
@include('partials.footer')
</div>
</div>
