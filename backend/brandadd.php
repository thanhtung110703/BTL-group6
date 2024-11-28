<?php
include "header.php";
include "slider.php";
include "class/brand_class.php";
?>
<?php
$brand = new brand();//gọi hàm brand vào các file bên dưới
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cartegory_id = $_POST['cartegory_id'];// brandname và carid lấy từ tên input vào 
    $brand_name = $_POST['brand_name'];
    $insert_brand = $brand->insert_brand($cartegory_id,$brand_name);
}
?>
<style>
    select {
        height: 30px;
        width: 200px;
    }
</style>

<div class="admin-content-right">
    <div class="admin-content-right-cartegory_add">
        <h1>Thêm loại sản phẩm</h1> <br>
        <form action="" method="POST">
            <select name="cartegory_id" id="">
                <option value="#">--Chọn danh mục</option><!-- showdanh mục có các loại sản phẩm trong danh mục đó -->
                <?php 
                $show_cartegory = $brand -> show_cartegory();
                if($show_cartegory) {while($result = $show_cartegory ->fetch_assoc()){
                ?>

                <option value="<?php echo $result['cartegory_id'] ?>"><?php echo $result['cartegory_name'] ?></option>
                <?php
                 }}
                ?>
            </select> <br>
            <input required name="brand_name" type="text" placeholder="Nhập tên loại sản phẩm">
            <button type="submit">Thêm</button>
        </form>
    </div>
</div>
</section>
</body>
</html>