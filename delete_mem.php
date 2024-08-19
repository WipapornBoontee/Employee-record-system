<?php
    require_once('condb.php');
    session_start();
    $id=$_GET['id'];
    //  $user=$_SESSION["user"];
     $s="DELETE FROM `history` WHERE `id` = '$id'";
     $r=mysqli_query($conn,$s);
    if($r){
        echo "<script>alert('ลบข้อมูลเรียบร้อย');</script>";
        echo "<script>window.location='homepage.php';</script>";
    // echo "สำเร็จ";
    }else{
        echo "<script>alert('ไม่สามารถลบข้อมูลได้');</script>";
    // echo "สำเร็จ";

    }
    mysqli_close($conn);
?>