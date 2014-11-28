<!doctype html>
<html itemscope itemtype="http://schema.org/LocalBusiness">
  <head>
    <?php require_once("./lib/php/head.php"); ?>
    <style type="text/css">
      #header ul#nav li a#home{
        color: #ab2111;
      }
      #header ul#nav li a#home:hover{
        background: none;
      }
      .jobDesc{
        text-decoration:underline;
      }
    </style>
    <link rel="stylesheet" type="text/css" href="./lib/css/styles.css" media="screen" />
    <script language="javascript" type="text/javascript" src="./lib/js/jQuery.min.js" ></script>
    <script language="javascript" type="text/javascript" src="./lib/js/jquery-ui.min.js" ></script>
    <script type="text/javascript" src="./lib/js/scripts.js"></script>
    
    <script type="text/javascript">
      $(document).ready(function(){
      });
    </script>
  </head>
  
  <body>
    <?php include_once("./lib/php/analyticstracking.php") ?>
    <div id="outter-container">
      <div id="inner-container">
        <div id="header">
          <h1><a href="home.php">S2G Support Services Group</a></h1>
          <?php require_once("lib/php/nav.php"); ?>
        </div>
        <div id="content">
          <div id="home-masthead">
            <h2>Support Services Solutions for the Technology of Yesterday, Today, &amp; Tomorrow</h2>
            <div id="photos">
              <a href="yesterday.php" id="yesterday" title="Supporting Yesterday's Technology through End-of-Life & Legacy Products"><img src="lib/img/yesterday.png" alt="Yesterday"><span>Yesterday</span></a>
              <a href="today.php" id="today" title="Supporting Today's Technology through Software, Consumer Electronics, & More"><img src="lib/img/today.png" alt="Today"><span>Today</span></a>
              <a href="tomorrow.php" id="tomorrow" title="Supporting Tomorrow's Technology through Digital Entertainment, Software & More"><img src="lib/img/tomorrow.png" alt="Tomorrow"><span>Tomorrow</span></a>
            </div>
          </div>
          <div id="home-content">
            <h3>About Us</h3>
            <p>S2G is a specialist &amp; enabler of outsourced contact center &amp; customer response support services for <a href="yesterday.php">yesterday</a>, <a href="today.php">today</a>, and <a href="tomorrow.php">tomorrow's</a> technology. S2G solutions are driven by an expertise of humans helping humans within the interactive support life cycle of technology. Solutions center around multi-channel contact center support that runs the gamut of Level I-III technical support, customer service, care, and related managed services, including a niche specialty in End-of-Life Managed Services. S2G caters to the digital entertainment, consumer electronics, technology, and software sectors via our U.S. delivery footprint.<br />
            <h4><a href="about.php">Read More About Us &rarr;</a></h4>
          </div>
        </div>
      </div>
      <div id="footer">
        <?php require_once("lib/php/footer.php"); ?>
      </div>
    </div>
  </body>
</html>
