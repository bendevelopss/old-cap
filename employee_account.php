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
  header('Location: login.php');
}

$content2=mysql_query("select * from employee where username='".$_SESSION['user']."' and password='".$_SESSION['pass']."' ");
$total2=@mysql_affected_rows();

    
$row=mysql_fetch_array($content2);

$user2=$row['username'];
$pass2=$row['password'];
$cust_type2=$row['cust_type'];
$comp_name2=$row['comp_name'];
$phone_num2=$row['phone_num'];
$fax2=$row['fax'];
$email2=$row['email'];
$firstname2=$row['firstname'];
$middlename2=$row['middlename'];
$lastname2=$row['lastname'];
$contact2=$row['contact'];
$city2=$row['city'];
$street2=$row['street'];


$a= date("Y-m-d");

?>
<!DOCTYPE html>
<html>
<head>
<title>Home</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="font-awesome-4.6.3/css/font-awesome.min.css">
  <script src="jQuery/jQuery-2.1.3.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
      <!----- datatables -->
  <link rel="stylesheet" href="http://localhost/xampp/capstone/DataTables/css/jquery.dataTables.min.css">
  <script src="http://localhost/xampp/capstone/DataTables/js/jquery.dataTables.min.js"></script>
  <!----- datatables -->
</head>
<!--Style-->
<style type="text/css">
body
{
  background-color:#bcab90;
  margin: 0px;
}
h6
{
  border-bottom: 2px solid black;
 
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
if(isset($_SESSION['pos']) && ($_SESSION['pos']=='admin' || $_SESSION['pos']=='Admin') )
{

echo'<body class="w3-container">
<!--navbar-->
<ul class="w3-navbar w3-card-4 w3-camo-dark-green w3-large">
  <li><a href="main.php"><i class="fa fa-home" style="height: 22px; text-align: center;">  Fareal Builders Inc.</i></a></li>
    <li class="w3-dropdown-hover w3-hover-orange">
    <a class="w3-hover-brown" href="#">Transaction<i class="fa fa-caret-down"></i></a>
    <div class="w3-dropdown-content w3-white w3-card-4">
      <h6>Quotation</h6>  
      <a href="quot1.php">Quotation-Form</a>
      <h6>P.O.</h6>  
      <a href="purchaseorder1.php">Purchase order</a>
      <h6>Delivery</h6>  
      <a href="delivery1.php">Delivery</a>
      <h6>M.R.</h6>  
      <a href="materialrequisition1.php">Material Requisition</a>
      <h6>Pullout</h6>  
      <a href="pullout1.php">Pull-out</a>
      <h6>Billing</h6>
      <a href="billing1.php">Billing</a>
      <h6>Payment</h6>
      <a href="payment1.php">Payment</a>
    </div>
    </li>
  <li class="w3-dropdown-hover w3-hover-orange">
    <a class="w3-hover-brown" href="#">Maintenance<i class="fa fa-caret-down"></i></a>
    <div class="w3-dropdown-content w3-white w3-card-4">  
    <h6>Supplier</h6>  
      <a href="supplier.php">Supplier</a>
    <h6>Employee</h6>  
      <a href="position.php">Position</a>
      <a href="employee.php">Employee</a>
    <h6>Materials</h6>  
      <a href="category.php">Category</a>
      <a href="subcategory.php">Sub-Category</a>
      <a href="unit_measurement.php">Unit Measurement</a>
      <a href="materials.php">Materials</a>
    </div>
    </li>
         <li class="w3-dropdown-hover w3-hover-orange">
    <a class="w3-hover-brown" href="#">Utilities<i class="fa fa-caret-down"></i></a>
    <div class="w3-dropdown-content w3-white w3-card-4">  
    <h6>Audit Trail</h6>  
      <a href="audit_trail.php">Audit Trail</a>
    </div>
    </li>
    <li class="w3-right w3-dropdown-hover w3-hover-orange">';
      ?>
    <a class="w3-black w3-hover-black" href="#"><?php echo ''.ucfirst($lastname2).', '.ucfirst($firstname2).' '.strtoupper($middlename2[0]).'.'; ?> <i class="fa fa-user"></i></a>
    <div class="w3-dropdown-content w3-white w3-card-4" style="right:0">
      <?php echo' <h5><a href="employee_account.php">User Settings</a></h5>
      <h5><a href="?logout=true">Logout</a></h5>
    </a></li>
    <li class="w3-right" style="margin-top:8px;"><span id="time" style="margin-left: -250px;"></span></li>
</ul>
<!--navbar-->';
}


if(isset($_SESSION['pos']) && $_SESSION['pos']=='Quantity Surveyor')
{

  mysql_query("update sample set status='inactive' where user='".$_SESSION['user']."' and pass='".$_SESSION['pass']."' ");
  session_destroy();
  header('Location: login.php');

}

if(isset($_SESSION['pos']) && $_SESSION['pos']=='Secretary')
{

  mysql_query("update sample set status='inactive' where user='".$_SESSION['user']."' and pass='".$_SESSION['pass']."' ");
  session_destroy();
  header('Location: login.php');
}
if(isset($_SESSION['pos']) && $_SESSION['pos']=='Foreman')
{
  
  mysql_query("update sample set status='inactive' where user='".$_SESSION['user']."' and pass='".$_SESSION['pass']."' ");
  session_destroy();
  header('Location: login.php');

}
if(isset($_SESSION['pos']) && $_SESSION['pos']=='Stockman')
{

  mysql_query("update sample set status='inactive' where user='".$_SESSION['user']."' and pass='".$_SESSION['pass']."' ");
  session_destroy();
  header('Location: login.php');
}
if(isset($_SESSION['pos']) && $_SESSION['pos']=='Accountant')
{
  mysql_query("update sample set status='inactive' where user='".$_SESSION['user']."' and pass='".$_SESSION['pass']."' ");
  session_destroy();
  header('Location: login.php');
}
?>
<!--navbar-->
<?php
if(isset($_GET['logout']))
{
  session_destroy();
  echo "<meta http-equiv='refresh' content='0'>";
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


//Update query
  if(isset($_POST['btnSave']))
                {
                    $user=$_POST['user'];
                    $pass=$_POST['pass'];
                    $email=$_POST['txtemail'];
                    $fname=$_POST['txtfirstname'];
                    $mname=$_POST['txtmiddlename'];
                    $lname=$_POST['txtlastname'];
                    $contact=$_POST['txtcontact'];
                    $street=$_POST['txtstreet'];
                    $city=$_POST['txtcity'];
                  
                    mysql_query("UPDATE employee SET username='".$user."', password='".$pass."' ,firstname='".$fname."', middlename='".$mname."' ,lastname='".$lname."' ,contact='".$contact."' ,email='".$email."' ,street='".$street."',city='".$city."' where username='".$user2."' and password='".$pass2."' ");
                    mysql_query("UPDATE sample SET username='".$user."', password='".$pass."' where username='".$user2."' and password='".$pass2."' ");
                    echo "<script type='text/javascript'>alert('Update Successfull!')</script>";
                    echo "<meta http-equiv='refresh' content='0'>";
 
                                       
                }


?>

    <input class="w3-input w3-border" type="hidden" name="customer_no" value="<?php echo $hell; ?>" style="width:35%;margin-left:15px; height:30px;">
<!--first radio-->
<br>

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
<br></br>


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
<input type="submit" name="btnSave" onclick="return confirm('Are you sure?');" value="submit" class="w3-btn w3-blue w3-border w3-border-red w3-round-large"/>

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

<!--Clear Fields-->
<script type="text/javascript"> 
function ClearFields() {
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
    var txtemail,txtfirstname, txtmiddlename ,txtlastname, txtcontact, txtstreet, txtcity, textcontact1;
    var user = document.getElementById("user").value;
    var a= document.getElementById("pass").value;
    var b= document.getElementById("cpass").value;
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

