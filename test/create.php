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

$product_title1="";
$product_desc="";
$created="";
$price="";
$quantity="";
$status="";

if (isset($_POST) && !empty($_POST)) {

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
    if (!isset($_POST["status"]) || empty($_POST["status"])) {
        $errors[] = "Status sai";
    }
    /**
     * $errors rỗng tức là không có lỗi
     */
    if (empty($errors)) {
        $product_title1 = $_POST['product_title1'];
        $product_desc = $_POST['product_desc'];
        $created = $_POST['created'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $status = $_POST['status'];

        $sqlInsert = "INSERT INTO product (product_title1, product_desc, created, price,quantity,status) VALUES ('$product_title1', '$product_desc', $created,$price,$quantity,$status)";
        // Thực hiện câu SQL
        $result = $connection->query($sqlInsert);
        if ($result == true) {
            echo "<div class='alert alert-success'>
Thêm mới sản phẩm thành công ! <a href='test.php'>Trang chủ</a>
</div>";
        } else {
            echo "<div class='alert alert-danger'>
Thêm mới sản phẩm thất bại !
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
            <form name="create" action="" method="post">
                <div class="form-group">
                    <label>Tên sản phẩm:</label>
                    <input type="text" name="product_title1" class="form-control" value="">
                </div>
                <div class="form-group">
                    <label>Mô tả sản phẩm:</label>
                    <textarea  name="product_desc" class="form-control" cols="10" rows="10"> </textarea>
                </div>
                <div class="form-group">
                    <label>Thời gian tạo sản phẩm</label>
                    <input type="text" name="created" class="form-control" value="" >
                </div>
                <div class="form-group">
                    <label>Giá</label>
                    <input type="text" name="price" class="form-control" value="">
                </div>
                <div class="form-group">
                    <label>Số lượng</label>
                    <input type="text" name="quantity" class="form-control" value="">
                </div>
                <div class="form-group">
                    <label>status</label><br>
                    <input type="radio" name="status"  value="true">có<br>
                    <input type="radio" name="status"  value="false">không<br>
                </div>
                <button type="submit" class="btn btn-primary">Tạo sản phẩm</button>
            </form>

        </div>
    </div>
</div>

</body>
</html>