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

    public static function TatCaDonHang()
    {
        $conn = new Connect();

        $sql = "SELECT * FROM donhang";
        $result = $conn->query($sql);

        $donhangList = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $donhangList[] = new TaiKhoan($row['MaDH'], $row['MaKH'], $row['TenNN'], $row['SoDT'], $row['DiaChi'], $row['TongTien'], $row['NgayDatHang']);
            }
        }

        $conn->close();
        return $donhangList;
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
    public static function LuuDonHang($TenKH, $hoten, $sodienthoai, $diachi, $tongtien)
    {
        $conn = new Connect();
        $MaKH = TaiKhoan::LayThongTinTheoTen($TenKH);
        $sql = "INSERT INTO donhang (MaKH, NgayDatHang, TenNN, SoDT, DiaChi, TongTien) VALUES (? ,NOW(), ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isssd", $MaKH['MaKH'], $hoten, $sodienthoai, $diachi, $tongtien);
        $stmt->execute();

        // Lấy id_donhang vừa thêm vào
        $id_donhang = $stmt->insert_id;

        $stmt->close();
        $conn->close();

        return $id_donhang;
    }

    public static function LuuChiTietDonHang($id_donhang, $masanpham, $soluong, $dongia)
    {
        $conn = new Connect();

        $sql = "INSERT INTO chitietdonhang (MaDH, MaSP, SoLuong, GiaTien) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iiid", $id_donhang, $masanpham, $soluong, $dongia);
        $stmt->execute();

        $stmt->close();
        $conn->close();
    }

    public static function XoaGioHang($tenKH)
    {
        $conn = new Connect();
        // Thực hiện DELETE dữ liệu trong bảng 'giohang' dựa trên tên khách hàng
        $sql = "DELETE FROM giohang WHERE MaKH = ?";
        $stmt = $conn->prepare($sql);
        $MaKH = TaiKhoan::LayThongTinTheoTen($tenKH)['MaKH'];
        $stmt->bind_param("i", $MaKH);
        $stmt->execute();

        $stmt->close();
        $conn->close();
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


    public static function LayThongTinDonHang($MaKH)
    {
        $conn = new Connect();

        $sql = "SELECT * FROM donhang WHERE MaKH = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $MaKH);
        $stmt->execute();
        $result = $stmt->get_result();

        $donhangArray = array();

        while ($row = $result->fetch_assoc()) {
            $donhangArray[] = $row;
        }

        $stmt->close();
        $conn->close();

        return $donhangArray;
    }
    public static function LayThongTinDonHangTheoMaDH($MaDH)
    {
        $conn = new Connect();

        $sql = "SELECT * FROM donhang WHERE MaDH = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $MaDH);
        $stmt->execute();
        $result = $stmt->get_result();

        $donhangArray = array();

        while ($row = $result->fetch_assoc()) {
            $donhangArray[] = $row;
        }

        $stmt->close();
        $conn->close();

        return $donhangArray;
    }

    public static function LayThongTinChiTietDH($MaDH)
    {
        $conn = new Connect();

        $sql = "SELECT * FROM chitietdonhang WHERE MaDH = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $MaDH);
        $stmt->execute();
        $result = $stmt->get_result();

        $donhangArray = array();

        while ($row = $result->fetch_assoc()) {
            $donhangArray[] = $row;
        }

        $stmt->close();
        $conn->close();

        return $donhangArray;
    }
}
?>