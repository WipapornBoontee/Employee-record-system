<?php
include 'condb.php';
session_start();

$id = $_GET['id'];

$sql = "SELECT * FROM `history` WHERE `id` = '$id'";
$re = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($re);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อมูลพนักงาน</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .profile-container {
            margin-top: 5%;
        }

        .profile-img {
            width: 100%;
            height: auto;
            max-width: 120px;
            display: block;
            margin: 0 auto;
            /* จัดรูปภาพให้อยู่ตรงกลาง */
        }

        .profile-info th {
            padding: 5px 0;
        }

        .nav-container {
            margin-top: 70px;
            /* to adjust below the fixed navbar */
        }

        .navbar {
            top: 0;
            z-index: 1000;
        }

        @media (min-width: 576px) {
            body {
                margin-top: 56px;
                /* ปรับ margin-top ของ body เมื่อแสดงบนเว็บคอม */
            }

            .navbar {
                z-index: 1001;
                /* เพิ่มค่า z-index เพื่อให้ Navbar อยู่ด้านบนสุดของหน้าจอ */
            }
        }

        body {
            margin-top: 65px;
            /* ปรับ margin-top ของ body เพื่อให้เนื้อหาไม่ถูกซ้อนทับโดย Navbar */

        }
    </style>
</head>

<body>
<nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a href="homepage.php" class="navbar-brand"><img src="https://cdn-icons-png.flaticon.com/256/16020/16020040.png" alt="Home" width="37px"></a>
            <a href="homepage.php" class="navbar-brand"><img src="https://cdn-icons-png.flaticon.com/256/10337/10337529.png" alt="Admin:" width="25px">
                <?php
                if (isset($_SESSION['adminame'])) {
                    echo $_SESSION['adminame']; // แสดงชื่อของแอดมินที่ล็อกอินเข้ามา
                }
                ?>
            </a>
            <a href="logout.php" class="navbar-brand"><img src="https://cdn-icons-png.flaticon.com/256/10152/10152161.png" alt="" width="37px"></a>
        </div>
    </nav>

    <div class="container profile-container text-center">
        <h3>ข้อมูลพนักงาน</h3>
        <div class="mt-3">
            <img src="<?= $row['img'] ?>" alt="ไม่มีรูปภาพ" class="profile-img img-thumbnail">
        </div>
        <div class="profile-info mt-4">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>รหัสพนักงาน :</th>
                        <td><?= $row['id_mem'] ?></td>
                    </tr>
                    <tr>
                        <th>ชื่อ-สกุล :</th>
                        <td><?= $row['fname_lname'] ?></td>
                    </tr>
                    <tr>
                        <th>รหัสประจำตัวประชาชน :</th>
                        <td><?= $row['citizen_id'] ?></td>
                    </tr>
                    <tr>
                        <th>ตำแหน่ง :</th>
                        <td><?= $row['position'] ?></td>
                    </tr>
                    <tr>
                        <th>ชื่อเล่น :</th>
                        <td><?= $row['n_name'] ?></td>
                    </tr>
                    <tr>
                        <th>อายุ(ปี) :</th>
                        <td><?= $row['age'] ?></td>
                    </tr>
                    <tr>
                        <th>เพศ :</th>
                        <td><?= $row['gender'] ?></td>
                    </tr>
                    <tr>
                        <th>สถานภาพ :</th>
                        <td><?= $row['status'] ?></td>
                    </tr>
                    <tr>
                        <th>วันเดือนปีเกิด :</th>
                        <td><?= $row['date'] ?></td>
                    </tr>
                    <tr>
                        <th>น้ำหนัก(kg) :</th>
                        <td><?= $row['weight'] ?></td>
                    </tr>
                    <tr>
                        <th>ส่วนสูง(cm) :</th>
                        <td><?= $row['height'] ?></td>
                    </tr>
                    <tr>
                        <th>ที่อยู่ :</th>
                        <td><?= $row['address'] ?></td>
                    </tr>
                    <tr>
                        <th>เบอร์ติดต่อ :</th>
                        <td><?= $row['tell'] ?></td>
                    </tr>
                    <tr>
                        <th>Email :</th>
                        <td><?= $row['email'] ?></td>
                    </tr>
                    <tr>
                        <th>ธนาคาร :</th>
                        <td><?= $row['bank'] ?></td>
                    </tr>
                    <tr>
                        <th>เลขที่บัญชี :</th>
                        <td><?= $row['number_bank'] ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="mt-5" style="margin-bottom: 10%;">
            <a href="homepage.php" class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover mx-2">
                <img src="https://cdn-icons-png.flaticon.com/256/2223/2223615.png" alt="" width="20px">
                กลับ
            </a>
            <a href="frm_edit.php?id=<?= $row['id'] ?>" class="btn btn-warning mx-2">
                แก้ไข
                <img src="https://cdn-icons-png.flaticon.com/256/3388/3388943.png" alt="" width="20px">
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>