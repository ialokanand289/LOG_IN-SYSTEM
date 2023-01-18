<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!= true){
  header("location:login.php");
  exit;
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> welcome - <?php $_SESSION['username']?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body>
    <?php require 'partials/_nav.php'?>
     welcome - <?php echo $_SESSION['username']?>
     <div class="container p-lg-5">
      <h2 class="text-dark font-Audiowide py-5 mb-3 display-1">Watch</h2>

     </div>
  <div id="demo" class="carousel slide" data-bs-ride="carousel">

  <!-- Indicators/dots -->
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
  </div>
  
  <!-- The slideshow/carousel -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/la.jpg" alt="Los Angeles" class="d-block" style="width:100%">
      <div class="carousel-caption">
        <h3>Los Angeles</h3>
        <p>We had such a great time in LA!</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/chicago.jpg" alt="Chicago" class="d-block" style="width:100%">
      <div class="carousel-caption">
        <h3>Chicago</h3>
        <p>Thank you, Chicago!</p>
      </div> 
    </div>
    <div class="carousel-item">
      <img src="img/ny.jpg" alt="New York" class="d-block" style="width:100%">
      <div class="carousel-caption">
        <h3>New York</h3>
        <p>We love the Big Apple!</p>
      </div>  
    </div>
  </div>
  
  <!-- Left and right controls/icons -->
  <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>

<section id="live" class="container content-section text-center">
  <div class="row">
      <div class="col-lg-15 col-lg-offset-2">

        <h2>About <span style="color:#C71E1F;">+LIVE+</span></h2>
          <p>The multi-platinum band from Pennsylvania--Ed Kowalczyk (vocals, guitar), Chad Taylor (guitar, backing vocals), Patrick Dahlheimer (bass) and Chad Gracey (drums, percussion)--have sold over 22 million albums worldwide and earned two number one albums (Throwing Copper, Secret Samadhi).  Their catalog is filled with such gems as “Lightning Crashes,” “I Alone,” “All Over You,” and “Lakini’s Juice,” which live on today as classics on rock radio. Throwing Copper produced the band’s biggest single, “Lightning Crashes,” which was #1 at Modern Rock radio for 10 consecutive weeks.&nbsp; Throwing Copper reached #1 on the Billboard Top 200 and eventually surpassed sales of 10 million albums sold with Rolling Stone honoring the album with placement on their “1994: The 40 Best Records From Mainstream Alternative's Greatest Year.” Secret Samadhi (1997) immediately shot to #1 on the Billboard Top 200 and eventually went double platinum. The release of the platinum-selling The Distance to Here (1999) turned +LIVE+ into an international powerhouse and moved the band from arenas into stadiums. +LIVE+ has been and remains today a global concert juggernaut.</p>
      </div>
    </div>
</section>
  
  </body>
</html>