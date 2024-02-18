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
    // GetAllStudent
    public static function Create($username, $password, $datetime)
    {
        $conn = new Connect();
        $sql = "INSERT INTO taikhoan (TenTk, MatKhau, NgayTao) VALUES (?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $username, $password, $datetime);
        $result = $stmt->execute();


        if ($result) {
            return 1;
        } else {
            return 0;
        }
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

        $sql = "SELECT * FROM taikhoan WHERE MaTk = ?";
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
            return null; // Trả về null nếu không tìm thấy tài khoản
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
            return null; // Trả về null nếu không tìm thấy tài khoản
        }
    }

    public static function matkhaumoi($username, $newPassword)
    {
        $conn = new Connect();

        $sql = "UPDATE taikhoan SET MatKhau = ? WHERE TenTK = ?";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param("ss", $newPassword, $username);
        $result = $stmt->execute();

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    // public static function Update()
    // {

    // }
    // public static function Delete()
    // {

    // }
}

?>