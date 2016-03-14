<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>ShelterConnect</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- <link rel="stylesheet" href="./css/style.css"> -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Nunito:400,300,700|Open+Sans:400,700,400italic' rel='stylesheet' type='text/css'>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>


  <!-- Static navbar -->
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a id="logo" class="navbar-brand navbar-brand-centered" href="#home"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>ShelterConnect</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li id="homeTab" class="active"><a href="#home">Home <span class="sr-only">(current)</span></a></li>
          <li><a href="#about">About</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
  </nav>
  <main id="home">
    @yield('content')
  </main>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBM4USDQ9HqqDLkhrkBhPuvabZW-a92uiY" type="text/javascript"></script>
<script src="./assets/js/bundle.js"></script>
<script>

$('.navbar-nav li, .navbar-brand ').click(function(e) {
  var activeTag = e.target.hash;
  $('#home').css('display','none');
  $('#about').css('display','none');
  $('#faq').css('display','none');
  $('#sponsors').css('display','none');
  $(activeTag).css('display','block');
    $('.navbar li.active').removeClass('active');
    if (this.id == 'logo'){
      var $this = $('#homeTab');
    } else {
      var $this = $(this);
    }
    if (!$this.hasClass('active')) {
        $this.addClass('active');
    }
    e.preventDefault();
});

$('button, a').click(function(e){
  // e.stopPropagation();
  console.log('click reserve');
});

</script>
</body>
</html>
