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
            <h2>Humans Helping Humans within the<br />
              World of Technology</h2>
          </div>
          <div id="main-content">
            <h3>About Us</h3>
            <p>S2G is a specialist and enabler of outsourced contact center &amp; support services for <a href="yesterday.php">yesterday</a>, <a href="today.php">today</a>, and <a href="tomorrow.php">tomorrow's</a> technology.  S2G solutions are driven by an expertise of humans helping humans within the interactive support lifecycle of technology.  Solutions center on our multi-channel contact center outsourced solutions that run the gamut of Level I-III technical support, customer service, RMA, Field Service, and EOL Managed Services.  S2G caters to the digital entertainment, consumer electronics, technology, and software sectors via our U.S. delivery footprint.</p>
            <ul>
              <li>Founded in 1999 as a specialist in End-of-Life &amp; Legacy Support Services.</li>
              <li>Operational Infrastructure built on COPC Standards since our founding (<a href="http://www.copc.com" target="_blank">www.copc.com</a>).</li>
              <li>Multi-channel support service solutions that provide a return on your investment while protecting your brand.</li>
              <li>Contact Center and Reverse Logistics delivery via our U.S. footprint.</li>
              <li>All of the infrastructure of a Tier 1 outsourced provider, with the flexibility and custom build-to-suit solutions of a mid size company.</li>
              <li>80+% of our employees hold secondary education technical degrees.</li>
              <li>Multi-channel (voice, email, chat, text) solutions with IVR, KDB, CRM, &amp; Self Service tools</li>
              <li>Certified Technicians (A+, C+, MCSE, etc.) as required</li>
              <li>We've never lost a client for performance reasons.</li>
              <li>Unique <a href="http://www.levelonetechnology.com" target="_blank">Level 1 Technology</a> subsidiary providing professional field services site &amp; connectivity, market deployment, and structured wiring solutions.</li>
            </ul>					
          </div>
          <div>
            <section id="sidebar">
              <article id="sidebarArticle">
                <span class="error" id="error0"></span>
                <p id="legend">Consult with Us</p>
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
                </fieldset>
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
