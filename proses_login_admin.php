<?php
if($_POST){
$email=$_POST['email'];
$password=$_POST['password'];
if(empty($email)){
echo "<script>alert('email tidak boleh kosong');location.href='login_admin.php';</script>";
} else if(empty($password)){
echo "<script>alert('Password tidak boleh kosong');location.href='login_admin.php';</script>";
} else {
include "koneksi_admin.php";
$qry_login_admin=mysqli_query($conn,"select * from admin where
email = '".$email."' and password = '".($password)."'");
if(mysqli_num_rows($qry_login_admin)>0) {
$dt_login=mysqli_fetch_array($qry_login_admin);
session_start();
$_SESSION['id_admin']=$dt_login['id_admin'];
$_SESSION['nama_admin']=$dt_login['nama_admin'];
$_SESSION['role']=$dt_login['role'];
$_SESSION['status_login_admin']=true;
header("location: home_admin.php");
} else {
echo "<script>alert('email dan Password tidak benar');location.href='login_admin.php';</script>";
            }
        }
   }
?>