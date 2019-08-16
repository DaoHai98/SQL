<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>

<?php
/**
 * Nạp kết nối CSDL
 */
include_once "config2.php";

$id = (int) $_GET["id"];
var_dump($id);
$sqlSelect = "SELECT * FROM product WHERE id=".$id;
$result = $connection->query($sqlSelect);
$row = $result->fetch_assoc();
echo "<pre>";
print_r($row);
echo "</pre>";
?>




<?php

if (isset($_POST) && !empty($_POST) && isset($_POST["product_id"])) {

    $errors = array();

    if (!isset($_POST["product_id"]) || empty($_POST["product_id"])) {
        $errors[] = "ID sản phẩm không hợp lệ";
    }

    if (empty($errors)) {
        $id = (int) $_POST["product_id"];
        $sqlDelete = "DELETE FROM product WHERE id=$id";

        echo $sqlDelete;
        $result = $connection->query($sqlDelete);
        if ($result == true) {
            echo "<div class='alert alert-success'>
Xóa sản phẩm thành công ! <a href='test.php'>Trang chủ</a>
</div>";
        } else {
            echo "<div class='alert alert-danger'>
Xóa sản phẩm thất bại !
</div>";
        }
    }else{
        /**
         * Chuyển mảng $errors thành chuỗi = hàm implode()
         */
        $errors_string = implode("<br>", $errors);
        echo "<div class='alert alert-danger'>$errors_string</div>";
    }
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Xóa nhân viên</h1>
            <form name="delete" action="" method="post">

                <input type="hidden" name="product_id" value="<?php echo $row["id"] ?>">

                <div class="form-group">
                    <label>Tên sản phẩm: <?= $row["product_title1"] ?></label>
                </div>
                <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa dữ liệu không')">xóa sản phẩm</button>
            </form>

        </div>
    </div>
</div>

</body>
</html>