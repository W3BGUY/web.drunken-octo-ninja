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
        $('#submitForm').click(function(){
            var valid=validate();
            if(valid){
				sendEmail($("#fullName").val(),$("#emailAddr").val(),$("#phoneNum").val(),$("#messageText").val());
				return false;
            }
        });
      });
	  
	  function sendEmail(fullName,emailAddr,phoneNum,messageText){
        $.ajax({
          type:"POST",
          url:"./lib/php/allFunctions.php",
          data:{page:"contactForm",fn:fullName,ea:emailAddr,pn:phoneNum,mt:messageText},
          success:emailSuccess
        });
      }
      
      function emailSuccess(data,status){
        if(data=="SUCCESS"){
          $("#sidebarArticle").html("<strong>Thanks!</strong><br />We'll be in touch soon.<br />");
        }else{
          $("#error0").html("There was an error.  Please try submitting again, or contact webmaster@s2g.net.");
        }
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
            <h2>Contact Us to Find Out How We Can<br />
              Support You &amp; Your Customers</h2>
          </div>
          <div id="main-content">
            <h3>Contact</h3>
            <p>If you would like to learn more about S2G or if you are seeking to build a support services partnership with a niche provider focused on your industry, please contact us.</p>
            <ul>
              <li>Consult freely with us on industry experiences and best practices</li>
              <li>Let us be a sounding board for your support services strategies</li>
              <li>Let us understand your business environment</li>
            </ul>
            <p>We're passionate about what we do!  We've NEVER lost a client for performance reasons.  We want to hear about your business.</p>
            <p>To get in touch, please send us a message using the form to the right. We'll get back to you quickly.</p>						
          </div>
          <div>
            <section id="sidebar">
              <article id="sidebarArticle">
                <span class="error" id="error0"></span>
                <ul>
                  <li>
                    <label>Full Name</label>
                    <input type="text" name="fullName" id="fullName" value="" style="width:212px;" class="auto-clear" title="Full Name" />
                    <span class="error" id="error1"></span>
                  </li>
                  <li>
                    <label>Email Address</label>
                    <input type="text" name="emailAddr" id="emailAddr" value="" style="width:212px;" class="auto-clear" title="Email Address" />
                    <span class="error" id="error2"></span>
                  </li>
                  <li>
                    <label>Phone Number</label>
                    <input type="text" name="phoneNum" id="phoneNum" value="" style="width:212px;" class="auto-clear" title="Phone Number" />
                    <span class="error" id="error3"></span>
                  </li>
                  <li>
                    <label>Message</label>
                    <textarea name="messageText" id="messageText" style="width:212px;height:120px;" class="auto-clear" title="Your Message"></textarea>
                    <span class="error" id="error4"></span>
                  </li>
                  <li class="buttons">
                    <button id="submitForm">Send Message</button>
                    <input type="hidden" name="submitted" id="submitted" value="true" />
                  </li>
                </ul>
              </article>
            </section>
          </div>
        </div>
      </div>
      <div id="footer">
        <?php require_once("lib/php/footer.php"); ?>
      </div>
    </div>
  </body>
</html>
