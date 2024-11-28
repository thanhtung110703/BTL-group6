<?php
include "class/cartegory_class.php";
?>
<?php
$cartegory = new cartegory;
$show_cartegory = $cartegory ->show_cartegory();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Trang Bán Hàng</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="image/logo1.png">
        </div>
        <div class="menu">
    
            <?php
                    if($show_cartegory){$i=0;
                        while($result = $show_cartegory->fetch_assoc()){ $i++
                    ?>
                        <!-- Thêm class "category-item" để định danh -->
                        <li class="category-item"><?php echo $result['cartegory_name']; ?></li>
        
                    <?php
                    }
                }
                    ?>
        </div>
        <div class="orther">
            <li><input placeholder="Tìm kiếm" type="text"><i class="fa fa-search"></i></li>
            <li><i class="fa fa-paw"></i></li>
            <li><i class="fa fa-user"></i></li>
            <li><i class="fa fa-shopping-bag"></i></li>
        </div>
    </header>
    <section id="back-ground">
        <div class="aspect-ratio-169">
            <img src="image/image20.jpg">
        </div>
    </section>
</body>
<script>
    const header = document.querySelector("header");
    window.addEventListener("scroll", function() {
        let x = window.pageYOffset; /* Tính toạ độ trục Y */
        if (x > 0) {
            header.classList.add("sticky");
        } else {
            header.classList.remove("sticky");
        }
    });
    const imgPosition = document.querySelectorAll(".aspect-ratio-169 img");
</script>
</html>
