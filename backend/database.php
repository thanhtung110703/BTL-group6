<?php
include "config.php";// kết nối bảng trong csdl

?>

<?php
class Database {
    // Khai báo thông tin kết nối
    public $host = DB_HOST;
    public $user = DB_USER;
    public $pass = DB_PASS;
    public $dbname = DB_NAME;

    public $link;
    public $error;

    // Hàm khởi tạo
    public function __construct() {
        $this->connectDB();
    }

    // Hàm kết nối cơ sở dữ liệu
    private function connectDB() {
        $this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
        if (!$this->link) {
            $this->error = "Connection failed: " . $this->link->connect_error;
            return false;
        }
    }

    // Hàm lấy dữ liệu (SELECT)
    public function select($query) {
        $result = $this->link->query($query) or 
            die($this->link->error . __LINE__);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

    // Hàm chèn dữ liệu (INSERT)
    public function insert($query) {
        $insert_row = $this->link->query($query) or 
            die($this->link->error . __LINE__);
        if ($insert_row) {
            return $insert_row;
        } else {
            return false;
        }
    }

    // Hàm cập nhật dữ liệu (UPDATE)
    public function update($query) {
        $update_row = $this->link->query($query) or 
            die($this->link->error . __LINE__);
        if ($update_row) {
            return $update_row;
        } else {
            return false;
        }
    }

    // Hàm xóa dữ liệu (DELETE)
    public function delete($query) {
        $delete_row = $this->link->query($query) or 
            die($this->link->error . __LINE__);
        if ($delete_row) {
            return $delete_row;
        } else {
            return false;
        }
    }
}
