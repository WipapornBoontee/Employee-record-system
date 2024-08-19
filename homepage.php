<?php
include 'condb.php';
session_start();


$sql = "SELECT * FROM `history`";

$re = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าแรก</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            padding-top: 56px;
        }

        img.employee-img {
            width: 100%;
            height: auto;
            max-width: 120px;
        }


        /* Responsive table font size adjustment */
        @media screen and (max-width: 768px) {
            table {
                font-size: 14px;
            }
        }

        @media screen and (max-width: 576px) {
            table {
                font-size: 12px;
            }
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
    <div class="container">
        <form class="d-flex mt-3 mb-3" action="search_results.php" method="post">
            <input class="form-control me-2" type="search" name="searchTerm" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit"><img src="https://cdn-icons-png.flaticon.com/256/8813/8813750.png" alt="" width="30px"></button>
        </form>

        <p><a href="frm_insert.php" class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">+ เพิ่มข้อมูลพนักงาน</a></p>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>รูปภาพ</th>
                        <th>ข้อมูลพนักงาน</th>
                        <th>แก้ไข</th>
                        <th>ลบ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($re) {
                        while ($row = mysqli_fetch_array($re)) {
                    ?>
                            <tr>
                                <td style="text-align: center; vertical-align: middle;">
                                    <div style="display: inline-block;">
                                        <img src="<?= $row['img'] ?>" alt="ไม่มีรูปภาพ" class="employee-img">
                                    </div>
                                </td>
                                <td style="vertical-align: top; padding: 2%;">
                                    <a href="show_more.php?id=<?= $row['id'] ?>" class="link-dark link-underline link-underline-opacity-0">
                                        <div><strong>รหัส :</strong> <?= $row['id_mem'] ?></div>
                                        <div><strong>ชื่อ :</strong> <?= $row['fname_lname'] ?></div>
                                        <div><strong>เบอร์ :</strong> <?= $row['tell'] ?></div>
                                        <div><strong>อีเมล :</strong> <?= $row['email'] ?></div>
                                        <div><strong>ตำแหน่ง :</strong> <?= $row['position'] ?></div>
                                    </a>
                                </td>
                                <style>
                                    td.text-center {
                                        justify-content: center;
                                        /* จัดเรียงตรงกลางแนวนอน */
                                        align-items: center;
                                        /* จัดเรียงตรงกลางแนวตั้ง */
                                        height: 100%;
                                        /* ตั้งความสูงให้เท่ากับความสูงของแถว */
                                    }

                                    /* ปรับขนาดของปุ่มให้เหมือนกัน */
                                    .btn-sm {
                                        width: 50px;
                                        /* กำหนดความกว้าง */
                                        height: 50px;
                                        /* กำหนดความสูง */
                                        display: flex;
                                        justify-content: center;
                                        /* จัดเรียงตรงกลางแนวนอนของข้อความ */
                                        align-items: center;
                                        /* จัดเรียงตรงกลางแนวตั้งของข้อความ */
                                    }
                                </style>
                                <td class="text-center">
                                    <a href="frm_edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">แก้ไข</a>
                                </td>
                                <td class="text-center">
                                    <a href="javascript:void(0);" onclick="confirmDelete(<?= $row['id'] ?>);" class="btn btn-outline-danger btn-sm">
                                        <img src="https://cdn-icons-png.flaticon.com/256/9790/9790368.png" alt="" width="28px">
                                    </a>
                                    <script>
                                        function confirmDelete(id) {
                                            if (confirm("คุณแน่ใจหรือไม่ว่าต้องการรายการนี้?")) {
                                                window.location.href = "delete_mem.php?id=" + id;
                                            }
                                        }
                                    </script>
                                </td>

                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>