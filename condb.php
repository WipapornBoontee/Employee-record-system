<?php

$conn = mysqli_connect('localhost','root','','employees');

if($conn){
    // echo "Connected";
}else{
    echo "Not Connected";
}

?>