<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="content">
        <h1 class="mb-4">Sửa Sản Phẩm</h1>
        <form method="POST">
             <div class="mb-3">
                <label for="productName" class="form-label">Tên Cửa Hàng</label>
                <input type="text" class="form-control" id="productName" placeholder="Nhập tên cửa hàng" name="txtName" value="<?php echo $product['ten'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="productColor" class="form-label">Địa Chỉ</label>
                <input type="text" class="form-control" id="productColor" placeholder="Nhập địa chỉ" name="txtdiachi" value="<?php echo $product['dia_chi'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="productPrice" class="form-label">Thành Phố</label>
                <input type="text" class="form-control" id="productPrice" placeholder="Nhập thành phố" name="txtthanhpho" value="<?php echo $product['thanh_pho'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="productImage" class="form-label">Hình Ảnh</label>
                <input type="file" class="form-control" id="productImage" name="txtImage" value="<?php echo $product['hinhanh'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="productQuantity" class="form-label">Số Điện Thoại</label>
                <input type="number" class="form-control" id="productQuantity" placeholder="Nhập số điện thoại" name="txtsdt" value="<?php echo $product['sdt'] ?>" required>
            </div>
            <button type="submit" class="btn btn-primary" name="edit_ch"><i class="fas fa-save"></i> Lưu</button>
            <button type="reset" class="btn btn-secondary"><i class="fas fa-undo"></i> Làm Mới</button>
        </form>
    </div>
</body>
</html>

