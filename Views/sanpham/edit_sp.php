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
                <input type="text" class="form-control" id="productName" placeholder="Nhập tên sản phẩm" name="txtName" value="<?php echo $product['tensanpham'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="productSize" class="form-label">Size</label>
                <select class="form-select" id="productSize" name="txtSize" required>
                <?php
                if ($product['size'] == "S") {
                    echo '
                            <option value="S" selected>S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                            <option value="XXL">XXL</option>';
                } else if ($product['size'] == "M") {
                    echo '
                            <option value="S">S</option>
                            <option value="M" selected>M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                            <option value="XXL">XXL</option>';
                } else if ($product['size'] == "L") {
                    echo '
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L" selected>L</option>
                            <option value="XL">XL</option>
                            <option value="XXL">XXL</option>';
                } else if ($product['size'] == "XL") {
                    echo '
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL" selected>XL</option>
                            <option value="XXL">XXL</option>';
                } else if ($product['size'] == "XXL") {
                    echo '
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                            <option value="XXL" selected>XXL</option>';
                }
                ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="productColor" class="form-label">Color</label>
                <input type="text" class="form-control" id="productColor" placeholder="Nhập màu sản phẩm" name="txtColor" value="<?php echo $product['color'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="productPrice" class="form-label">Giá</label>
                <input type="number" class="form-control" id="productPrice" placeholder="Nhập giá sản phẩm" name="txtGiaBan" value="<?php echo $product['giasanpham'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="productQuantity" class="form-label">Số Lượng</label>
                <input type="number" class="form-control" id="productQuantity" placeholder="Nhập số lượng" name="txtSoLuong" value="<?php echo $product['soluong'] ?>" required> 
            </div>
            <div class="mb-3">
                <label for="productDescription" class="form-label">Mô Tả</label>
                <textarea class="form-control" id="productDescription" rows="4" placeholder="Nhập mô tả sản phẩm" name="txtMieuTa" required><?php echo $product['motasanpham'] ?></textarea>
            </div>
            <div class="mb-3">
                <label for="productLSP" class="form-label">Loại sản phẩm</label>
                <select class="form-select" id="productLSP" name="txtLoai" required>
                    <?php
                        if($loaisanphams!=0){
                        foreach($loaisanphams as $value){
                        if($value['idloaisanpham'] == $product['idloaisanpham']){
                    ?>
                        <option value="<?php echo $value['idloaisanpham'] ?> "selected><?php echo $value['tenloaisanpham'] ?></option>
                    <?php
                        }
                        else{
                    ?>
                        <option value="<?php echo $value['idloaisanpham'] ?>"><?php echo $value['tenloaisanpham'] ?></option>
                    <?php
                        }
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
                        if($value['iddanhmuccon'] == $product['iddanhmuccon']){
                    ?>
                        <option value="<?php echo $value['iddanhmuccon'] ?>" selected><?php echo $value['tendanhmuccon'] ?></option>
                    <?php
                        }
                        else{
                    ?>
                        <option value="<?php echo $value['iddanhmuccon'] ?>"><?php echo $value['tendanhmuccon'] ?></option>
                    <?php
                        }
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="productImage" class="form-label">Hình Ảnh</label>
                <input type="file" class="form-control" id="productImage" name="txtImage" required>
            </div>
            <button type="submit" class="btn btn-primary" name="edit_sp"><i class="fas fa-save"></i> Lưu</button>
            <button type="reset" class="btn btn-secondary"><i class="fas fa-undo"></i> Làm Mới</button>
        </form>
    </div>
</body>
</html>

