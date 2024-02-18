<?php
namespace models;

require 'vendor/autoload.php';
use models\core\Connect;


class TaiKhoan
{
    public $MaKH;
    public $TenKH;
    public $MatKhau;
    public $Email;

    public $NgayDK;

    public $HinhAnh;
    public $quanLy;


    public function __construct($id, $name, $pass, $email, $date, $anh, $quyen)
    {
        $this->MaKH = $id;
        $this->TenKH = $name;
        $this->MatKhau = $pass;
        $this->Email = $email;
        $this->NgayDK = $date;
        $this->HinhAnh = $anh;
        $this->quanLy = $quyen;
    }
    // GetAllStudent $tentk, $matkhau, $email, $datetime, $quyen
    public static function Create($username, $password, $email, $datetime, $quyen)
    {
        $conn = new Connect();
        $sql = "INSERT INTO taikhoan (TenKH, MatKhau, Email, NgayDK, quanLy) VALUES (?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $username, $password, $email, $datetime, $quyen);
        $result = $stmt->execute();
        return $result;
    }

    public static function TatCaTaiKhoan()
    {
        $conn = new Connect();

        $sql = "SELECT * FROM taikhoan";
        $result = $conn->query($sql);

        $taikhoanList = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $taikhoanList[] = new TaiKhoan($row['MaKH'], $row['TenKH'], $row['MatKhau'], $row['Email'], $row['NgayDK'], $row['HinhAnh'], $row['quanLy']);
            }
        }

        $conn->close();
        return $taikhoanList;
    }

    public static function LayThongTinTaiKhoan($id)
    {
        $conn = new Connect();

        $sql = "SELECT * FROM taikhoan WHERE MaKH = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $conn->close();
            return $row;
        } else {
            $conn->close();
            return null;
        }
    }
    public static function LayThongTinTheoTen($TenTk)
    {
        $conn = new Connect();

        $sql = "SELECT * FROM taikhoan WHERE TenKH = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $TenTk);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $conn->close();
            return $row;
        } else {
            $conn->close();
            return null;
        }
    }



    public static function DoiMatKhau($MaKH, $matKhauCu, $matKhauMoi)
    {
        $conn = new Connect();


        $thongTinTaiKhoan = self::LayThongTinTaiKhoan($MaKH);
        $matKhauChinhThuc = $thongTinTaiKhoan['MatKhau'];

        if ($matKhauCu != $matKhauChinhThuc) {
            return false;
        }

        $sql = "UPDATE taikhoan SET MatKhau = ? WHERE MaKH = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('si', $matKhauMoi, $MaKH);

        $result = $stmt->execute();

        $stmt->close();
        $conn->close();

        return $result;
    }


    public static function Login($tentk, $matkhau)
    {
        $conn = new Connect();

        $thongTinTaiKhoan = self::LayThongTinTheoTen($tentk);

        if ($thongTinTaiKhoan !== null) {
            $matKhauChinhThuc = $thongTinTaiKhoan['MatKhau'];

            if ($matkhau == $matKhauChinhThuc) {
                return array('success' => true);
            } else {
                return array('success' => false);
            }
        } else {
            return array('success' => false);
        }
    }

    public static function Update($MaKH, $TenKH, $Email, $HinhAnh)
    {
        $conn = new Connect();

        // Kiểm tra xem có hình ảnh mới hay không
        if (!empty($HinhAnh['name'])) {
            $hinhAnhMoi = self::LuuHinhAnhMoi($HinhAnh);
        } else {
            $hinhAnhMoi = self::LayHinhAnhCu($MaKH);
        }

        // Thực hiện cập nhật thông tin tài khoản
        $sql = "UPDATE taikhoan SET TenKH = ?, Email = ?, HinhAnh = ? WHERE MaKH = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssi', $TenKH, $Email, $hinhAnhMoi, $MaKH);

        // Thực hiện cập nhật
        $result = $stmt->execute();

        // Đóng kết nối
        $stmt->close();
        $conn->close();

        return $result;
    }

    private static function LuuHinhAnhMoi($hinhanh)
    {
        $uploadDir = 'admin/public/images/img-user/';
        $uploadFile = $uploadDir . basename($hinhanh['name']);

        // Di chuyển hình ảnh tới thư mục lưu trữ
        move_uploaded_file($hinhanh['tmp_name'], $uploadFile);

        return $uploadFile;
    }

    private static function LayHinhAnhCu($MaKH)
    {
        $conn = new Connect();

        // Lấy hình ảnh cũ từ cơ sở dữ 
        $sql = "SELECT HinhAnh FROM taikhoan WHERE MaKH = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $MaKH);
        $stmt->execute();
        $stmt->bind_result($hinhAnhCu);
        $stmt->fetch();

        // Đóng kết nối và trả về hình ảnh cũ
        $stmt->close();
        $conn->close();

        return $hinhAnhCu;
    }
    // public static function Delete()
    // {

    // }
}

?>