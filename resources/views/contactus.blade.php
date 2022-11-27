@extends('partials.header')

@section('title')
<title>PureFoods | Contact Us</title>
@endsection('title')

@section('css')
<!--all the links for style sheets custom and ready made bootstrap-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{asset('css/input.css')}}">
<script src="https://kit.fontawesome.com/3cc03d8fde.js" crossorigin="anonymous"></script>
@endsection

@section('body')

<body>
    <div class="container my-5">
        <h1 class="heading">Contact Us</h1><br></br>
        <div class="row my-5">
            <div class="col-sm-4 col-lg-6"><img class="img-fluid" src="{{asset('chat.png')}}"></div>
            <div class="col-sm-8 col-lg-6"><h2>We're here to help</h2>
                    <h3>Contact our support and sales team, We're all ears!</h3><br></br>
                    <p>At PureFoods we take customer satisfaction seriously. If you are
                        dissatisfied with you service and experience just get in touch and one of our customer service or technical support agents
                        will help you. If you would like to learn more about our company values visit About Us:</p>
                    <form class="aboutbtn">
                    <button type="submit" class="btn_style" formaction="{{route('aboutus')}}">About Us</button>
                    </form><br></br>
                    <p>If you having any issues regaring: <b>Order, Delivery, Payment, Return & Refund, Product & Stock or Account</b>
                    please email us and we will try our best to resolve your issue promptly.</p><br></br>
                    <p><small>Please note that our office hours are: <br><br><b>Monday-Friday: 9.00-18.00 <br>Weekends: 10.00-15.00</b></br></br></br></small></p></div>
        </div>

        <div class="row my-5">
            <div class="col-sm-12 col-lg-4"><h3>Call Us <i class="fa-solid fa-phone-volume"></i></h3>
                    <div>
                        <p>Regarding any issues, please call us at:<br></br>
                            +44 74970097534<br></br>
                            Dial the appropriate extention to recieve the appropriate level of support.
                            Please be aware that the wait time varies depending on the volume of calls.</p><br></br>
                    </div>
                </div>
            <div class="col-sm-12 col-lg-4"><h3>Get In Touch <i class="fa-regular fa-envelope"></i></h3>
                    <div>
                        <p>Thinking about contacting us? If you have any enquires just drop us an email at:<br>
                        <b>purefoods@outlooks.com</b></br>and our customer services team will get back to you as soon as possible. <br>
                        Please note that due to a high volume of emails, a response back from us may take up to <b>7 working days.</b></p><br></br>
                    </div>
                </div>
            <div class="col-sm-12 col-lg-4"><h3>Follow Us <i class="fa-solid fa-user-plus"></i></h3>
                    <p>Follow us on our social media and keep up to date with our upcoming deals and offers.</p>
                    <div class="contactart">
                            <div class= "sociallinks">
                                <a style="text-decoration: none" href="https://linkedin.com/in/pure-foodsltd" class="fa fa-linkedin"></a>
                                <a style="text-decoration: none" href="https://www.instagram.com/purefoods.ltd/" class="fa fa-instagram"></a>
                                <a style="text-decoration: none" href="https://twitter.com/PureFoods_ltd" class="fa fa-twitter"></a><br></br>
                            </div>
                    </div>
            </div>
        </div>
    </div>




        <!--
        <main class="contactgrid">
            <article class="featured">
                <img src="{{asset('chat.png')}}">
                <div>
                    <h2>We're here to help</h2>
                    <h3>Contact our support and sales team, We're all ears!</h3><br></br>
                    <p>At PureFoods we take customer satisfaction seriously. If you are
                        dissatisfied with you service and experience just get in touch and one of our customer service or technical support agents
                        will help you. If you would like to learn more about our company values visit About Us:</p>
                    <form class="aboutbtn">
                    <button type="submit" class="btn_style" formaction="{{route('aboutus')}}">About Us</button>
                    </form><br></br>
                    <p>If you having any issues regaring: <b>Order, Delivery, Payment, Return & Refund, Product & Stock or Account</b>
                    please email us and we will try our best to resolve your issue promptly.</p><br></br>
                    <p><small>Please note that our office hours are: <br><br><b>Monday-Friday: 9.00-18.00 <br>Weekends: 10.00-15.00</b></br></br></br></small></p>
                </div>
            </article>
            <article class="contactart">
                <h3>Call Us <i class="fa-solid fa-phone-volume"></i></h3>
                    <div>

                        <p>Regarding any issues, please call us at:<br></br>
                            +44 74970097534<br></br>
                            Dial the appropriate extention to recieve the appropriate level of support.
                            Please be aware that the wait time varies depending on the volume of calls.</p>
                    </div>
            </article>
            <article class="contactart">
                <h3>Get In Touch <i class="fa-regular fa-envelope"></i></h3>
                    <div>
                        <p>Thinking about contacting us? If you have any enquires just drop us an email at:<br>
                        <b>purefoods@outlooks.com</b></br>and our customer services team will get back to you as soon as possible. <br>
                        Please note that due to a high volume of emails, a response back from us may take up to <b>7 working days.</b></p>
                    </div>
            </article>
            <article class="contactart">
                <h3>Follow Us <i class="fa-solid fa-user-plus"></i></h3>
                    <div>
                        <p>Follow us on our social media and keep up to date with our upcoming deals and offers.</p>
                        <div class="contactart">
                            <div class= "sociallinks">
                                <a style="text-decoration: none" href="https://linkedin.com/in/pure-foodsltd" class="fa fa-linkedin"></a>
                                <a style="text-decoration: none" href="https://www.instagram.com/purefoods.ltd/" class="fa fa-instagram"></a>
                                <a style="text-decoration: none" href="https://twitter.com/PureFoods_ltd" class="fa fa-twitter"></a>
                            </div>
                        </div>
                    </div>
            </article>
        </main>




            <div class="row align-items-center my-3">
                <div class="row">
                    <div class="col-sm-4 col-lg-6">
                        <img src="{{asset('chat.png')}}">
                    </div>
                    <div class="col-sm-8 col-lg-6">
                        <h2>We're here to help</h2>
                        <h3>Contact our support and sales team, We're all ears!</h3><br></br>
                        <p>At PureFoods we take customer satisfaction seriously. If you are
                            dissatisfied with you service and experience just get in touch and one of our customer service or technical support agents
                            will help you. If you would like to learn more about our company values visit About Us:</p>
                        <form class="aboutbtn">
                        <button type="submit" class="btn_style" formaction="{{route('aboutus')}}">About Us</button>
                        </form><br></br>
                        <p>If you having any issues regaring: <b>Order, Delivery, Payment, Return & Refund, Product & Stock or Account</b>
                        please email us and we will try our best to resolve your issue promptly.</p><br></br>
                        <p><small>Please note that our office hours are: <br><br><b>Monday-Friday: 9.00-18.00 <br>Weekends: 10.00-15.00</b></br></br></br></small></p>
                    </div>
                </div>
            </div>
    </div>
    -->
</body>
@endsection

