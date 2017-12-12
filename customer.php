<?php
ini_set('display-error',1);
error_reporting(E_ALL&~E_NOTICE);

if($connect=@mysql_connect("localhost","root"))
  echo"";
  else
die(@mysql_error());
$connect=@mysql_select_db("projectmonitoring");
session_start();

if($_SESSION['user']=='' && $_SESSION['pass']=='')
{
  echo '<script type="text/javascript">window.location.href="login.php";</script>'; 
}

$content2=mysql_query("select * from customer where username='".$_SESSION['user']."' and password='".$_SESSION['pass']."' ");
$total2=@mysql_affected_rows();

    
$row1=mysql_fetch_array($content2);

$user2=$row1['username'];
$pass2=$row1['password'];
$cust_type2=$row1['cust_type'];
$comp_name2=$row1['comp_name'];
$phone_num2=$row1['phone_num'];
$fax2=$row1['fax'];
$email2=$row1['email'];
$firstname2=$row1['firstname'];
$middlename2=$row1['middlename'];
$lastname2=$row1['lastname'];
$contact2=$row1['contact'];
$city2=$row1['city'];
$street2=$row1['street'];


$a= date("Y-m-d");

?>
<!DOCTYPE html>
<html>
<head>
<title>Account: Setting</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="font-awesome-4.6.3/css/font-awesome.min.css">
  <script src="jQuery/jQuery-2.1.3.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
      <!--- datatables -->
  <link rel="stylesheet" href="http://localhost/xampp/capstone/DataTables/responsive/css/responsive.dataTables.min.css">
  <link rel="stylesheet" href="http://localhost/xampp/capstone/DataTables/css/jquery.dataTables.min.css">
  <script src="http://localhost/xampp/capstone/DataTables/js/jquery.dataTables.min.js"></script>
  <script src="http://localhost/xampp/capstone/DataTables/responsive/js/dataTables.responsive.min.js"></script>
  <!--- datatables -->
</head>
<!--Style-->
<style type="text/css">
body
{
  background-color:#bcab90;
  margin: 0px;
}
h4
{
  border-bottom: 2px solid black;
  text-align: center;
  font-weight: bold;
 
}
h5
{
  border-bottom: 2px solid black;
  text-align: center;
 
}
.w3-camo-dark-green
{
  color:#fff;background-color:#535640
}
.w3-camo-earth
{
  color:#fff;background-color:#ac7e54
}
.w3-navbar
{
  width: 103%;
  margin-left: -17px;
}

</style>
<!--Style-->

<!--Form action-->
<form action="" method="post" name="frm" id="frm">
<!--Form action-->

<!--authentications-->
<?php

echo'<body class="w3-container">
<!--navbar-->
<ul class="w3-navbar w3-card-4 w3-camo-dark-green w3-large">
  <li><a href="cmain.php"><i class="fa fa-home" style="height: 22px; text-align: center;">  Fareal Builders Inc.</i></a></li>
    <li class="w3-right w3-dropdown-hover w3-hover-orange">';
      ?>
    <a class="w3-black w3-hover-black" href="#"><?php echo ''.ucfirst($lastname2).', '.ucfirst($firstname2).' '.strtoupper($middlename2[0]).'.'; ?> <i class="fa fa-user"></i></a>
    <div class="w3-dropdown-content w3-white w3-card-4" style="right:0">
      <?php echo' <h5><a href="customer.php">User Settings</a></h5>
      <h5><a href="?logout=true">Logout</a></h5>
    </a></li>
    <li class="w3-right" style="margin-top:8px;"><span id="time" style="margin-left: -250px;"></span></li>
</ul>
<!--navbar-->';


?>

<!--navbar-->
<?php
if(isset($_GET['logout']))
{
  mysql_query("update sample set status='inactive' where user='".$_SESSION['user']."' and pass='".$_SESSION['pass']."' ");
  session_destroy();
  echo '<script type="text/javascript">window.location.href="login.php";</script>'; 
}
?>


<!--row class start-->
<div class="w3-row">
<!--row class-->

<!--card to left-->
<div class="w3-col w3-container m6 l8">
<!--card to left-->

<!--card start-->
<div class="w3-card-4 w3-center w3-light-grey w3-round" style="width:151%; margin-top: 10px; ">
<!--card start-->

<!--card Header-->
<header class="w3-container w3-camo-dark-green w3-round">
  <h1>User Information</h1>
</header>
<!--card Header-->

<!--Left Body-->

<!--First box-->
<br>
<?php
$content1=mysql_query("select max(customer_no) as max from customer");
$total1=@mysql_affected_rows();

    
$row=mysql_fetch_array($content1);
$noo=$row['max'];

$hell=$noo+1;
$type=$_POST['radiobutton'];
$sname1=$_POST['txtname'];
$phone=$_POST['txtphone'];
$fax=$_POST['txtfax'];
$email=$_POST['txtemail'];
$fname=$_POST['txtfirstname'];
$mname=$_POST['txtmiddlename'];
$lname=$_POST['txtlastname'];
$contact=$_POST['txtcontact'];
$street=$_POST['txtstreet'];
$city=$_POST['txtcity'];

$status="Active";
$cont= strlen($contact);

$sname= mysql_real_escape_string($sname1);


if(empty($mname))
{

$mname=" ";

}


if(isset($_POST['btnAdd']) && $type=="Company" &&  !empty($sname1))

{



if( !empty($sname1) && !empty($fname) && !empty($lname) && !empty($contact) && !empty($street) && !empty($city))


{

if(preg_match("/^[a-zA-Z,-,', .,-]*$/",$fname) && preg_match("/^[a-zA-Z,-,', .,-]*$/",$mname) && preg_match("/^[a-zA-Z,-,', .,-]*$/",$lname) && preg_match("/^[0-9]*$/",$contact) && preg_match("/^[0-9,-]*$/",$phone) && preg_match("/^[0-9,-]*$/",$fax) ) 
    {

$fname1= mysql_real_escape_string($fname);
$mname1= mysql_real_escape_string($mname);
$lname1= mysql_real_escape_string($lname);


$status="Active";


mysql_query("insert into customer (cust_type, comp_name, phone_num, fax, email, firstname, middlename, lastname, contact, street , city, status) values('".$type."', '".$sname."', '".$phone."', '".$fax."', '".$email."', '".$fname1."', '".$mname1."', '".$lname1."', '".$contact."', '".$street."', '".$city."', '".$status."')");
  
 echo '<script type="text/javascript">alert("Customer has been added")</script>'; 



}


 if(!preg_match("/^[a-zA-Z,-,', ,.]*$/",$fname)) 
    {

 echo '<script type="text/javascript">alert("Invalid First name")</script>'; 



      }

       if(!preg_match("/^[a-zA-Z,-,', .,-]*$/",$mname)) 
    {

 echo '<script type="text/javascript">alert("Invalid Middle name")</script>'; 



      }

 if(!preg_match("/^[a-zA-Z,-,', .,-]*$/",$lname)) 
    {

 echo '<script type="text/javascript">alert("Invalid Last Name")</script>'; 



      }

      if(!preg_match("/^[0-9,-]*$/",$contact)) 
    {

 echo '<script type="text/javascript">alert("Contact Number only accepts numerical data")</script>'; 



      }


if(!preg_match("/^[0-9,-]*$/",$fax))

{

 echo '<script type="text/javascript">alert("FAX only accepts numerical data")</script>'; 



}

if(!preg_match("/^[0-9,-]*$/",$phone))

{

 echo '<script type="text/javascript">alert("Phone number only accepts numerical data")</script>'; 
}







}



}



else if(isset($_POST['btnAdd']) && $type=="Company" && empty($sname)  && empty($fname) && empty($lname) && empty($contact) && empty($street) && empty($city))


{

echo '<script type="text/javascript">alert("Pleae input Data")</script>'; 




}

//individual

if(isset($_POST['btnAdd']) && $type=="Individual")

{



if( !empty($fname) && !empty($lname) && !empty($contact) && !empty($street) && !empty($city))


{

if(preg_match("/^[a-zA-Z,-,', .,-]*$/",$fname) && preg_match("/^[a-zA-Z,-,', .,-]*$/",$mname) && preg_match("/^[a-zA-Z,-,', .,-]*$/",$lname) && preg_match("/^[0-9]*$/",$contact) && preg_match("/^[0-9,-]*$/",$phone) && preg_match("/^[0-9,-]*$/",$fax) ) 
    {

$fname1= mysql_real_escape_string($fname);
$mname1= mysql_real_escape_string($mname);
$lname1= mysql_real_escape_string($lname);


$status="Active";


mysql_query("insert into customer (cust_type, comp_name, phone_num, fax, email, firstname, middlename, lastname, contact, street , city, status) values('".$type."', '".$sname."', '".$phone."', '".$fax."', '".$email."', '".$fname1."', '".$mname1."', '".$lname1."', '".$contact."', '".$street."', '".$city."', '".$status."')");
  
 echo '<script type="text/javascript">alert("Customer has been added")</script>'; 



}





 if(!preg_match("/^[a-zA-Z,-,', ,.]*$/",$fname)) 
    {

 echo '<script type="text/javascript">alert("Invalid First name")</script>'; 



      }

       if(!preg_match("/^[a-zA-Z,-,', .,-]*$/",$mname)) 
    {

 echo '<script type="text/javascript">alert("Invalid Middle name")</script>'; 



      }

 if(!preg_match("/^[a-zA-Z,-,', .,-]*$/",$lname)) 
    {

 echo '<script type="text/javascript">alert("Invalid Last Name")</script>'; 



      }

      if(!preg_match("/^[0-9,-]*$/",$contact)) 
    {

 echo '<script type="text/javascript">alert("Contact Number only accepts numerical data")</script>'; 



      }


if(!preg_match("/^[0-9,-]*$/",$fax))

{

 echo '<script type="text/javascript">alert("FAX only accepts numerical data")</script>'; 



}

if(!preg_match("/^[0-9,-]*$/",$phone))

{

 echo '<script type="text/javascript">alert("Phone number only accepts numerical data")</script>'; 
}








}



}



else if(isset($_POST['btnAdd']) && $type=="Individual" && empty($fname) && empty($lname) && empty($contact) && empty($street) && empty($city))


{

echo '<script type="text/javascript">alert("Pleae input Data")</script>'; 




}


//Update query
  if(isset($_POST['btnSave']))
                {
                    $type=$_POST['radiobutton'];
                    $sname1=$_POST['txtname'];
                    $phone=$_POST['txtphone'];
                    $fax=$_POST['txtfax'];
                    $email=$_POST['txtemail'];
                    $fname=$_POST['txtfirstname'];
                    $mname=$_POST['txtmiddlename'];
                    $lname=$_POST['txtlastname'];
                    $contact=$_POST['txtcontact'];
                    $address=$_POST['txtstreet'];
                    $city=$_POST['txtcity'];
                  
                    mysql_query("UPDATE customer SET cust_type='".$type."',comp_name='".$sname1."',phone_num='".$phone."',fax='".$fax."',email='".$email."',firstname='".$fname."',middlename='".$mname."',lastname='".$lname."',contact='".$contact."',street='".$address."', city='".$city."' WHERE username='".$_SESSION['user']."' and password='".$_SESSION['pass']."' ");
                    echo "<script type='text/javascript'>alert('Update Successfull!')</script>";
 
                                       
                }


?>

    <input class="w3-input w3-border" type="hidden" name="customer_no" value="<?php echo $hell; ?>" style="width:35%;margin-left:15px; height:30px;">
<!--first radio-->
<br>
<form class="w3-container w3-card-4">
<label style="font-size: 1.0em; margin-right:880px;">Customer Type:</label>

<p style="margin-left:-820px;">
<?php if($cust_type2=="Company")
{
echo'<input class="w3-radio" type="radio" name="radiobutton" id="no_radio" onChange="disablefield();" value="Company" checked>
<label class="w3-validate"  style="font-size: 0.8em;" >Company</label>
<input class="w3-radio" type="radio" id="yes_radio" name="radiobutton" onChange="disablefield();" value="Individual">
<label class="w3-validate"  style="font-size: 0.8em;" >Individual</label>';
}
 else
{
echo'<input class="w3-radio" type="radio" name="radiobutton" id="no_radio" onChange="disablefield();" value="Company">
<label class="w3-validate"  style="font-size: 0.8em;">Company</label>
<input class="w3-radio" type="radio" id="yes_radio" name="radiobutton" onChange="disablefield();" value="Individual" checked>
<label class="w3-validate"  style="font-size: 0.8em;" >Individual</label>';
}?>
</p>

</form>

<!--1 box-->
<br> 
<h1 style="font-size: 2.0em; margin-left: -890px;">ACCOUNT INFORMATION</h1>
<br>
<div class="w3-row-padding">
  <div class="w3-half">
    <label style="margin-left:-235px;">Username:</label>
    <input class="w3-input w3-border" type="text" placeholder="Username" name="user" id="user" value="<?php echo $user2; ?>" style="height:33px;">
  </div>
  </div><br>
  <div class="w3-row-padding">
  <div class="w3-half">
    <label style="margin-left:-265px;margin-top:10px;">Password:</label>
    <input class="w3-input w3-border" type="password" placeholder="Password" name="pass" id="pass" value="<?php echo $pass2; ?>" style="height:33px;">
  </div>
<div class="w3-half">
    <label style="margin-left:5px;margin-top:10px;">Confirm Password:</label>
    <strong><span id='message' style="margin-left:30px;"></span></strong>
    <input class="w3-input w3-border" type="password" placeholder="Confirm Password" name="cpass" id="cpass"  style="height:33px;">
  </div>
</div>
<br>


<!--2 box--> 
<br> 
<h1 style="font-size: 2.0em; margin-left: -890px;">COMPANY INFORMATION</h1>
<br>
<div class="w3-row-padding">
  <div class="w3-half">
    <label style="margin-left:-235px;">Company Name:</label>
    <input class="w3-input w3-border" type="text" placeholder="Company Name" name="txtname" id="textbox_A" value="<?php echo $comp_name2; ?>" style="height:33px;">
  </div>
  <div class="w3-half">
    <label style="margin-left:-235px;">Phone Number:</label>
      <strong><span id='messages' style="margin-left:30px;"></span></strong>
    <input class="w3-input w3-border" type="text" placeholder="Phone Number" name="txtphone" id="textbox_B" value="<?php echo $phone_num2; ?>" style="height:33px;">
  </div><br>
  <div class="w3-half">
    <label style="margin-left:-265px;margin-top:10px;">Fax Number:</label>
    <input class="w3-input w3-border" type="text" placeholder="Fax Number" name="txtfax" id="textbox_C" value="<?php echo $fax2; ?>" style="height:33px;">
  </div>

</div>
<br>


<!--3 box--> 
<h1 style="font-size: 2.0em; margin-left: -890px;">PERSONAL INFORMATION</h1>
<br>
<div class="w3-row-padding">
  <div class="w3-third">
    <label style="margin-left:-160px;">First Name:</label>
     <strong><span id='messagefirst' style="margin-left:10px;"></span></strong>
    <input class="w3-input w3-border" type="text" placeholder="First Name" style="height:33px;" id="firstname" name="txtfirstname" value="<?php echo $firstname2; ?>">
  </div>
  <div class="w3-third">
    <label style="margin-left:-170px;">Middle Name:</label>
    <input class="w3-input w3-border" type="text" placeholder="Middle Name" style="height:33px;" id="middlename" name="txtmiddlename" value="<?php echo $middlename2; ?>">
  </div>
  <div class="w3-third">
    <label style="margin-left:-150px;">Last Name:</label>
     <strong><span id='messagelast' style="margin-left:10px;"></span></strong>
    <input class="w3-input w3-border" type="text" placeholder="Last Name" style="height:33px;"  name="txtlastname" id="lastname" value="<?php echo $lastname2; ?>">
  </div>
  </div>
  <div class="w3-row-padding">
  <div class="w3-third">
    <label style="margin-left:-140px; margin-top: 10px;">Contact Number:</label>
    <input class="w3-input w3-border" type="text" placeholder="Contact Number" style="height:33px; " id="contact" name="txtcontact" value="<?php echo $contact2; ?>">
  </div>
  <div class="w3-third">
    <label style="margin-left:-150px; margin-top: 10px;">Email Address:</label>
    <input class="w3-input w3-border" type="text" placeholder="Email Address" style="height:33px; " id="email" name="txtemail" value="<?php echo $email2; ?>">
  </div> 
</div>
<br>

<!--4 box--> 
<h1 style="font-size: 2.0em; margin-left: -1115px;">ADDRESS</h1>
<br>
<div class="w3-row-padding">
  <div class="w3-half">
    <label style="margin-left:-355px;">Street:</label>
    <input class="w3-input w3-border" type="text" placeholder="Street" style="height:33px;" id="street" name="txtstreet" value="<?php echo $street2; ?>">
  </div>
  <div class="w3-half">
    <label style="margin-left:-375px;">City:</label>
    <input class="w3-input w3-border" type="text" placeholder="City" style="height:33px;" id="city" name="txtcity" value="<?php echo $city2; ?>">
  </div><br>

</div>
<br>

<!--Butons-->
<br>
<input type="submit" name="btnSave" value="submit" class="w3-btn w3-blue w3-border w3-border-red w3-round-large"/>

<button type="button" name="btnReset" class="w3-btn w3-green w3-border w3-border-red w3-round-large" onclick="ClearFields();">Reset</button>
<br></br><br></br>
<!--Left Body-->

<!--card end-->
</div>
<!--card end-->

<!--card to left end-->
</div>
<!--card to left end-->

<!--row class end-->
</div>
<!--row class-->
</form>

<!--Time-->
<script>
 function setTime() {
    var d = new Date(),
      el = document.getElementById("time");

      el.innerHTML = formatAMPM(d);

    setTimeout(setTime, 1000);
    }

    function formatAMPM(date) {
        var weekday = new Array(7);
        weekday[0]=  "Sunday";
        weekday[1] = "Monday";
        weekday[2] = "Tuesday";
        weekday[3] = "Wednesday";
        weekday[4] = "Thursday";
        weekday[5] = "Friday";
        weekday[6] = "Saturday";
      var hours = date.getHours(),
        minutes = date.getMinutes(),
        seconds = date.getSeconds(),
        months = date.getMonth(),
        days = date.getDate(),
        year = date.getFullYear(),
        n = weekday[date.getDay()];
        ampm = hours >= 12 ? 'pm' : 'am';
      hours = hours % 12;
      hours = hours ? hours : 12; // the hour '0' should be '12'
      minutes = minutes < 10 ? '0'+minutes : minutes;
      months=months+1;
    
      var strTime = n + ' ' + months + '/' + days + '/' + year + '\n' + hours + ':' + minutes + ':' + seconds + ' ' + ampm;
      return strTime;
    }

    setTime();
</script>
<!--Time-->
<!--radiobutton-->
<script type="text/javascript"> 
function disablefield(){ 
if (document.getElementById('yes_radio').checked == 1){ 
document.getElementById('textbox_A').disabled='disabled'; 
document.getElementById('textbox_B').disabled='disabled'; 
document.getElementById('textbox_C').disabled='disabled'; 
document.getElementById('textbox_A').value=''; 
document.getElementById('textbox_B').value=''; 
document.getElementById('textbox_C').value=''; 
}else{ 
document.getElementById('textbox_A').disabled='';
document.getElementById('textbox_B').disabled=''; 
document.getElementById('textbox_C').disabled='';  
} 
} 

function disablefield1(){ 
if (document.getElementById('individual').checked == 1){ 
document.getElementById('comp_name1').disabled='disabled'; 
document.getElementById('phone_num1').disabled='disabled'; 
document.getElementById('fax1').disabled='disabled'; 
}else{ 
document.getElementById('comp_name1').disabled='';
document.getElementById('phone_num1').disabled=''; 
document.getElementById('fax1').disabled='';  
} 
} 

</script> 

<!--Clear Fields-->
<script type="text/javascript"> 
function ClearFields() {
      document.getElementById("textbox_A").value = "";
      document.getElementById("textbox_B").value = "";
      document.getElementById("textbox_C").value = "";
      document.getElementById("firstname").value = "";
      document.getElementById("middlename").value = "";
      document.getElementById("lastname").value = "";
      document.getElementById("contact").value = "";
      document.getElementById("email").value = "";
      document.getElementById("city").value = "";
      document.getElementById("street").value = "";
       

}
</script>

<script type="text/javascript">
function checkPasswordMatch() {
    var password = $("#pass").val();
    var confirmPassword = $("#cpass").val();
    var txtphone =  $("#textbox_B").val();
    var txtlastname= $("#lastname").val();
    var txtfirstname = $("#firstname").val();
    var txtmiddlename =$("#middlename").val();
    var emails= $("#email").val();



if(!(emails.match(/.com/g)) || !(emails.match(/@/g)) || (emails.match(/@.com/g)))
{

$("#messageemail").html("   ").css('color','red');
        $("#messageemail").removeClass('fa fa-thumbs-o-up').addClass('fa fa-thumbs-o-down');
        $("#email").removeClass('w3-border-red w3-pale-green w3-leftbar w3-rightbar w3-border-green');
        $("#email").addClass('w3-border-green w3-pale-red w3-leftbar w3-rightbar w3-border-red');


}

  else
    {
        $("#messageemail").html("   ").css('color','green');
        $("#messageemail").removeClass('fa fa-thumbs-o-down').addClass('fa fa-thumbs-o-up');
        $("#email").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red').addClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
    }

 if(emails=='')
    {
      $("#messageemail").html("").css(' ');
      $("#email").removeClass('w3-border-red');
      $("#email").removeClass('w3-border-green');
      $("#email").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');
      $("#email").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
      $("#messageemail").removeClass('fa fa-thumbs-o-down');
      $("#messageemail").removeClass('fa fa-thumbs-o-up');
    }

    if (password != confirmPassword)
    {
        $("#message").html("Passwords do not match!").css('color','red');
        $("#message").removeClass('fa fa-thumbs-o-up').addClass('fa fa-thumbs-o-down');
        $("#cpass").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
        $("#cpass").addClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');
      }



    else
    {
        $("#message").html("Passwords match").css('color','green');
        $("#message").removeClass('fa fa-thumbs-o-down').addClass('fa fa-thumbs-o-up');
        $("#cpass").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red').addClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
    }

    if(confirmPassword=='')
    {
      $("#message").html("").css('red');
      $("#cpass").removeClass('w3-border-red');
      $("#cpass").removeClass('w3-border-green');
      $("#cpass").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');
      $("#cpass").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
      $("#message").removeClass('fa fa-thumbs-o-down');
    }

      
   if (txtphone.match(/[a-zA-Z]/g)) 
      {

        $("#messages").html("Phone number must not be alphabetical").css('color','red');
        $("#messages").removeClass('fa fa-thumbs-o-up').addClass('fa fa-thumbs-o-down');
        $("#textbox_B").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
        $("#textbox_B").addClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');
        
      }
    else
    {
        $("#messages").html("   ").css('color','green');
        $("#messages").removeClass('fa fa-thumbs-o-down').addClass('fa fa-thumbs-o-up');
        $("#textbox_B").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red').addClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
    }

    if(txtphone=='')
    {
      $("#messages").html("").css(' ');
      $("#textbox_B").removeClass('w3-border-red');
      $("#textbox_B").removeClass('w3-border-green');
      $("#textbox_B").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');
      $("#textbox_B").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
      $("#messages").removeClass('fa fa-thumbs-o-down');
      $("#messages").removeClass('fa fa-thumbs-o-up');
    }


      if (txtlastname.match(/[0-9]/g)) 
      {

        $("#messagelast").html("Last Name must not be numerical").css('color','red');
        $("#messagelast").removeClass('fa fa-thumbs-o-up').addClass('fa fa-thumbs-o-down');
        $("#lastname").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
        $("#lastname").addClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');

      }
      else
    {
        $("#messagelast").html("   ").css('color','green');
        $("#messagelast").removeClass('fa fa-thumbs-o-down').addClass('fa fa-thumbs-o-up');
        $("#lastname").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red').addClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
    }

    if(txtlastname=='')
    {
       $("#messagelast").html("This is a required field").css('color','red');
      $("#lastname").removeClass('w3-border-red');
      $("#lastname").removeClass('w3-border-green');
      $("#lastname").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');
      $("#lastname").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
      $("#messagelast").removeClass('fa fa-thumbs-o-down');
      $("#messagelast").removeClass('fa fa-thumbs-o-up');

    }


      if (txtfirstname.match(/[0-9]/g)) 
      {

        $("#messagefirst").html("First Name must not be numerical").css('color','red');
        $("#messagefirst").removeClass('fa fa-thumbs-o-up').addClass('fa fa-thumbs-o-down');
        $("#firstname").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
        $("#firstname").addClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');

      }
      else
    {
        $("#messagefirst").html("   ").css('color','green');
        $("#messagefirst").removeClass('fa fa-thumbs-o-down').addClass('fa fa-thumbs-o-up');
        $("#firstname").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red').addClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
    }

    if(txtfirstname=='')
    {
       $("#messagefirst").html("This is a required field").css('color','red');
      $("#firstname").removeClass('w3-border-red');
      $("#firstname").removeClass('w3-border-green');
      $("#firstname").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');
      $("#firstname").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
      $("#messagefirst").removeClass('fa fa-thumbs-o-down');
      $("#messagefirst").removeClass('fa fa-thumbs-o-up');

    }



 if (txtmiddlename.match(/[0-9]/g)) 
      {

        $("#messagemiddle").html("First Name must not be numerical").css('color','red');
        $("#messagemiddle").removeClass('fa fa-thumbs-o-up').addClass('fa fa-thumbs-o-down');
        $("#middlename").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
        $("#middlename").addClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');

      }
      else
    {
        $("#messagemiddle").html("   ").css('color','green');
        $("#messagemiddle").removeClass('fa fa-thumbs-o-down').addClass('fa fa-thumbs-o-up');
        $("#middlename").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red').addClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
    }




}

$(document).ready(function () {
   $("#pass, #cpass, #textbox_B, #lastname, #firstname, #middlename, #email").keyup(checkPasswordMatch);
});
</script>

<!--Validations-->
<script>
function myFunction() {
    var txtname,txtphone,txtemail,txtfirstname, txtmiddlename ,txtlastname, txtcontact, txtstreet, txtcity, textcontact1;
    var user = document.getElementById("user").value;
    var a= document.getElementById("pass").value;
    var b= document.getElementById("cpass").value;
    txtname = document.getElementById("textbox_A").value;
    txtphone = document.getElementById("textbox_B").value;
    txtemail = document.getElementById("textbox_C").value;
    txtfirstname = document.getElementById("firstname").value;
    txtmiddlename = document.getElementById("middlename").value;
    txtlastname = document.getElementById("lastname").value;
    txtcontact = document.getElementById("contact").value;
    txtcontact1 = document.getElementById("contact").value.length;
    txtstreet = document.getElementById("street").value;
    txtcity = document.getElementById("city").value;

  
    if(a!=b)
    {
      alert("Your Password doesnt match!");
      return false;
    }
    else if (user=='') 
    {
        alert("Username is a required filled");
        return false;
    } 
   else if (txtname=='') 
    {
        alert("Company Name is a required filled");
        return false;
    } 
    else if (txtphone=='') 
    {
        alert("Phone is a required filled");
        return false;
    } 
    else if (txtemail=='') 
    {
        alert("Email Address is a required filled");
        return false;
    } 
     else if (txtfirstname=='') 
    {
        alert("First Name is a required filled");
        return false;
    } 
    
     else if (txtlastname=='') 
    {
        alert("Last Name is a required filled");
        return false;
    } 
      else if (txtphone.match(/[a-zA-Z]/g)) 
    {
        alert("phone must be not alphabetical");
        return false;
    } 
else if (txtlastname.match(/[0-9]/g)) 
    {
        alert("Last name must not be numerical");
        return false;
    } 
    else if (txtfirstname.match(/[0-9]/g)) 
    {
        alert("First name must not be numerical");
        return false;
    } 

 else if (txtmiddlename.match(/[0-9]/g)) 
    {
        alert("Middle name must not be numerical");
        return false;
    } 

    
    else 
    {
        text = "Input OK";
    }
    
}
</script>
<!--Validations-->


</body>
</html>

