<?php require "views/layouts/header.php"; ?>

<div class="container mt-5">
    <div class="row">

        <?php require "views/layouts/sidebar.php"; ?>

        <div class="col-md-9">

            <h2>Xác Nhận Xóa Danh Mục</h2>
            <p>Bạn có chắc chắn muốn xóa danh mục này không?</p>

            <form method="post" action="index.php?controller=danhmuc&action=delete&id=<?= $_GET['id']; ?>">
                <button type="submit" name="confirm_delete">Xác Nhận Xóa</button>
                <a href="index.php?controller=danhmuc&action=index">Hủy Bỏ</a>
            </form>
        </div>
    </div>
</div>

<?php require "views/layouts/footer.php"; ?>