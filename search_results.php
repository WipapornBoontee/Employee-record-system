<?php
include 'condb.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchTerm = $_POST['searchTerm'];
    $searchTerm = mysqli_real_escape_string($conn, $searchTerm);

    $sql = "SELECT * FROM history WHERE fname_lname LIKE '%$searchTerm%' OR id LIKE '%$searchTerm%' OR position LIKE '%$searchTerm%'";
    $result = mysqli_query($conn, $sql);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>การค้นหา</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
       <style>
        body {
            padding-top: 56px;
        }

        img.employee-img {
            width: 100%;
            height: auto;
            max-width: 100px;
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

    <div class="container" style="margin-top: 100px;">
        <h2>Search Results</h2>
        <?php if (mysqli_num_rows($result) > 0) : ?>
            <table class="table table-bordered mt-4">
                <thead>
                    <tr>
                        <th>รูปภาพ</th>
                        <th>ข้อมูล</th>
                        <th>แก้ไข</th>
                        <th>ลบ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                        <td style="text-align: center;">
                            <img src="<?= $row['img'] ?>" alt="ไม่มีรูปภาพ" class="employee-img">
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
                        <td>
                        <a href="frm_edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm d-flex align-items-center" >แก้ไข</a>
                        </td>
                        <td>
                        <a href="delete_mem.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm d-flex align-items-center">ลบ</a>
                        </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p class="mt-4">No results found for <strong><?= htmlspecialchars($searchTerm) ?></strong></p>
        <?php endif;
        ?>

    </div>
    <a href="homepage.php" class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover d-block text-center mx-auto my-2">
            <img src="https://cdn-icons-png.flaticon.com/256/2223/2223615.png" alt="" width="20px">
            Back
        </a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
