<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="content">
        <h1 class="mb-4">Thêm Sản Phẩm</h1>
        <form method="POST">
            <div class="mb-3">
                <label for="productName" class="form-label">Tên Sản Phẩm</label>
                <input type="text" class="form-control" id="productName" placeholder="Nhập tên sản phẩm" name="txtName" required>
            </div>
            <div class="mb-3">
                <label for="productSize" class="form-label">Size</label>
                <select class="form-select" id="productSize" name="txtSize" required>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                    <option value="XXL">XXL</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="productColor" class="form-label">Color</label>
                <input type="text" class="form-control" id="productColor" placeholder="Nhập màu sản phẩm" name="txtColor" required>
            </div>
            <div class="mb-3">
                <label for="productPrice" class="form-label">Giá</label>
                <input type="number" class="form-control" id="productPrice" placeholder="Nhập giá sản phẩm" name="txtGiaBan" required>
            </div>
            <div class="mb-3">
                <label for="productQuantity" class="form-label">Số Lượng</label>
                <input type="number" class="form-control" id="productQuantity" placeholder="Nhập số lượng" name="txtSoLuong" required>
            </div>
            <div class="mb-3">
                <label for="productDescription" class="form-label">Mô Tả</label>
                <textarea class="form-control" id="productDescription" rows="4" placeholder="Nhập mô tả sản phẩm" name="txtMieuTa" required></textarea>
            </div>
            <div class="mb-3">
                <label for="productLSP" class="form-label">Loại sản phẩm</label>
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
            <div class="mb-3">
                <label for="productCTLSP" class="form-label">Chi tiết loại sản phẩm</label>
                <select class="form-select" id="productCTLSP" name="txtLoaiCT" required>
                    <?php
                        if($danhmucs!=0){
                        foreach($danhmucs as $value){
                    ?>
                    <option value="<?php echo $value['iddanhmuccon'] ?>"><?php echo $value['tendanhmuccon'] ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="productImage" class="form-label">Hình Ảnh</label>
                <input type="file" class="form-control" id="productImage" name="txtImage" required>
            </div>
            <button type="submit" class="btn btn-primary" name="add_sp"><i class="fas fa-save"></i> Lưu</button>
            <button type="reset" class="btn btn-secondary"><i class="fas fa-undo"></i> Làm Mới</button>
        </form>
    </div>
</body>
</html>

