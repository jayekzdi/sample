<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../css/designs.css">  
</head>
  <body>

   <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
    <button class="navbar-toggle" data-toggle="collapse" data-target="#navbara">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      </button>
      <a class="nav-item"><img src="../img/kagahin1.png" style="width:175px;height:51px;"></a>
    </div>
    <div class="collapse navbar-collapse" id="navbara">
<ul class="nav navbar-nav navbar-right">
<li class="nav-item">
  <a href="../index.php"><?php print $txt; ?><span class="sr-only">(current)</a>
    </li>
  <li class="nav-item">
  <?php echo disp1(); ?>
    </li>
  <li class="nav-item">
  <a href="../package.php"><?php print $txt2; ?></a>
    </li>
  <li class="nav-item">
  <a href="../contactus.php"><?php print $txt4; ?></a>
</li>
<li class="nav-item">
  <?php echo disp(); ?>
</li>
    </ul>
    </div><!--.nav-header-->
  </div><!--container-fluid-->
</nav>
<header>
    <center>
<div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
    <?php echo make_slide_indicators($connect);?>
      </ol>
      <div class="carousel-inner">
        <?php echo make_slides_user($connect);?>
         <a class="left carousel-control" href="#carousel" data-slide="prev">
     <span class="glyphicon glyphicon-chevron-left"></span>
     <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel" data-slide="next">
     <span class="glyphicon glyphicon-chevron-right"></span>
     <span class="sr-only">Next</span>
    </a>
   </div>       
  </div><!--carousel-->
</center>
</header>
