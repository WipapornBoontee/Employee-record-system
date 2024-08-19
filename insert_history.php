<?php
include 'condb.php';

$id_mem = $_POST['id_mem'];
$fname_lname = $_POST['fname_lname'];
$n_name = $_POST['n_name'];
$date = $_POST['date'];
$age = $_POST['age'];
$citizen_id = $_POST['citizen_id'];
$gender = $_POST['gender'];
$status = $_POST['status'];
$address = $_POST['address'];
$weight = $_POST['weight'];
$height = $_POST['height'];
$tell = $_POST['tell'];
$email = $_POST['email'];
$bank = $_POST['bank'];
$position = $_POST['position'];
$number_bank = $_POST['number_bank'];
// $img = $_POST['img'];
$img = "uploads/";
$target_file = $img . ($_FILES["img"]["name"]);
$filetype = pathinfo($target_file , PATHINFO_EXTENSION);

$sql ="INSERT INTO `history`(`id_mem`, `fname_lname`, `n_name`, `age`, `citizen_id`, `gender`, `status`, `address`, `weight`, `height`, `tell`, `email`, `bank`, `position`, `img`, `date`, `number_bank`) 
VALUES ('$id_mem','$fname_lname','$n_name','$age','$citizen_id','$gender','$status','$address','$weight','$height','$tell','$email','$bank','$position','$target_file','$date','$number_bank')";

$result = mysqli_query($conn,$sql);
if($result){
    move_uploaded_file($_FILES['img']['tmp_name'], $target_file);
    echo "<script> alert('บันทึกข้อมูลเรียบร้อย'); </script>";
    echo "<script> window.location ='homepage.php'; </script>";
}else{
    echo "error";
    echo "Error:" . $sql . "<br>" . mysqli_error($conn);
    echo "<script> alert('บันทึกข้อมูลไม่ได้'); </script>";
}
mysqli_close($conn)
?>