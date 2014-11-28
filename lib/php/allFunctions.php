<?php
/********************************************/
/** Author: Charles Bastian
/** Date: 2013.10.05
/** Last Update: 2014.04.25
/********************************************/


/*******************************************/
// BEGIN AJAX RESPONSES
/*******************************************/
if(!empty($_POST)){
  new allFunctions();
  if($_POST['page']=="careers"){
    if(isset($_POST['loadType'])){
      if($_POST['loadType']=="loadDesc"){
        if(isset($_POST['job'])){
          print_r(allFunctions::showJobDesc($_POST['job']));
        }else{
          print_r("<strong>ERROR: Job info not found.</strong>");
        }
      }elseif($_POST['loadType']=="loadJobs"){
        print_r(allFunctions::loadJobs());
      }else{
        return false;
      }
    }
  }elseif($_POST['page']=="application"){
    print_r("Error");
  }elseif($_POST['page']=="contactForm"){
    print_r(allFunctions::sendEmail($_POST));
  }else{
    print_r("<strong>ERROR: Page info not found.</strong>");
  }
}else{
  print_r("<strong>ERROR: POST info not found.</strong>");
}

/*******************************************/
// END AJAX RESPONSES
/*******************************************/


class allFunctions{
  /*******************************************/
  // BEGIN PAGE FUNCTIONS
  /*******************************************/
  
  function showJobDesc($jobTitle){
    allFunctions::conDB("bastian_s2g_website");
    $returnVal='';
    $jobTitleClean=allFunctions::makeITSafe($jobTitle);
    
    if(allFunctions::checkifTableExists("careers")){
      $jobDesc=@mysql_query("SELECT * FROM bastian_s2g_website.careers WHERE status=1 AND position_title=".$jobTitleClean." LIMIT 1") or die(mysql_error());
      $fullJob=@mysql_fetch_array($jobDesc);
      if(!empty($fullJob)){
        $returnVal.='<table style="width:100%;"><tr><td colspan="2">';
        $returnVal.='<strong style="font-size:20px;">'.$fullJob['position_title'].'</strong>';
        $returnVal.='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        $returnVal.='<strong style="font-size:25px;float:right;"><a href="./applicationProceedures.php">Apply NOW</a></strong><br />';
        $returnVal.='</td></tr>';
        
        $returnVal.='<tr style="background-color:#ccc;">';
        $returnVal.='<td width="20%">';
        $returnVal.='<strong style="font-size:12px;">Posted Date</strong><br />';
        $returnVal.='</td>';
        $returnVal.='<td width="80%">';
        $returnVal.=$fullJob['posting_date'];
        $returnVal.='</td>';
        $returnVal.='</tr>';
        
        $returnVal.='<tr>';
        $returnVal.='<td width="20%">';
        $returnVal.='<strong style="font-size:12px;">Position Type</strong><br />';
        $returnVal.='</td>';
        $returnVal.='<td width="80%">';
        $returnVal.=$fullJob['position_type'];
        $returnVal.='</td>';
        $returnVal.='</tr>';
        
        $returnVal.='<tr style="background-color:#ccc;">';
        $returnVal.='<td width="20%">';
        $returnVal.='<strong style="font-size:12px;">Supervisor</strong><br />';
        $returnVal.='</td>';
        $returnVal.='<td width="80%">';
        $returnVal.=$fullJob['reports_to'];
        $returnVal.='</td>';
        $returnVal.='</tr>';
        
        $returnVal.='<tr>';
        $returnVal.='<td width="20%">';
        $returnVal.='<strong style="font-size:12px;">Description</strong><br />';
        $returnVal.='</td>';
        $returnVal.='<td width="80%">';
        $returnVal.=$fullJob['position_desc'];
        $returnVal.='</td>';
        $returnVal.='</tr>';
        
        $returnVal.='<tr style="background-color:#ccc;">';
        $returnVal.='<td width="20%">';
        $returnVal.='<strong style="font-size:12px;">Duties</strong><br />';
        $returnVal.='</td>';
        $returnVal.='<td width="80%">';
        $returnVal.=$fullJob['position_duties'];
        $returnVal.='</td>';
        $returnVal.='</tr>';
        
        $returnVal.='<tr>';
        $returnVal.='<td width="20%">';
        $returnVal.='<strong style="font-size:12px;">Required Skills</strong><br />';
        $returnVal.='</td>';
        $returnVal.='<td width="80%">';
        $returnVal.=$fullJob['position_skills'];
        $returnVal.='</td>';
        $returnVal.='</tr>';
        
        $returnVal.='<tr style="background-color:#ccc;">';
        $returnVal.='<td width="20%">';
        $returnVal.='<strong style="font-size:12px;">Expectations</strong><br />';
        $returnVal.='</td>';
        $returnVal.='<td width="80%">';
        $returnVal.=$fullJob['position_expectations'];
        $returnVal.='</td>';
        $returnVal.='</tr>';
        
        $returnVal.='<tr>';
        $returnVal.='<td width="20%">';
        $returnVal.='<strong style="font-size:12px;">Salary</strong><br />';
        $returnVal.='</td>';
        $returnVal.='<td width="80%">';
        $returnVal.=$fullJob['position_salary'];
        $returnVal.='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        $returnVal.='<strong style="font-size:25px;float:right;"><a href="./applicationProceedures.php">Apply NOW</a></strong><br />';
        $returnVal.='</td>';
        $returnVal.='</tr>';
        
        $returnVal.='</table>';
      }else{
        $returnVal="<strong>ERROR:</strong> Job not found.";
      }
      
    }else{
      $returnVal="<strong>ERROR:</strong> Database/Table not found.";
    }
    
    return $returnVal;
  }
  
  function loadJobs(){
    allFunctions::conDB("bastian_s2g_website");
    $returnVal='';
    
    if(allFunctions::checkifTableExists("careers")){
      $jobs=@mysql_query("SELECT position_type,position_title FROM bastian_s2g_website.careers WHERE status=1 ORDER BY position_type DESC") or die(mysql_error());
      $currentJobType='';
      $count=0;
      while($allJobs=@mysql_fetch_array($jobs)){
        $itemID=substr($allJobs['position_type'],0,1).$count;
        if($currentJobType!=$allJobs['position_type']){
          $currentJobType=$allJobs['position_type'];
          if($count>0){
            $returnVal.='</ul>';
          }
          $returnVal.='<strong>'.$currentJobType.'</strong>';
          $returnVal.='<ul>';
          $returnVal.='<li class="jobDesc" id="'.$itemID.'">'.$allJobs['position_title'].'</li>';
        }else{
          $returnVal.='<li class="jobDesc" id="'.$itemID.'">'.$allJobs['position_title'].'</li>';
        }
        $count++;
      }
      $returnVal.='</ul>';
    }else{
      $returnVal="<strong>ERROR:</strong> Database/Table not found.";
    }
    
    return $returnVal;
  }
  
  function sendEmail($postData){
    $returnVal='';

    //PARAMETERS
       $email_recipient = "info@s2g.net";
       $email_sender = "S2G Website";
       $email_return_to = "info@s2g.net";
       $email_content_type = "text/html; charset=us-ascii";
       $email_client = "PHP/".phpversion();

    //HEADERS
       $email_header = "From: ".$email_sender."\r\n";
       $email_header .= "Reply-To: ".$email_return_to."\r\n";
       $email_header .= "Return-Path: ".$email_return_to."\r\n";
       $email_header .= "Content-type: ".$email_content_type."\r\n";
       $email_header .= "X-Mailer: ".$email_client."\r\n";
       $email_header .= "Bcc:charles_bastian@s2g.net\r\n";

    //SUBJECT AND CONTENTS
       $email_subject = "S2G Website Contact Form";
       $email_contents = "<html>";
       $email_contents .= "<h2>S2G Website Contact Form</h2>";
       $email_contents .= "<br /><strong>Sender Name: ".$postData['fn']."</strong>";
       $email_contents .= "<br /><strong>Sender Email: ".$postData['ea']."</strong>";
       $email_contents .= "<br /><strong>Sender Number: ".$postData['pn']."</strong>";
       $email_contents .= "<br /><strong>Sender Message: ".$postData['mt']."</strong>";
       $email_contents .= "</html>";

    $sendEmail=mail($email_recipient,$email_subject,$email_contents,$email_header);
    if($sendEmail){
      $returnVal="SUCCESS";
    }else{
      $returnVal="ERROR";
    }
    
    return $returnVal;
  }
  
  /*******************************************/
  // END PAGE FUNCTIONS
  /*******************************************/
  
  
  
  /*******************************************/
  // BEGIN UTILITY FUNCTIONS
  /*******************************************/

  function GetFileSIZE($f){
    return allFunctions::formatbytes(filesize($f));
  }

  function  formatbytes($val, $digits = 3, $mode = "SI", $bB = "B"){ //$mode == "SI"|"IEC", $bB == "b"|"B"
    $si = array("", "k", "M", "G", "T", "P", "E", "Z", "Y");
    $iec = array("", "Ki", "Mi", "Gi", "Ti", "Pi", "Ei", "Zi", "Yi");
    switch(strtoupper($mode)) {
      case "SI" : $factor = 1000; $symbols = $si; break;
      case "IEC" : $factor = 1024; $symbols = $iec; break;
      default : $factor = 1000; $symbols = $si; break;
    }
    switch($bB) {
      case "b" : $val *= 8; break;
      default : $bB = "B"; break;
    }
    for($i=0;$i<count($symbols)-1 && $val>=$factor;$i++)
      $val /= $factor;
    $p = strpos($val, ".");
    if($p !== false && $p > $digits) $val = round($val);
    elseif($p !== false) $val = round($val, $digits-$p);
    return round($val, $digits) . " " . $symbols[$i] . $bB;
  }

  /**
  * Add functionality to alternate row color
  * make sure to put a counter in the parent script
  *
  * example $count =1;
  * altColorRow($cnt,$c1,$c2,$rc);
  * $count++;
  *
  * @param int count $cnt
  * @param color 1 hex color $c1
  * @param color 3 hex color $c2
  * @param 2= altrows $rc
  * @return the color
  */
  function altColorRow($cnt,$c1,$c2,$rc){
    return $cnt % $rc == 0 ? $c1 : $c2;
  }
  
  function ssnmask($n){
    return "XXXXX".substr($n,5,4);
  }

  /* allFunctions::makeITSafe($data) */
  function makeITSafe($data){
    $newData = allFunctions::makeSqlSafe($data);
    return $newData;
  }
  
  private function makeSqlSafe($data){
    $data	=	str_replace("__ampersand__","&amp;",$data);
    $data	=	str_replace("__quote__","&quot;",$data);
    $data	=	str_replace("__space__","&nbsp;",$data);
    $data	=	str_replace("__apostrophe__","&#39;",$data);
    
    $str = @trim($data);
    if(get_magic_quotes_gpc()){
      $data = stripslashes($data);
    }
    if(!is_numeric($data)){
      $data = "'".mysql_real_escape_string($data)."'";
    }
    return $data;
  }
  
  /* allFunctions::conDB("dbname"); */
  function conDB($dbName){
    $connecting=allFunctions::dbConnect($dbName);
    if($connecting){
      return true;
    }else{
      return false;
    }
  }
  
  private function dbConnect($dbName){
    $SQL_USER='YmFzdGlhbl9zMmdVc2Vy';
    $SQL_PASS='czJnX3czYlMxdDMtbXlzUUxfcGEkJHcwcmQ=';
    $SQL_DB=$dbName;

    // Create a link to the database server
    $link = mysql_connect('localhost', base64_decode($SQL_USER), base64_decode($SQL_PASS));
    if(!$link) {
      die('Could not connect: ' . mysql_error());
    }
    // Select a database where our member tables are stored
    $db = mysql_select_db($SQL_DB, $link);
    if(!$db) {
      die ('Can\'t connect to database : ' . mysql_error());
    }
  }
    
  public function checkifTableExists($tableToSearch){
    $checkForTable=@mysql_query("DESC ".$tableToSearch);
    if($checkForTable){
      $returnValue=true;
    }else{
      $returnValue=false;
    }
    return $returnValue;
  }
  
  /*******************************************/
  // END UTILITY FUNCTIONS
  /*******************************************/
}
?>
