@extends('partials.header')

@section('title')
<title>PureFoods | Contact Us</title>
@endsection('title')

@section('css')
<!--all the links for style sheets custom and ready made bootstrap-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
@endsection

@section('body')

<body>
    <div class="wrapper">
        <div class="contact_col1">
            <h1>Contact Us</h1>
            <br><p>Thinking about contacting us?<br>Do you have any queries or complaints?</br> </p>
        </div>
        <div class="contact_col2">
            <img src="{{asset('contact.png')}}">
        </div>
    </div>
</html>
@endsection
