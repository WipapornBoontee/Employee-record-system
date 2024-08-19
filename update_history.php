<?php
include 'condb.php';
session_start();

$id = $_POST['id'];
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

$sql ="UPDATE `history` SET `fname_lname`='$fname_lname',`n_name`='$n_name',`age`='$age',`citizen_id`='$citizen_id',
`gender`='$gender',`status`='$status',`address`='$address',`weight`='$weight',
`height`='$height',`tell`='$tell',`email`='$email',`bank`='$bank',`position`='$position',`date`='$date',`number_bank`='$number_bank' 
WHERE id = '$id'";

$result=mysqli_query($conn,$sql);

if($result){

    echo '<div style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);">';
    echo '<h2>อัพเดทข้อมูลสำเร็จ................................</h2>';
    echo '</div>';
    
    echo '<script>';
    echo 'setTimeout(function(){';
    echo 'window.location.href = "homepage.php";';
    echo '}, 3000);';
    echo '</script>';
    
}else{
    echo '<div style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);">';

    echo '<div>อัพเดทข้อมูลไม่สำเร็จ................................</div>';
    echo '</div>';

    echo "Error:" . $sql . "<br>" . mysqli_error($conn);
    echo '<script>';
    echo 'setTimeout(function(){';
    echo 'window.location.href = "homepage.php";';
    echo '}, 3000);'; // หน่วงเวลา 3 วินาที 
    echo '</script>';

}
mysqli_close($conn)
?>