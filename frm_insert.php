<?php
include 'condb.php';
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มข้อมูลพนักงาน</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
        body {
            padding-top: 70px;
            /* display: flex; */
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 80%;
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
        form {
            display: flex;
            flex-direction: column;
        }
         .btn-center {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        button {
            margin-bottom: 20px;
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
    <div class="container">

        <form action="insert_history.php" method="post" enctype="multipart/form-data" >
            <div class="col-10 mx-auto">
                <label for="formFile" class="form-label">เลือกรูปภาพ <span style="color: #990101;">**</span></label>
                <input class="form-control" type="file" id="formFile" name="img">
                <label for="label" class="form-label">รหัสพนักงาน <span style="color: #990101;">**</span></label>
                <input type="text" class="form-control" name="id_mem" required>
                <label for="label" class="form-label">ชื่อ-สกุล <span style="color: #990101;">**</span></label>
                <input type="text" class="form-control" name="fname_lname" required>
                <label for="label" class="form-label">ตำแหน่ง <span style="color: #990101;">**</span></label>
                <input type="text" class="form-control" name="position" required>
                <label for="label" class="form-label">รหัสประจำตัวประชาชน <span style="color: #990101;">**</span></label>
                <input type="text" class="form-control" name="citizen_id" required>

                <div class="row g-3">
                    <div class="col-6">
                        <label for="label" class="form-label">ชื่อเล่น</label>
                        <input type="text" class="form-control" name="n_name" required>
                    </div>
                    <div class="col-6">
                        <label for="label" class="form-label">เพศ</label>
                        <select type="radio" class="form-control" name="gender" required>
                            <option selected>ระบุเพศ</option>
                            <option value="ชาย">ชาย</option>
                            <option value="หญิง">หญิง</option>
                            <option value="เพศที่ 3">เพศที่ 3</option>
                            <option value="ไม่แน่ชัด">ไม่แน่ชัด</option>
                        </select>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-6">
                        <label for="label" class="form-label">อายุ(ปี)</label>
                        <input type="text" class="form-control" name="age" required>
                    </div>
                    <div class="col-6">
                        <label for="label" class="form-label">สถานภาพ</label>
                        <select type="radio" class="form-control" name="status" required>
                            <option selected>ระบุสถานภาพ</option>
                            <option value="โสด">โสด</option>
                            <option value="สมรส">สมรส</option>
                            <option value="อย่าร้าง">หย่าร้าง</option>
                            <option value="หม้าย">หม้าย</option>
                        </select>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-6">
                        <label for="label" class="form-label">น้ำหนัก(kg)</label>
                        <input type="text" class="form-control" name="weight" required>
                    </div>
                    <div class="col-6">
                        <label for="label" class="form-label">ส่วนสูง(cm)</label>
                        <input type="text" class="form-control" name="height" required>
                    </div>
                </div>
                <label for="label" class="form-label">วันเดือนปีเกิด</label>
                <input type="date" class="form-control" name="date" required>
                <label for="label">ที่อยู่</label>
                <textarea class="form-control" style="height: 100px" name="address" required></textarea>
                <label for="label" class="form-lable">เบอร์ติดต่อ</label>
                <input type="text" class="form-control" name="tell" required>
                <label for="label" class="form-lable">Email</label>
                <input type="email" class="form-control" name="email">
                <label for="label" class="form-label">ธนาคาร</label>
                <select type="radio" class="form-control" name="bank" required>
                    <option selected> * </option>
                    <option value="BBL">ธนาคารกรุงเทพ จำกัด(มหาชน):BBL</option>
                    <option value="BBC">ธนาคารกรุงเทพพาณิชย์การ:BBC</option>
                    <option value="KTB">ธนาคารกรุงไทย(มหาชน):KTB</option>
                    <option value="BAY">ธนาคารกรุงศรีอยุธยา(มหาชน):BAY</option>
                    <option value="KBANK">ธนาคารกสิกรไทย(มหาชน):KBANK</option>
                    <option value="CITI">ธนาคารซิตี้แบงค์:CITI</option>
                    <option value="TMB">ธนาคารทหารไทย(มหาชน):TMB</option>
                    <option value="SCB">ธนาคารไทยพาณิชย์(มหาชน):SCB</option>
                    <option value="NBANK">ธนาคารธนชาติ:NBANK</option>
                    <option value="SCIB">ธนาคารนครหลวงไทย:SCIB</option>
                    <option value="GSB">ธนาคารออมสิน:GSB</option>
                    <option value="GHB">ธนาคารอาคารสงเคราะห์:GHB</option>
                </select>
                <label for="label" class="form-lable">เลขบัญชี</label>
                <input type="text" class="form-control" name="number_bank" required>
                <div class="btn-center">
                <button type="submit" class="btn btn-outline-success me-3">บันทึก <img src="https://cdn-icons-png.flaticon.com/256/5469/5469798.png" alt="" width="25px"></button>

                    <a href="javascript:history.go(-1);"><button type="button" class="btn btn-secondary">Cancel</button></a>
                </div>
            </div>
        </form>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>