<?php
/**
 * Format Class
 */
class Format {
    // Hàm định dạng ngày tháng
    public function formatDate($date) {
        return date('F j, Y, g:i a', strtotime($date));
    }

    // Hàm rút gọn văn bản
    public function textShorten($text, $limit = 400) {
        $text = $text . " ";
        $text = substr($text, 0, $limit);
        $text = substr($text, 0, strrpos($text, ' '));
        $text = $text . " ...";
        return $text;
    }

    // Hàm xác thực dữ liệu đầu vào
    public function validation($data) {
        $data = trim($data); // Loại bỏ khoảng trắng dư thừa ở đầu và cuối chuỗi
        $data = stripslashes($data); // Xóa ký tự backslashes (`\`)
        $data = htmlspecialchars($data); // Chuyển các ký tự đặc biệt thành mã HTML
        return $data;
    }

    // Hàm lấy tiêu đề từ tên tệp
    public function title() {
        $path = $_SERVER['SCRIPT_FILENAME']; // Lấy đường dẫn tệp hiện tại
        $title = basename($path, '.php'); // Lấy tên tệp mà không bao gồm đuôi .php

        if ($title == 'index') {
            $title = 'home'; // Đổi "index" thành "home"
        } elseif ($title == 'contact') {
            $title = 'contact'; // Đổi "contact" thành "contact"
        }

        return $title = ucfirst($title); // Viết hoa chữ cái đầu tiên của tiêu đề
    }
}
?>
