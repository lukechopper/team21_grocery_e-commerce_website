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
<div class="navbar__itself">
    <a href="{{route('home')}}" class="navbar__image"><img class = "pf" src = "{{asset('PFlogo.png')}}" width="205px"></a>
    <div class = "navbar__navsection">
        <div class="navbar__itself">
            <a href="{{route('home')}}" class="navbar__link">Home</a>
            <a href="#contact" class="navbar__link">Contact Us</a>
            @guest
            <a href="{{route('login')}}" class="navbar__link">Sign In</a>
            <a href="{{route('signup')}}" class="navbar__link">Sign Up</a>
            @endguest
            @auth
            <a href="#" class="navbar__link">Logout</a>
            @endauth
            <div class="navbar__dropdown">
                <button class="navbar__dropbtn">Shop</button>
                    <div class="navbar__dropdown-content">
                        <a href="{{route('filterHome', 'Frozen Food')}}" class="navbar__link navbar__link--dropdown">Frozen Food</a>
                        <a href="{{route('filterHome', 'Fruit and Veg')}}" class="navbar__link navbar__link--dropdown">Fruit and Veg</a>
                        <a href="{{route('filterHome', 'Chilled Food')}}" class="navbar__link navbar__link--dropdown">Chilled Food</a>
                        <a href="{{route('filterHome', 'Tinned Food')}}" class="navbar__link navbar__link--dropdown">Tinned Food</a>
                        <a href="{{route('filterHome', 'Drinks')}}" class="navbar__link navbar__link--dropdown">Drinks</a>
                    </div>
            </div>
        </div>
    </div>
</div>
</header>
@yield('body')
