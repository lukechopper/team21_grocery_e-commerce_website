<!-- footer section starts-->
@yield('css')
    <link rel="stylesheet" href="{{asset('css/TPdraft.css')}}">
@section('css')
<!--all the links for style sheets custom and ready made bootstrap-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/3cc03d8fde.js"></script>
@endsection
<section class = "icons-container">
 
<style>
        .footer {
           
   left: 0;
   bottom: 0;
   width: 100%;
   background-color:#32CD32;
   color: white;
   text-align: center; 
        }
    </style>
    <footer>
        <div class="footer">
          <p class="lead"><em>Copyright</em> &copy; PureFoods</p>
          <blockquote>2022</blockquote>
  
          <a href="#" class="position-absolute bottom-0 end-0 p-5">
            <i class="bi bi-arrow-up-circle h1"></i>

            <img src="images/PFlogo.png" alt="PFlogo" width="120px">
          </a>
        </div>
      </footer>
 
</section>
 
<!--footer section ends-->
