<?php
include "database.php";

class cartegory {
    private $db;

    public function __construct()
    {
        $this->db = new Database(); // Khởi tạo kết nối DB (file này dùng định nghĩa cho các hàm)
    }

    public function insert_cartegory($cartegory_name) {  // định nghĩa hàm insert_cartegory
        $query = "INSERT INTO tbl_cartegory (cartegory_name) VALUES('$cartegory_name')";
        $result = $this->db->insert($query);
        header('Location:cartegorylist.php');
        //return $result;
    }

    public function show_cartegory() { // định nghĩa hàm show_cartegory)
        $query = "SELECT * FROM tbl_cartegory ORDER BY cartegory_id DESC"; 
        $result = $this->db->select($query);
        return $result;
    }
    public function get_cartegory($cartegory_id) { // định nghĩa hàm get_cartegory)
        $query = "SELECT * FROM tbl_cartegory WHERE cartegory_id = '$cartegory_id'"; 
        $result = $this ->db->select($query);
        return $result;

    }
    public function update_cartegory($cartegory_name, $cartegory_id) {
        $query = "UPDATE  tbl_cartegory SET cartegory_name ='$cartegory_name' WHERE cartegory_id = '$cartegory_id' ";
        $result = $this ->db->update($query);
        header('Location:cartegorylist.php');//sau khi xử lí lệnh trên chuyển tiếp sang trang cartegorylist
        return $result;
    }
    public function delete_cartegory($cartegory_id) {
        $query = "DELETE FROM  tbl_cartegory WHERE cartegory_id = '$cartegory_id' ";//xoá dữ liệu trong bảng tblcar mà có car_id = biến $car_id
        $result = $this ->db->delete($query);
        header('Location:cartegorylist.php');//sau khi xử lí lệnh trên chuyển tiếp sang trang cartegorylist
        return $result;

    }

}
?>
