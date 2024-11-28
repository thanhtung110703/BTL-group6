// Lấy tất cả các phần tử có class "category-left-li"
const itemSliderBar = document.querySelectorAll(".category-left-li");

itemSliderBar.forEach(function (menu) {
    menu.addEventListener("click", function (event) {
        // Ngăn hành động mặc định (quay về đầu trang) khi nhấp vào thẻ <a>
        event.preventDefault();

        // Kiểm tra nếu menu đã có class "block"
        if (menu.classList.contains("block")) {
            menu.classList.remove("block"); // Ẩn nếu đang hiển thị
        } else {
            // Ẩn tất cả các danh sách khác
            itemSliderBar.forEach(function (item) {
                item.classList.remove("block");
            });
            // Hiển thị danh sách được nhấp
            menu.classList.add("block");
        }
    });
});



