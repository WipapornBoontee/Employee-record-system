<?php
include 'condb.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        $admin = mysqli_fetch_array($result);

        if (mysqli_num_rows($result) == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['adminame'] = $admin['adminame'];
            if ($admin['role'] == 'admin') {
                echo '<div style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;">';
                
                echo '<h2 style="margin-top: 20px;">เข้าสู่ระบบสำเร็จ...</h2>';
                echo '<p style="margin-top: 20px;">กำลังโหลดหน้าหลัก...</p>';
                echo '</div>';

                echo '<script>';
                echo 'setTimeout(function(){';
                echo 'window.location.href = "homepage.php";';
                echo '}, 3000);';
                echo '</script>';

                exit();
            } else {
                echo '<div style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;">';
                
                echo '<h2 style="margin-top: 20px;">ไม่สามารถเข้าสู่ระบบได้...</h2>';
                echo '<p style="margin-top: 20px;">โปรดลองอีกครั้ง...</p>';

                echo '</div>';

                echo '<script>';
                echo 'setTimeout(function(){';
                echo 'window.location.href = "formlogin.php";';
                echo '}, 3000);';
                echo '</script>';
                exit();
            }
        } else {
            echo '<div style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;">';
                
            echo '<h2 style="margin-top: 20px;">ไม่สามารถเข้าสู่ระบบได้...</h2>';
                echo '<p style="margin-top: 20px;">โปรดลองอีกครั้ง...</p>';
            echo '</div>';

            echo '<script>';
            echo 'setTimeout(function(){';
            echo 'window.location.href = "formlogin.php";';
            echo '}, 3000);';
            echo '</script>';
            exit();
        }
    }
}
?>