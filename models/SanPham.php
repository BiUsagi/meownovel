<?php
namespace models;


require 'vendor/autoload.php';
use models\core\Connect;

class SanPham
{
    public $MaSP;
    public $TenSP;
    public $SoLuong;
    public $GiaTien;
    public $MoTa;
    public $NhaXB;
    public $NgayTao;
    public $HinhAnh;

    public $MaDM;

    public function __construct($ma, $ten, $sol, $gia, $mota, $nxb, $date, $anh, $madm)
    {
        $this->MaSP = $ma;
        $this->TenSP = $ten;
        $this->GiaTien = $gia;
        $this->SoLuong = $sol;
        $this->NhaXB = $nxb;
        $this->MoTa = $mota;
        $this->NgayTao = $date;
        $this->HinhAnh = $anh;
        $this->MaDM = $madm;
    }
    public static function TatCaSanPham()
    {
        $conn = new Connect();

        $sql = "SELECT * FROM sanpham";
        $result = $conn->query($sql);

        $sanPhamArray = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $sanPhamArray[] = new SanPham($row['MaSP'], $row['TenSP'], $row['SoLuong'], $row['GiaTien'], $row['MoTa'], $row['NhaXB'], $row['NgayTao'], $row['HinhAnh'], $row['MaDM']);
            }
        }

        $conn->close();
        return $sanPhamArray;
    }
    public static function Create($tenSanPham, $soLuong, $giaBan, $moTa, $nxb, $hinhAnhPath, $maDanhMuc)
    {
        $conn = new Connect();
        $ngayTao = date('Y-m-d H:i:s');

        // Sử dụng prepared statement để tránh SQL injection
        $sql = "INSERT INTO sanpham (TenSP, SoLuong, GiaTien, MoTa, NhaXB , NgayTao, HinhAnh, MaDM) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sidssssi", $tenSanPham, $soLuong, $giaBan, $moTa, $nxb, $ngayTao, $hinhAnhPath, $maDanhMuc);
        $result = $stmt->execute();

        if ($result) {
            $conn->close();
            return 1;
        } else {
            $conn->close();
            return 0;
        }
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



    public static function Update($maSanPham, $tenSanPham, $soLuong, $giaBan, $moTa, $nxb, $hinhAnh, $danhMuc)
    {
        $conn = new Connect();
        $ngayCapNhat = date('Y-m-d H:i:s');

        $sql = "UPDATE sanpham 
                SET TenSP=?, SoLuong=?, GiaTien=?, MoTa=?, NhaXB=?, NgayTao=?, HinhAnh=?, MaDM=?
                WHERE MaSP=?";
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            return 0;
        }

        // Chuyển đổi dữ liệu thành các kiểu dữ liệu phù hợp
        $stmt->bind_param("sidssssii", $tenSanPham, $soLuong, $giaBan, $moTa, $nxb, $ngayCapNhat, $hinhAnh, $danhMuc, $maSanPham);
        $result = $stmt->execute();

        $stmt->close();
        $conn->close();

        return $result;
    }
    public static function Delete($MaSP)
    {
        $conn = new Connect();

        $sql = "DELETE FROM sanpham WHERE MaSP = '$MaSP'";
        $result = $conn->query($sql);

        $conn->close();

        return $result;
    }
}
?>