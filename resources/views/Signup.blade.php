@extends('partials.header')

@section('title')
<title>PureFoods | Sign Up</title>
@endsection('title')

@section('css')
   <!--all the links for style sheets custom and ready made bootstrap-->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 <link rel="stylesheet" href="css/style.css">
@endsection

@section('body')
<body>
<div class="form_width">
      <!--
the POST method submits form data to itself
-->
<form class="modal-content" action="" method="POST">
  <h1>Sign Up</h1>
  <h5>Create and account to keep track of your orders</h5>

    <label for="name"><b>Full Name:</b></label>
    <input type="text" name="name" placeholder="Your name" id="name" required>

    <label for="email"><b>Email Address:</b></label>
    <input type="email" name="email" placeholder="Enter your email" id="email" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" size="30" title="Invalid email address" required>

    <label for="pwd"><b>Password:</b></label>
    <input type="password" name="password" placeholder="Enter your password" id="pwd" required>

   <label for="confirm_pwd"><b>Confirm Password:</b></label>
  <input type="password" placeholder="Confirm password" id="confirm_pwd" name="confirm_pwd" required>

    <label for="phone"><b>Phone Number:</b></label>
      <input type="text" placeholder="Phone number" name="phone" required>

  <button type="submit" name="submit" class="submit_button">Submit</button>
  <button type="button" onclick="window.location.href='index.php';" class="cancelbutton">Cancel</button>
  </form>
</div>
</body>
</html>
@endsection
