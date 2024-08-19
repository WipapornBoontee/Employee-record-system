<?php
include 'condb.php';
session_start();

$id = $_GET['id'];

$sql = "SELECT * FROM `history` where `id` = '$id'";
$re = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($re);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลพนักงาน</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
    body {
            margin-top: 70px;
            /* ปรับ margin-top ของ body เพื่อให้เนื้อหาไม่ถูกซ้อนทับโดย Navbar */
            margin-bottom: 20px;

        }

    img.employee-img {
        width: 100%;
        height: auto;
        max-width: 200px;
        display: block;
        margin: 0 auto;
        /* จัดรูปภาพให้อยู่ตรงกลาง */
    }

    .btn-center {
        display: flex;
        justify-content: center;
        margin-top: 20px;
        /* ปรับระยะห่างของปุ่ม Save กับปุ่ม Cancel */
    }

    @media (min-width: 576px) {
        body {
            margin-top: 100px;
            /* ปรับ margin-top ของ body เมื่อแสดงบนเว็บคอม */
        }

        .navbar {
            z-index: 1001;
            /* เพิ่มค่า z-index เพื่อให้ Navbar อยู่ด้านบนสุดของหน้าจอ */
        }
    }

    .navbar {
        /* position: sticky; */
        top: 0;
        z-index: 1000;
    }
</style>

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

    <form action="update_history.php" method="post" enctype="multipart/form-data">
        <div class="container">

            <div class="col-10 mx-auto">
                <img src="<?= $row['img'] ?>" alt="ไม่มีรูปภาพ" class="employee-img rounded mx-auto d-block">

                <label for="label" class="form-label">รหัสพนักงาน</label>
                <input type="hidden" class="form-control" name="id" value="<?= $row['id'] ?>">
                <label for=""><?= $row['id_mem'] ?></label>
                <br>
                <label for="label" class="form-label">ชื่อ-สกุล <span style="color: #990101;">**</span></label>
                <input type="text" class="form-control" name="fname_lname" value="<?= $row['fname_lname'] ?>">

                <label for="label" class="form-label">ตำแหน่ง <span style="color: #990101;">**</span></label>
                <input type="text" class="form-control" name="position" value="<?= $row['position'] ?>">
                <label for="label" class="form-label">รหัสประจำตัวประชาชน <span style="color: #990101;">**</span></label>
                <input type="text" class="form-control" name="citizen_id" value="<?= $row['citizen_id'] ?>">

                <div class="row g-3">
                    <div class="col-6">
                        <label for="label" class="form-label">ชื่อเล่น</label>
                        <input type="text" class="form-control" name="n_name" value="<?= $row['n_name'] ?>">
                    </div>
                    <div class="col-6">
                        <label for="label" class="form-label">เพศ</label>
                        <select type="radio" class="form-control" name="gender" value="<?= $row['gender'] ?>">
                            <option selected>ระบุเพศ</option>
                            <option value="ชาย" <?php if ($row['gender'] == 'ชาย') echo ' selected="selected"'; ?>>ชาย</option>
                            <option value="หญิง" <?php if ($row['gender'] == 'หญิง') echo ' selected="selected"'; ?>>หญิง</option>
                            <option value="เพศที่ 3" <?php if ($row['gender'] == 'เพศที่ 3') echo ' selected="selected"'; ?>>เพศที่ 3</option>
                            <option value="ไม่แน่ชัด" <?php if ($row['gender'] == 'ไม่แน่ชัด') echo ' selected="selected"'; ?>>ไม่แน่ชัด</option>
                        </select>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-6">
                        <label for="label" class="form-label">อายุ(ปี)</label>
                        <input type="text" class="form-control" name="age" value="<?= $row['age'] ?>">
                    </div>
                    <div class="col-6">
                        <label for="label" class="form-label">สถานภาพ</label>
                        <select type="radio" class="form-control" name="status">
                            <option selected>ระบุสถานภาพ</option>
                            <option value="โสด" <?php if ($row['status'] == 'โสด') echo ' selected="selected"'; ?>>โสด</option>
                            <option value="สมรส" <?php if ($row['status'] == 'สมรส') echo ' selected="selected"'; ?>>สมรส</option>
                            <option value="อย่าร้าง" <?php if ($row['status'] == 'อย่าร้าง') echo ' selected="selected"'; ?>>หย่าร้าง</option>
                            <option value="หม้าย" <?php if ($row['status'] == 'หม้าย') echo ' selected="selected"'; ?>>หม้าย</option>
                        </select>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-6">
                        <label for="label" class="form-label">น้ำหนัก(kg)</label>
                        <input type="text" class="form-control" name="weight" value="<?= $row['weight'] ?>">
                    </div>
                    <div class="col-6">
                        <label for="label" class="form-label">ส่วนสูง(cm)</label>
                        <input type="text" class="form-control" name="height" value="<?= $row['height'] ?>">
                    </div>
                </div>
                <label for="label" class="form-label">วันเดือนปีเกิด</label>
                <input type="date" class="form-control" name="date" value="<?= $row['date'] ?>">
                <label for="label">ที่อยู่</label>
                <textarea class="form-control" style="height: 100px" name="address"><?= $row['address'] ?></textarea>
                <label for="label" class="form-lable">เบอร์ติดต่อ</label>
                <input type="number" class="form-control" name="tell" value="<?= $row['tell'] ?>">
                <label for="label" class="form-lable">Email</label>
                <input type="email" class="form-control" name="email" value="<?= $row['email'] ?>">
                <label for="label" class="form-label">ธนาคาร</label>
                <select type="radio" class="form-control" name="bank">
                    <option selected>เลือกธนาคาร </option>
                    <option value="BBL" <?php if ($row['bank'] == 'BBL') echo ' selected="selected"'; ?>>ธนาคารกรุงเทพ จำกัด(มหาชน):BBL</option>
                    <option value="BBC" <?php if ($row['bank'] == 'BBC') echo ' selected="selected"'; ?>>ธนาคารกรุงเทพพาณิชย์การ:BBC</option>
                    <option value="KTB" <?php if ($row['bank'] == 'KTB') echo ' selected="selected"'; ?>>ธนาคารกรุงไทย(มหาชน):KTB</option>
                    <option value="BAY" <?php if ($row['bank'] == 'BAY') echo ' selected="selected"'; ?>>ธนาคารกรุงศรีอยุธยา(มหาชน):BAY</option>
                    <option value="KBANK" <?php if ($row['bank'] == 'KBANK') echo ' selected="selected"'; ?>>ธนาคารกสิกรไทย(มหาชน):KBANK</option>
                    <option value="CITI" <?php if ($row['bank'] == 'CITI') echo ' selected="selected"'; ?>>ธนาคารซิตี้แบงค์:CITI</option>
                    <option value="TMB" <?php if ($row['bank'] == 'TMB') echo ' selected="selected"'; ?>>ธนาคารทหารไทย(มหาชน):TMB</option>
                    <option value="SCB" <?php if ($row['bank'] == 'SCB') echo ' selected="selected"'; ?>>ธนาคารไทยพาณิชย์(มหาชน):SCB</option>
                    <option value="NBANK" <?php if ($row['bank'] == 'NBANK') echo ' selected="selected"'; ?>>ธนาคารธนชาติ:NBANK</option>
                    <option value="SCIB" <?php if ($row['bank'] == 'SCIB') echo ' selected="selected"'; ?>>ธนาคารนครหลวงไทย:SCIB</option>
                    <option value="GSB" <?php if ($row['bank'] == 'GSB') echo ' selected="selected"'; ?>>ธนาคารออมสิน:GSB</option>
                    <option value="GHB" <?php if ($row['bank'] == 'GHB') echo ' selected="selected"'; ?>>ธนาคารอาคารสงเคราะห์:GHB</option>
                </select>
                <label for="label" class="form-lable">เลขบัญชี</label>
                <input type="text" class="form-control" name="number_bank" value="<?= $row['number_bank'] ?>">
                <div class="btn-center">
                    <button type="submit" class="btn btn-outline-success me-3">บันทึก <img src="https://cdn-icons-png.flaticon.com/256/5469/5469798.png" alt="" width="25px"></button>
                    <a href="javascript:history.go(-1);"><button type="button" class="btn btn-secondary">ยกเลิก</button></a>
                </div>
            </div>
        </div>

    </form>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>