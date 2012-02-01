<?php
require_once '../classes/general.class.php';

// it's local, use the local db connection
if ($_SERVER['HTTP_HOST'] == 'localhost' || strstr($_SERVER['HTTP_HOST'], '192.168.2')) {
    require_once('../includes/connLocal.inc.php');
}
else {
    require_once '../includes/conn.inc.php';
}

$tours = new General();
$tourArr = $tours->getTours();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dufour Tours - Tour Listings</title>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/thickbox.js"></script>
<link rel="stylesheet" href="js/thickbox.css" type="text/css" />
<link href="../dufourMain.css" rel="stylesheet" type="text/css" />
<style type="text/css">
    .toursDiv{
        /*overflow: auto;*/
    }
    .tour{
        width: 80%;
        margin: 10px 10%;
        border: 1px solid #fff;
        overflow: auto;
    }
    .tour img{
        float: left;
        padding: 10px;
    }
    .tour .tourText{
        float: right;
        width: 420px;
        padding: 10px;
    }
    .tour .tourName{
        font-size: 18px;

    }
    .tour .description{
        clear: both;
        padding: 5px 10px;
    }
</style>
<script type="text/javascript">

<!--



//-->

</script>
<link rel="shortcut icon" href="../images/favicon.ico" />
</head>
<body class="oneColFixCtr">
<div id="container">
  <div id=header>
    <div align="center"><img src="../images/title.jpg" width="698" height="150" /> </div>
  </div>
  <div id="nav">
    <ul>
      <li id="home"><a href="../index.php"> Home</a></li>
      <li id="tours"><a href="" class="current">Tours</a></li>
      <li id="sbcharter"><a href="../sbcharters.php">School Bus Charters</a></li>
      <li id="sblocations"><a href="../sblocations.php">School Bus Information</a></li>
      <li id="inspection"><a href="../inspections.php">Inspection Station</a></li>
      <li id="employment"><a href="../employment.php">Employment</a></li>
    </ul>
  </div>
    <div id="sidebar"></div>

  <div id="mainContent">
      <div id="tourUpdate">
          After 37 years in the tour business, Barb and Duke have decided to retire the tour business
          as of August 31, 2011. We sorely miss Bill & Bette Anne and we will miss all of you, our
          faithful followers. From Boston to California, from Maine to Florida, you have been there
          with us. We would like to thank all of our wonderful passengers for all the memories!
      </div>
      <div id="toursDiv">
          <?php
          foreach($tourArr as $tour){
              echo<<<TOUR
                  <div class="tour">
                      <img src="../images/shows/{$tour['image']}" alt="">
                      <div class="tourText">
                          <div class="tourName">{$tour['name']}</div>
                          <div class="tourDate">Tour Date: {$tour['date']}</div>
                          <div class="tourPrice">Tour Price: \${$tour['price']}</div>
                      </div>
                      <div class="description">{$tour['description']}</div>
                  </div>

TOUR;


          }
          ?>


      </div>

</div>
<div id="footer">
  <div align="center"> <span class="style7">website design by <a href="http://www.onsitetechservices.com">OnsiteTechServices.com</a></span> </div>
</div>
</div>
<!--***************Begin Google Analytics******************-->
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-7477439-4");
pageTracker._trackPageview();
} catch(err) {}</script>
<!--***************End Google Analytics******************-->
</body>
</html>
