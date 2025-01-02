<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="content">
        <h1 class="mb-4">Thêm Danh Mục</h1>
        <form method="POST">
            <div class="mb-3">
                <label for="productName" class="form-label">Tên Danh Mục Con</label>
                <input type="text" class="form-control" id="productName" placeholder="Nhập tên danh mục con" name="txtName" required>
            </div>
            <div class="mb-3">
                <label for="productLSP" class="form-label">Tên Danh Mục Cha</label>
                <select class="form-select" id="productLSP" name="txtLoai" required>
                    <?php
                        if($loaisanphams!=0){
                        foreach($loaisanphams as $value){
                    ?>
                    <option value="<?php echo $value['idloaisanpham'] ?>"><?php echo $value['tenloaisanpham'] ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="add_dm"><i class="fas fa-save"></i> Lưu</button>
            <button type="reset" class="btn btn-secondary"><i class="fas fa-undo"></i> Làm Mới</button>
        </form>
    </div>
</body>
</html>

