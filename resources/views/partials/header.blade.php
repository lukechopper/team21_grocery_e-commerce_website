<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('css')
    <link rel="stylesheet" href="{{asset('css/TPdraft.css')}}">
    @yield('title')
    @sectionMissing('title')
    <title>PureFoods | Groceries</title>
    @endif
</head>
<header>
<div class="navbar">
    <a href="{{route('home')}}" id="navbar__image"><img class = "pf" src = "PFlogo.png" width="205px"></a>
    <div class = "navsection">
        <div class="navbar">
            <a href="{{route('home')}}">Home</a>
            <a href="#contact">Contact Us</a>
            @guest
            <a href="Signup.blade.php">Sign In</a>
            <a href="{{route('signup')}}">Sign Up</a>
            @endguest
            <div class="dropdown">
                <button class="dropbtn">Shop</button>
                    <div class="dropdown-content">
                        <a href="#">Fruit and veg</a>
                        <a href="#">Frozen</a>
                        <a href="#">Bakery</a>
                        <a href="#">Food Cupboard</a>
                        <a href="#">Drinks</a>
                    </div>
            </div>
        </div>
    </div>
</div>
</header>
@yield('body')
