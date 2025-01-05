<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Content -->
    <div class="content">
        <h1 class="mb-4">Danh Sách Slider</h1>
        <a href="index.php?controller=slider&action=add"><button class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Thêm slider</button></a>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>STT</th>
                    <th>hình ảnh</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $stt = 1;
                    if($products!=0){
                    foreach($products as $value){
                ?>
                <tr>
                    <td><?php echo $stt; ?></td>

                    <td><img width=160px src="Views/img/<?php echo $value['image']?>" alt=""></td>
                  
                    <td>
                        <a href="index.php?controller=slider&action=edit&id=<?php echo $value['id']; ?>"><button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Sửa</button></a>   
                    </td>
                    <td>
                    <a onclick="return confirm('Bạn có muốn xóa sản phẩm không?');" href="index.php?controller=slider&action=delete&id=<?php echo $value['id']; ?>"><button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Xóa</button></a>
                    </td>
                </tr>
                <?php
                    $stt++;
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>