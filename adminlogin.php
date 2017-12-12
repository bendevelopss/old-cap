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



$find=mysql_query("select * from sample where user='".$user."'");
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

if(isset($_POST['login']) && $user==$user2 && $pass==$pass2 && $pos==$pos2)
{

$_SESSION['user']=$user;
$_SESSION['pass']=$pass;
$_SESSION['pos']=$pos;

header('Location: main.php');
}

if(isset($_POST['btnSave']))
                {
                    $user = $_POST['user1'];
                    $pass = $_POST['pass1'];
                  
                   mysql_query("insert into sample (user,  pass) values('".$user."','".$pass."')");
                    echo "<script type='text/javascript'>alert('Your account has been created, Please wait for you confirmation!')</script>";
 
                                       
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
              <label>Firstname:</label>
              <input class="form-control" name="fname1" id="fname1" value=""/>
              <label>Lastname:</label>
              <input class="form-control" name="lname1" id="lname1" value=""/>
              <label>Address:</label>
              <input class="form-control" name="add1" id="add1" value=""/>
              <label>Contact No:</label>
              <input class="form-control" name="cno1" id="cno1" value=""/>
              <label>Email Address:</label>
              <input type="email"  class="form-control" name="email1" id="email1" value=""/>
              <label>Password:</label>
              <input type="password" class="form-control" name="pass1" id="pass1" value=""/>
              </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="btnSave" onClick="return confirm('Are you sure?');" >Register</button>
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
    document.getElementById("demo").innerHTML = text;
}
</script>
<!--javascript-->
</form>
</body>
</html>

