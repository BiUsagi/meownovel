<?php
namespace models;

require 'vendor/autoload.php';
use models\core\Connect;

class DanhMuc
{
    public $MaDM;
    public $TenDM;
    public $NgayTao;
    public function __construct($ma, $ten, $date)
    {
        $this->MaDM = $ma;
        $this->TenDM = $ten;
        $this->NgayTao = $date;
    }
    // GetAllStudent
    public static function TatCaDanhMuc()
    {
        $conn = new Connect();

        $sql = "SELECT * FROM danhmuc";
        $result = $conn->query($sql);

        $danhmucList = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $danhmucList[] = new DanhMuc($row['MaDM'], $row['TenDM'], $row['NgayTao']);
            }
        }

        $conn->close();
        return $danhmucList;
    }
    public static function Create($TenDM, $NgayTao)
    {
        $conn = new Connect();
        $sql = "INSERT INTO danhmuc (TenDM, NgayTao) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $TenDM, $NgayTao);
        $result = $stmt->execute();

        return $result ? 1 : 0;
    }
    public static function GetById($MaDM)
    {
        $conn = new Connect();

        $sql = "SELECT * FROM danhmuc WHERE MaDM = '$MaDM'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $danhmuc = new DanhMuc(
                $row['MaDM'],
                $row['TenDM'],
                $row['NgayTao']
            );

            $conn->close();
            return $danhmuc;
        } else {
            $conn->close();
            return null;
        }
    }
    public static function Update($MaDM, $TenDM)
    {
        $conn = new Connect();
        $sql = "UPDATE danhmuc SET TenDM = '$TenDM' WHERE MaDM = '$MaDM'";
        $result = $conn->query($sql);

        $conn->close();

        return $result;
    }
    public static function Delete($MaDM)
    {
        $conn = new Connect();

        //  null trong bảng sanpham
        $sqlUpdateProducts = "UPDATE sanpham SET MaDM = null WHERE MaDM = '$MaDM'";
        $conn->query($sqlUpdateProducts);

        $sqlDeleteCategory = "DELETE FROM danhmuc WHERE MaDM = '$MaDM'";
        $resultDeleteCategory = $conn->query($sqlDeleteCategory);

        $conn->close();

        return $resultDeleteCategory;
    }
}

?>