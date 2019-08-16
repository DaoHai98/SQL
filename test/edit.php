<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
<?php
// nạp file kết nối CSDL
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

    if (!isset($_POST["product_title1"]) || empty($_POST["product_title1"])) {
        $errors[] = "Tên sản phẩm không hợp lệ";
    }
    if (!isset($_POST["product_desc"]) || empty($_POST["product_desc"])) {
        $errors[] = "Mô tả sai";
    }
    if (!isset($_POST["created"]) || empty($_POST["created"])) {
        $errors[] = "Thời gian sai";
    }
    if (!isset($_POST["price"]) || empty($_POST["price"])) {
        $errors[] = "Giá sai";
    }
    if (!isset($_POST["quantity"]) || empty($_POST["quantity"])) {
        $errors[] = "Số lượng sai";
    }
    if (!isset($_POST["status"])) {
        $errors[] = "Status sai";
    }
    /**
     * $errors rỗng tức là không có lỗi
     */
    if (empty($errors)) {
        $id = (int) $_POST["product_id"];
        $product_title1 = $_POST['product_title1'];
        $product_desc = $_POST['product_desc'];
        $created = $_POST['created'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $status = $_POST['status'];

        $sqlUpdate = "UPDATE product SET product_title1='$product_title1',product_desc='$product_desc',created='$created',price=$price,quantity=$quantity,status=$status WHERE id=$id" ;
        echo $sqlUpdate;
        // Thực hiện câu SQL
        $result = $connection->query($sqlUpdate);
        if ($result == true) {
            echo "<div class='alert alert-success'>
Sửa sản phẩm thành công ! <a href='test.php'>Trang chủ</a>
</div>";
        } else {
            echo "<div class='alert alert-danger'>
Sửa sản phẩm thất bại !
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
            <h1>Tạo sản phẩm mới</h1>
            <form name="edit" action="" method="post">
                <input type="hidden" name="product_id" value="<?php echo $row["id"] ?>">
                <div class="form-group">
                    <label>Tên sản phẩm:</label>
                    <input type="text" name="product_title1" class="form-control" value="<?= $row["product_title1"]?>">
                </div>
                <div class="form-group">
                    <label>Mô tả sản phẩm:</label>
                    <textarea  name="product_desc" class="form-control" cols="10" rows="10"><?= $row["product_desc"]?> </textarea>
                </div>
                <div class="form-group">
                    <label>Thời gian tạo sản phẩm</label>
                    <input type="text" name="created" class="form-control" value="<?= $row["created"];?>">

                </div>
                <div class="form-group">
                    <label>Giá</label>
                    <input type="text" name="price" class="form-control" value="<?= $row["price"]?>">
                </div>
                <div class="form-group">
                    <label>Số lượng</label>
                    <input type="text" name="quantity" class="form-control" value="<?php echo $row["quantity"]?>">
                </div>
                <div class="form-group">
                    <label>status</label><br>
                    <input type="radio" name="status"  value="true" checked="<?= ($row['status']==1)?'checked':'' ?> ">có <br>
                    <input type="radio" name="status"  value="false" checked="<?= ($row['status']==0)?'checked':'' ?> ">không<br>

                    <p></p>
                </div>
                <button type="submit" class="btn btn-primary">Sửa sản phẩm</button>
            </form>

        </div>
    </div>
</div>

</body>
</html>