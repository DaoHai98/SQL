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
$sqlSelect = "SELECT * FROM product";
/**
 * Thực hiện câu truy vấn và trả data cho biến $result
 */
$result = $connection->query($sqlSelect);
?>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Liệt kê danh sách sản phẩm</h1>
            <h1>
                <a href="create.php" class="btn btn-info">Thêm mới sản phẩm</a>
            </h1>
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>product_title1</th>
                    <th>product_desc</th>
                    <th>created</th>
                    <th>price</th>
                    <th>quantity</th>
                    <th>status</th>
                </tr>
                </thead>
                <tbody>
                <?php
                /**
                 * Nếu $result->num_rows > 0 tức là có dữ liệu trong bảng
                 * ngược lại là bảng đang rỗng
                 */

                if ($result->num_rows > 0) {
                    /*
                     *
                     * Sử dụng $result->fetch_assoc() để lấy về từng dòng bản ghi trong bảng
                     * và trả về cho biến $row
                      */
                    while($row = $result->fetch_assoc()) {
                        echo"<pre>";

                        ?>

                        <tr>
                            <td><?php echo $row["id"] ?></td>
                            <td><?php echo $row["product_title1"] ?></td>
                            <td><?php echo $row["product_desc"] ?></td>
                            <td><?php echo $row["created"] ?></td>
                            <td><?php echo $row["price"] ?></td>
                            <td><?php echo $row["quantity"] ?></td>
                            <td><?php echo $row["status"] ?></td>
                            <td>
                                <p><a href="edit.php?id=<?php echo $row["id"] ?>" class="btn btn-success">Sửa sản phẩm</a> </p>
                                <p><a href="delete.php?id=<?php echo $row["id"] ?>" class="btn btn-danger">Xóa sản phẩm</a> </p>
                            </td>
                        </tr>
                        <?php
                    }
                } else {
                    echo "Không tồn tại nhân viên nào";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>