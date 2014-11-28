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
        loadAvailableJobs();
        $("div#sidebar").on("click","li",function(e){
          $("#jobDescription").html("Loading job description for <strong>"+$(this).html()+"</strong>");
          loadJobDesc($(this).html());
        });
      });
      
      function loadAvailableJobs(){
        $.ajax({
          type:"POST",
          url:"./lib/php/allFunctions.php",
          data:{page:"careers",loadType:"loadJobs"},
          success:jobsSuccess
        });
      }
      
      function loadJobDesc(jd){
        $.ajax({
          type:"POST",
          url:"./lib/php/allFunctions.php",
          data:{page:"careers",loadType:"loadDesc",job:jd},
          success:descSuccess
        });
      }
      
      function descSuccess(data,status){
        $("#jobDescription").html(data);
      }
      
      function jobsSuccess(data,status){
        $("div#sidebar").html(data);
      }
    </script>
  </head>
  
  <body>
    <?php include_once("./lib/php/analyticstracking.php") ?>
    <div id="outter-container">
      <div id="inner-container">
        <div id="header">
          <h1><a href="index.php">S2G Support Services Group</a></h1>
          <?php require_once("lib/php/nav.php"); ?>
        </div>
        <div id="content">
          <div id="masthead">
            <h2>Do you possess the power to provide legendary<br />
            customer experiences for our client's brands?<br />
            If so, come join the S2G Family!</h2>
          </div>
          <div id="main-content">
            <h3>Available Positions</h3>
            <article id="jobDescription">
              Select a Position from the Right.
            </article>
          </div>
          <div id="sidebar">
            Jobs Loading
          </div>
        </div>
      </div>
      <div id="footer">
        <?php require_once("lib/php/footer.php"); ?>
      </div>
    </div>
  </body>
</html>
