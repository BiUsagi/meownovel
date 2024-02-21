<?php
namespace models;

require 'vendor/autoload.php';
use models\core\Connect;
use models\TaiKhoan;

class GioHang
{
    public $MaGH;
    public $MaKH;
    public $MaSP;
    public $SoLuong;

    public function __construct($idGH, $idKH, $idSP, $sl)
    {
        $this->MaGH = $idGH;
        $this->MaKH = $idKH;
        $this->MaSP = $idSP;
        $this->SoLuong = $sl;
    }


    public static function GetById($MaSP)
    {
        $conn = new Connect();

        $sql = "SELECT * FROM sanpham WHERE MaSP = $MaSP";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $sanpham = new SanPham(
                $row['MaSP'],
                $row['TenSP'],
                $row['SoLuong'],
                $row['GiaTien'],
                $row['MoTa'],
                $row['NhaXB'],
                $row['NgayTao'],
                $row['HinhAnh'],
                $row['MaDM']
            );

            $conn->close();
            return $sanpham;
        } else {
            $conn->close();
            return null;
        }
    }

    public static function LayGioHangTheoKH($TenKH)
    {
        $conn = new Connect();
        $MaKH = TaiKhoan::LayThongTinTheoTen($TenKH);

        $sql = "SELECT * FROM giohang WHERE MaKH = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $MaKH['MaKH']);
        $stmt->execute();

        $result = $stmt->get_result();

        $gioHang = array();

        while ($row = $result->fetch_assoc()) {
            $gioHang[] = $row;
        }

        $stmt->close();
        $conn->close();

        return $gioHang;
    }

    public static function ThemSanPham($tenKH, $maSanPham, $soLuong)
    {
        $conn = new Connect();
        $MaKH = TaiKhoan::LayThongTinTheoTen($tenKH);


        $sql = "INSERT INTO giohang (MaKH, MaSP, SoLuong) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iii", $MaKH['MaKH'], $maSanPham, $soLuong);
        $result = $stmt->execute();

        $stmt->close();
        $conn->close();

        return $result;
    }
    public static function KiemTraTonTai($tenKH, $maSanPham)
    {
        $conn = new Connect();
        $MaKH = TaiKhoan::LayThongTinTheoTen($tenKH);

        $sql = "SELECT * FROM giohang WHERE MaKH = ? AND MaSP = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $MaKH['MaKH'], $maSanPham);
        $stmt->execute();

        $result = $stmt->get_result();

        $kiemTraTonTai = $result->num_rows > 0;

        $stmt->close();
        $conn->close();

        return $kiemTraTonTai;
    }
    public static function CapNhatSoLuong($tenKH, $maSanPham, $soLuong)
    {
        $conn = new Connect();
        $MaKH = TaiKhoan::LayThongTinTheoTen($tenKH);

        $sql = "UPDATE giohang SET SoLuong = ? WHERE MaKH = ? AND MaSP = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iii", $soLuong, $MaKH['MaKH'], $maSanPham);
        $result = $stmt->execute();

        $stmt->close();
        $conn->close();

        return $result;
    }

    public static function Delete($MaGH)
    {
        $conn = new Connect();

        $sql = "DELETE FROM giohang WHERE MaGH = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $MaGH);
        $result = $stmt->execute();

        $stmt->close();
        $conn->close();

        return $result;
    }
}
?>