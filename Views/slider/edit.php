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
                <label for="productImage" class="form-label">Hình Ảnh</label>
                <input type="file" class="form-control" id="productImage" name="txtImage" value="<?php echo $product['image'] ?>" required>
            </div>
            
            <button type="submit" class="btn btn-primary" name="edit_sld"><i class="fas fa-save"></i> Lưu</button>
            <button type="reset" class="btn btn-secondary"><i class="fas fa-undo"></i> Làm Mới</button>
        </form>
    </div>
</body>
</html>

