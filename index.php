<?php
ini_set('display-error',1);
error_reporting(E_ALL&~E_NOTICE);

if($connect=@mysql_connect("localhost","root"))
  echo"";
  else
die(@mysql_error());
$connect=@mysql_select_db("projectmonitoring");
session_start();

$user=$_POST['user'];
$pass=$_POST['pass'];
$pos=$_POST['pos'];



$find=mysql_query("select * from sample where user='".$user."' and account_status='active'");
$total1=@mysql_affected_rows();
$row=mysql_fetch_array($find);
$user2=$row['user'];
$pass2=$row['pass'];
$pos2=$row['position'];

$pos=$pos2;

if(isset($_POST['login']) && $user!=$user2 && $pass!=$pass2)
{

echo '<script type="text/javascript">alert("Username, position and Password are wrong")</script>'; 

}

if(isset($_POST['login']) && $user==$user2 && $pass==$pass2 && $pos=='customer')
{

$_SESSION['user']=$user;
$_SESSION['pass']=$pass;
$_SESSION['pos']=$pos;

mysql_query("update sample set status='active' where user='".$user."' and pass='".$pass."' ");
header('Location: cmain.php');

}
else if(isset($_POST['login']) && $user==$user2 && $pass==$pass2)
{

$_SESSION['user']=$user;
$_SESSION['pass']=$pass;
$_SESSION['pos']=$pos;

mysql_query("update sample set status='active' where user='".$user."' and pass='".$pass."' ");
header('Location: main.php');

}






if(isset($_POST['btnSave']))
                {


if(preg_match("/^[a-zA-Z,-,', .,-]*$/",$f1) && preg_match("/^[a-zA-Z,-,', .,-]*$/",$m1) && preg_match("/^[a-zA-Z,-,', .,-]*$/",$l1)) 
    {


                    $user = $_POST['user1'];
                    $pass = $_POST['pass1'];
                    $email = $_POST['email1'];
                    $f1 = $_POST['f1'];
                    $m1 = $_POST['m1'];
                    $l1 = $_POST['l1'];
                    $c1 = $_POST['c1'];
                    $a1 = $_POST['a1'];
                    $city = $_POST['city1'];
                    $status='inactive';
                    $account_status='active';
                    $pos='customer';
$user1= mysql_real_escape_string($user);
$pass1= mysql_real_escape_string($pass);

$fname1= mysql_real_escape_string($f1);
$mname1= mysql_real_escape_string($m1);
$lname1= mysql_real_escape_string($l1);
                    
                    mysql_query("insert into sample (user,  pass, position ,status,account_status) values('".$user."','".$pass."','".$pos."','".$status."','".$account_status."')");
                    mysql_query("insert into customer (username,  password, cust_type , email, firstname, middlename ,lastname , contact, street, city, status) values('".$user1."','".$pass1."', 'Individual','".$email."', '".$fname1."', '".$mname1."', '".$lname1."', '".$c1."', '".$a1."', '".$city."','".$status."')");
                    echo "<script type='text/javascript'>alert('Your account has been created')</script>";
 



                                       
                }


}

?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
  <script src="jQuery/jQuery-2.1.3.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
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

<body class="w3-container">

<!--Form action-->
<form action="" method="post" name="frm" id="frm">
<!--Form action-->

<!--card to right-->
<div class="w3-col w3-container m8 l9" >
<!--card to right-->

<!--card start-->
<div class="w3-card-4 w3-center w3-light-grey w3-round" style="width:80%; margin-top: 70px; margin-left: 255px; ">
<!--card start-->

<!--card Header-->
<header class="w3-container w3-camo-dark-green w3-round">
  <h1>LOGIN</h1>
</header>
<!--card Header-->

<!--inputs-->
<br>

<label class="w3-label w3-validate">Username / Email</label>
<input class="w3-input w3-light-grey w3-border w3-hover-white" type="text" name="user" id="user" style="text-align: center; width:75%; margin-left: 95px;  ">
<label class="w3-label w3-validate">Password</label>
<input class="w3-input w3-light-grey w3-border w3-hover-white" type="password" name="pass"  id="pass" style="text-align: center; width:75%; margin-left: 95px; ">

<input class="w3-input w3-light-grey w3-border w3-hover-white" type="text" name="pos" id="pos" style="display: none">


<br><br>
<button name="login" id="login" onclick="return myFunction();" class="btn btn-primary btn-xl center">Login</button>

<button type="button" name="btnEdit" id="bntEdit" data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-xl center" onclick="get_id(this)" >Register</button>
<br></br>
<!--inputs-->

<!--Card end div-->
</div>
<!--Card end div-->
<!--card to right end-->
</div>
<!--card to right end-->

<!--row class end-->
</div>
<!--row class-->

<!--edit modal-->
<div class="modal fade" id="myModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <form method ="post" role="form" id="editForm">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"> <span aria-hidden="true" class="">X  </span><span class="sr-only">Close</span>

                </button>
                 <h4 class="modal-title" id="myModalLabel">Registration</h4>

            </div>        
            <div class="modal-body">
              <div class="form-group">
              <label>Username:</label>
              <input class="form-control" name="user1" id="user1" value=""/>
              <label class="w3-label w3-validate" value="tae"></label>
               <label>First Name:</label>
              <input type="text"  class="form-control" name="f1" id="f1" value=""/>
               <label>Middle Name:</label>
              <input type="text"  class="form-control" name="m1" id="m1" value=""/>
               <label>Last Name:</label>
              <input type="text"  class="form-control" name="l1" id="l1" value=""/>
               <label>Contact No.:</label>
              <input type="number"  class="form-control" name="c1" id="c1" value=""/>
              <label>Email Address:</label>
              <input type="email"  class="form-control" name="email1" id="email1" value=""/>
               <label>Street:</label>
              <input type="text"  class="form-control" name="a1" id="a1" value=""/>
               <label>City:</label>
              <input type="text"  class="form-control" name="city1" id="city1" value=""/>
              <label>Password:</label>
              <input type="password" class="form-control" name="pass1" id="pass1" value=""/>
              <label>Confirm Password:</label>
              <input type="password" class="form-control" name="pass2" id="pass2" value=""/>
              </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="btnSave" onClick="return myFunctions();" >Register</button>
            </div>
        </div>
    </div>
</div>
</form>
<!--edit modal end-->

<!--modal get the value-->
 <script type="text/javascript">
        function get_id(o) {
            myRowIndex = $(o).parent().parent().index();
            var getid=  (document.getElementById("tableko1").rows[($(o).parent().parent().index())+1].cells[0].innerHTML);    
            var $modal = $('#myModal'),
                $material_no1 = $modal.find('#material_no1');
            $material_no1.val(getid);    
            $brand1 = $modal.find('#brand1');
            $brand1.val(document.getElementById("tableko1").rows[($(o).parent().parent().index())+1].cells[1].innerHTML);       
            $desc1 = $modal.find('#desc1');
            $desc1.val(document.getElementById("tableko1").rows[($(o).parent().parent().index())+1].cells[2].innerHTML);       
            $color1 = $modal.find('#color1');
            $color1.val(document.getElementById("tableko1").rows[($(o).parent().parent().index())+1].cells[3].innerHTML);
            $pack1 = $modal.find('#pack1');
            $pack1.val(document.getElementById("tableko1").rows[($(o).parent().parent().index())+1].cells[4].innerHTML);
            $unitname1 = $modal.find('#unitname1');
            $unitname1.val(document.getElementById("tableko1").rows[($(o).parent().parent().index())+1].cells[5].innerHTML);
            $abbrev1 = $modal.find('#abbrev1');
            $abbrev1.val(document.getElementById("tableko1").rows[($(o).parent().parent().index())+1].cells[6].innerHTML);
            $price1 = $modal.find('#price1');
            $price1.val(document.getElementById("tableko1").rows[($(o).parent().parent().index())+1].cells[7].innerHTML);
          
        }
    </script>
    <!--modal get the value-->

<!--javascript-->
<script>
function myFunction() {
    var user,pass, text;

    // Get the value of the input field with id="numb"
    user = document.getElementById("user").value;
    pass = document.getElementById("pass").value;
    pos = document.getElementById("pos").value;

    // If x is Not a Number or less than one or greater than 10
    if (pass==''&&user=='') 
    {
        alert("Don't leave the box empty");
        return false;
    } 
    else if (user=='') 
    {
        alert("Username / Email is blank");
        return false;
    } 
    else if (pass=='') 
    {
        alert("Password is blank");
        return false;
    } 
    else 
    {
        text = "Input OK";
    }
}
</script>
<!--javascript-->

<script type="text/javascript">
function checkPasswordMatch() {
    var password = $("#pass1").val();
    var confirmPassword = $("#pass2").val();

if (password != confirmPassword)
    {
        $("#message").html("Passwords do not match!").css('color','red');
        $("#message").removeClass('fa fa-thumbs-o-up').addClass('fa fa-thumbs-o-down');
        $("#pass2").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
        $("#pass2").addClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');
      }



    else
    {
        $("#message").html("Passwords match").css('color','green');
        $("#message").removeClass('fa fa-thumbs-o-down').addClass('fa fa-thumbs-o-up');
        $("#pass2").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red').addClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
    }

    if(confirmPassword=='')
    {
      $("#message").html("").css('red');
      $("#pass2").removeClass('w3-border-red');
      $("#pass2").removeClass('w3-border-green');
      $("#pass2").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');
      $("#pass2").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
      $("#message").removeClass('fa fa-thumbs-o-down');
    }

}

$(document).ready(function () {
   $("#pass1, #pass2").keyup(checkPasswordMatch);
});
</script>

<script>
function myFunctions() {
    var pass1,pass2,user1, f1, l1, c1, email1, a1, city1;

    // Get the value of the input field with id="numb"
    pass1 = document.getElementById("pass1").value;
    pass2 = document.getElementById("pass2").value;
    user1 = document.getElementById("user1").value;
    f1 = document.getElementById("f1").value;
    l1 = document.getElementById("l1").value;
    c1 = document.getElementById("c1").value;
    email1 = document.getElementById("email1").value;
    a1 = document.getElementById("a1").value;
    city1 = document.getElementById("city1").value;



    // If x is Not a Number or less than one or greater than 10
    if (pass1==''&&pass2=='') 
    {
        alert("Don't leave the box empty");
        return false;
    } 
    else if (user1=='') 
    {
        alert("Username is blank");
        return false;
    } 
     else if (f1=='') 
    {
        alert("first name is blank");
        return false;
    } 
     else if (l1=='') 
    {
        alert("last name is blank");
        return false;
    } 
    else if (c1=='') 
    {
        alert("Contact number  is blank");
        return false;
    } 
    else if (email1=='') 
    {
        alert("Email Address is blank");
        return false;
    } 
    else if (a1=='') 
    {
        alert("Street is blank");
        return false;
    } 
    else if (city1=='') 
    {
        alert("City is blank");
        return false;
    } 
    else if (pas1s=='') 
    {
        alert("Password is blank");
        return false;
    } 
    else 
    {
        text = "Input OK";
    }
    document.getElementById("demo").innerHTML = text;
}
</script>


</form>
</body>
</html>

