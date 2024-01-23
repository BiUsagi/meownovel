<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MEOW NOVEL</title>
    <link rel="stylesheet" href="/public/css/sanpham.css">
    <link rel="stylesheet" href="/public/css/footer.css">
    <link rel="stylesheet" href="/public/css/header.css">
    <link rel="stylesheet" href="/public/css/article.css">
    <link rel="stylesheet" href="/public/css/nav.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script src="/public/js/topnew.js"></script>

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v16.0"
        nonce="Hh2mkdP5"></script>
</head>

<body>
    <!-- Header  -->
    <?php include "../layout/header.php"; ?>
    <!-- End Header  -->



    <!-- chi tiet san pham -->
    <div id="san-pham" class="none1">
        <button onclick="hide()"><i class="fa-solid fa-arrow-right-from-bracket fa-rotate-180 fa-xl"></i></button>
        <img src alt id="anhsp">
        <div class="p2">
            <h3 id="tensp1"></h3>
            <div id="giasp"></div>
            <del id="giamgiasp"></del>
            <div class="boiden">
                <h4>Tác giả</h4>
                <h4>Nhà xuất bản</h4>
                <h4>Năm xuất bản</h4>
                <h4>Kích thước</h4>
                <h4>Nội dung:</h4>
            </div>
            <div class="nonden">
                <p id="nonden1">??????</p>
                <p id="nonden2">??????</p>
                <p id="nonden3">??????</p>
                <p id="nonden4">??????</p>
            </div>

            <div id="noi-dung">
                <p></p>
            </div>
            <input type="number" id="giaanvl" value class="none1">
        </div>

        <!-- Them vao gio hang -->
        <div id="themgh" onclick="themspvaogio(this)">THÊM VÀO GIỎ
            HÀNG<i class="fa-solid fa-cart-arrow-down fa-xl"></i></div>
        <div id="soluong-sp">
            <label for="soluongsp"></label>
            <input type="button" value="-" id="trusl" onclick="tru()">
            <input type="text" name="soluongsp" id="soluongsp" value="1" min="1">
            <input type="button" value="+" id="congsl" onclick="cong()">
        </div>

        <div id="danhgia">
            <p>ĐÁNH GIÁ SẢN PHẨM</p>
            <ul class="stars">
                <li class="star"><i class="fa-regular fa-star fa-sm"></i></li>
                <li class="star"><i class="fa-regular fa-star fa-sm"></i></li>
                <li class="star"><i class="fa-regular fa-star fa-sm"></i></li>
                <li class="star"><i class="fa-regular fa-star fa-sm"></i></li>
                <li class="star"><i class="fa-regular fa-star fa-sm"></i></li>
                <li class="star"><i class="fa-regular fa-star fa-sm"></i></li>
                <li class="star"><i class="fa-regular fa-star fa-sm"></i></li>
                <li class="star"><i class="fa-regular fa-star fa-sm"></i></li>
                <li class="star"><i class="fa-regular fa-star fa-sm"></i></li>
                <li class="star"><i class="fa-regular fa-star fa-sm"></i></li>
            </ul>
            <div class="output">Sản phẩm chưa được đánh giá!</div>
        </div>
        <div class="fb-comments" data-href="http://127.0.0.1:5500/Asm/Web/Nav/sanpham.php" data-width="1400"
            data-numposts="6"></div>
    </div>

    <!-- gio hang -->
    <div id="storeee">
        <div id="sto-thongtinchitiet"></div>
        <div id="sto-trong"></div>
        <div id="sto-tong">
            <h4>TỔNG TIỀN:</h4>
            <div id="tong-tien">0₫</div>
        </div>
        <div id="sto-thaotac">
            <a href="./giohang.php"><button id="thaotac-01">XEM GIỎ
                    HÀNG</button></a>
            <button id="thaotac-02">THANH TOÁN</button>
        </div>
    </div>

    <div class="boxchungaa">
        <aside id="sanpham4">
            <div class="Muc-as">
                <h3>DANH MỤC</h3>
                <p class="as-av"><a href>TẤT CẢ SẢN PHẨM</a></p>
                <p><a href>SÁCH HOT TRENDING</a></p>
                <p><a href> IPM</a></p>
                <p><a href> KIM ĐỒNG</a></p>
                <p><a href> HIKARI</a></p>
                <p><a href> TRẺ</a></p>
                <p><a href> SAKURA BOOKS</a></p>
                <p><a href> SKY BOOKS</a></p>
                <p><a href> TSUKI</a></p>
                <p><a href> AMAK BOOKS</a></p>
                <p><a href> THÁI HÀ</a></p>
                <p><a href> NHÃ NAM</a></p>
                <p><a href> VĂN HỌC</a></p>

            </div>
        </aside>
        <div class="new-sp" id="new-sp">
            <p>TẤT CẢ SẢN PHẨM</p>
            <div class="new-spm bg-cl" onmouseover="onboxshad(this)" onmouseout="outboxshad(this)">
                <div class="thao-tacsp">
                    <i class="fa-regular fa-heart fa-lg"></i>
                    <i class="fa-solid fa-cart-arrow-down fa-lg" onclick="themvaogiohang(this)"></i>
                </div>
                <a class="img5"><img src="/public/images/SanPham/kumo 6.jpg" alt></a>
                <p class="tieude"><a>Tôi Là Nhện Đấy, Có Sao Không? -
                        06</a></p>
                <div class="gia">
                    141.680₫ <del>154.000₫</del>
                </div>
                <div class="tacgia-sp">Okina Baba</div>
                <div class="nxb-sp">Sakura Books</div>
                <div class="namxb-sp">2018</div>
                <div class="kichthuoc-sp">13 x 18 cm</div>
                <div class="noidung-sp">
                    “Tôi”, người chắc chắn đã từng là một nữ sinh cấp
                    ba, lúc tỉnh dậy thì lại đang ở một nơi lạ hoắc, đầu
                    thai chuyển sinh thành quái vật Nhện!?
                    Sau cuộc đào tẩu ngoạn mục thoát khỏi đám Nhện mới
                    nở ăn thịt lẫn nhau, tôi lạc vào hang ổ của một đám
                    quái vật.
                    Vén màn bí mật về cuộc chiến sinh tồn đang gây sóng
                    gió trong cộng đồng mạng của bé Nhện!
                </div>
                <input type="number" value="1" min="1" class="none1">
                <input type="number" value="141.680" class="none1 giacuoinha">
            </div>

            <div class="new-spm bg-cl" onmouseover="onboxshad(this)" onmouseout="outboxshad(this)">
                <div class="thao-tacsp">
                    <i class="fa-regular fa-heart fa-lg"></i>
                    <i class="fa-solid fa-cart-arrow-down fa-lg" onclick="themvaogiohang(this)"></i>
                </div>
                <a class="img5"><img src="/public/images/SanPham/votronggame.jpg" alt></a>
                <p class="tieude"><a>Vợ Trong Game Của Tôi Là Idol Nổi
                        Tiếng Ngoài Đời - 02</a></p>
                <div class="gia">
                    107.100₫ <del>126.000₫</del>
                </div>
                <div class="tacgia-sp">Abone</div>
                <div class="nxb-sp">Shinebooks</div>
                <div class="namxb-sp">2023</div>
                <div class="kichthuoc-sp">13x18cm</div>
                <div class="noidung-sp">
                    Để đáp lại tình cảm toàn tâm toàn ý của Mizuki
                    Rinka, tôi, Ayanokouji Kazuto, đã trở thành người
                    yêu của cô ấy. Tuy nhiên, là một idol nổi tiếng, cô
                    ấy vô cùng bận rộn. Khi những ngày mà chúng tôi chỉ
                    có thể gặp nhau trên mạng tiếp tục kéo dài, Rinka
                    đột nhiên đến ngủ lại nhà tôi!?
                </div>
                <input type="number" value="1" min="1" class="none1">
                <input type="number" value="107.100" class="none1 giacuoinha">
            </div>

            <div class="new-spm bg-cl" onmouseover="onboxshad(this)" onmouseout="outboxshad(this)">
                <div class="thao-tacsp">
                    <i class="fa-regular fa-heart fa-lg"></i>
                    <i class="fa-solid fa-cart-arrow-down fa-lg" onclick="themvaogiohang(this)"></i>
                </div>
                <a class="img5"><img src="/public/images/SanPham/saop8.jpg" alt></a>
                <p class="tieude"><a>Sword Art Online Progressive -
                        8</a></p>
                <div class="gia">
                    108.000₫ <del>135.000₫</del>
                </div>
                <div class="tacgia-sp">demotg</div>
                <div class="nxb-sp">demonxb</div>
                <div class="namxb-sp">demo2023</div>
                <div class="kichthuoc-sp">13 x 17 cm</div>
                <div class="noidung-sp">
                    Hiện giờ là đầu tháng 1/2023.
                    Kirito, Asuna cùng nhóm công phá đã tới tầng 7. Theo
                    dự tính lạc quan của Kirito thì với tốc độ hiện
                    thời, cứ bảy ngày họ sẽ công phá được một tầng. Còn
                    93 tầng, theo lý thuyết là tầm mùa thu năm 2024 họ
                    sẽ lên tới chóp Aincrad, đối mặt với trùm cuối chưa
                    biết tên tuổi hình dáng đòn thế thế nào.
                </div>
                <input type="number" value="1" min="1" class="none1">
                <input type="number" value="108.000" class="none1 giacuoinha">
            </div>

            <div class="new-spm bg-cl" onmouseover="onboxshad(this)" onmouseout="outboxshad(this)">
                <div class="thao-tacsp">
                    <i class="fa-regular fa-heart fa-lg"></i>
                    <i class="fa-solid fa-cart-arrow-down fa-lg" onclick="themvaogiohang(this)"></i>
                </div>
                <a class="img5"><img src="/public/images/SanPham/tenshi55.jfif" alt></a>
                <p class="tieude"><a>Thiên Sứ Nhà Bên 5.5</a></p>
                <div class="gia">
                    155.000₫ <del>180.000₫</del>
                </div>
                <div class="tacgia-sp">demotg</div>
                <div class="nxb-sp">demonxb</div>
                <div class="namxb-sp">demo2023</div>
                <div class="kichthuoc-sp">13 x 17 cm</div>
                <div class="noidung-sp">
                    Hiện giờ là đầu tháng 1/2023.
                    Kirito, Asuna cùng nhóm công phá đã tới tầng 7. Theo
                    dự tính lạc quan của Kirito thì với tốc độ hiện
                    thời, cứ bảy ngày họ sẽ công phá được một tầng. Còn
                    93 tầng, theo lý thuyết là tầm mùa thu năm 2024 họ
                    sẽ lên tới chóp Aincrad, đối mặt với trùm cuối chưa
                    biết tên tuổi hình dáng đòn thế thế nào.
                </div>
                <input type="number" value="1" min="1" class="none1">
                <input type="number" value="155.000" class="none1 giacuoinha">
            </div>

            <div class="new-spm bg-cl" onmouseover="onboxshad(this)" onmouseout="outboxshad(this)">
                <div class="thao-tacsp">
                    <i class="fa-regular fa-heart fa-lg"></i>
                    <i class="fa-solid fa-cart-arrow-down fa-lg" onclick="themvaogiohang(this)"></i>
                </div>
                <a class="img5"><img src="/public/images/SanPham/tenshi5.jfif" alt></a>
                <p class="tieude"><a>Thiên Sứ Nhà Bên 5</a></p>
                <div class="gia">
                    71.250₫ <del>95.000₫</del>
                </div>
                <div class="tacgia-sp">demotg</div>
                <div class="nxb-sp">demonxb</div>
                <div class="namxb-sp">demo2023</div>
                <div class="kichthuoc-sp">13 x 17 cm</div>
                <div class="noidung-sp">
                    Hiện giờ là đầu tháng 1/2023.
                    Kirito, Asuna cùng nhóm công phá đã tới tầng 7. Theo
                    dự tính lạc quan của Kirito thì với tốc độ hiện
                    thời, cứ bảy ngày họ sẽ công phá được một tầng. Còn
                    93 tầng, theo lý thuyết là tầm mùa thu năm 2024 họ
                    sẽ lên tới chóp Aincrad, đối mặt với trùm cuối chưa
                    biết tên tuổi hình dáng đòn thế thế nào.
                </div>
                <input type="number" value="1" min="1" class="none1">
                <input type="number" value="71.250" class="none1 giacuoinha">
            </div>

            <div class="new-spm bg-cl" onmouseover="onboxshad(this)" onmouseout="outboxshad(this)">
                <div class="thao-tacsp">
                    <i class="fa-regular fa-heart fa-lg"></i>
                    <i class="fa-solid fa-cart-arrow-down fa-lg" onclick="themvaogiohang(this)"></i>
                </div>
                <a class="img5"><img src="/public/images/SanPham/saop1.webp" alt></a>
                <p class="tieude"><a>Sword Art Online Progressive -
                        1</a></p>
                <div class="gia">
                    120.000₫ <del>150.000₫</del>
                </div>
                <div class="tacgia-sp">demotg</div>
                <div class="nxb-sp">demonxb</div>
                <div class="namxb-sp">demo2023</div>
                <div class="kichthuoc-sp">13 x 17 cm</div>
                <div class="noidung-sp">
                    Hiện giờ là đầu tháng 1/2023.
                    Kirito, Asuna cùng nhóm công phá đã tới tầng 7. Theo
                    dự tính lạc quan của Kirito thì với tốc độ hiện
                    thời, cứ bảy ngày họ sẽ công phá được một tầng. Còn
                    93 tầng, theo lý thuyết là tầm mùa thu năm 2024 họ
                    sẽ lên tới chóp Aincrad, đối mặt với trùm cuối chưa
                    biết tên tuổi hình dáng đòn thế thế nào.
                </div>
                <input type="number" value="1" min="1" class="none1">
                <input type="number" value="120.000" class="none1 giacuoinha">
            </div>

            <div class="new-spm bg-cl" onmouseover="onboxshad(this)" onmouseout="outboxshad(this)">
                <div class="thao-tacsp">
                    <i class="fa-regular fa-heart fa-lg"></i>
                    <i class="fa-solid fa-cart-arrow-down fa-lg" onclick="themvaogiohang(this)"></i>
                </div>
                <a class="img5"><img src="/public/images/SanPham/votronggame1.jpg" alt></a>
                <p class="tieude"><a>Vợ Trong Game Của Tôi Là Idol Nổi
                        Tiếng Ngoài Đời - 01</a></p>
                <div class="gia">
                    107.100₫ <del>126.000₫</del>
                </div>
                <div class="tacgia-sp">Abone</div>
                <div class="nxb-sp">Shinebooks</div>
                <div class="namxb-sp">2023</div>
                <div class="kichthuoc-sp">13x18cm</div>
                <div class="noidung-sp">
                    Để đáp lại tình cảm toàn tâm toàn ý của Mizuki
                    Rinka, tôi, Ayanokouji Kazuto, đã trở thành người
                    yêu của cô ấy. Tuy nhiên, là một idol nổi tiếng, cô
                    ấy vô cùng bận rộn. Khi những ngày mà chúng tôi chỉ
                    có thể gặp nhau trên mạng tiếp tục kéo dài, Rinka
                    đột nhiên đến ngủ lại nhà tôi!?
                </div>
                <input type="number" value="1" min="1" class="none1">
                <input type="number" value="107.100" class="none1 giacuoinha">
            </div>

            <div class="new-spm bg-cl" onmouseover="onboxshad(this)" onmouseout="outboxshad(this)">
                <div class="thao-tacsp">
                    <i class="fa-regular fa-heart fa-lg"></i>
                    <i class="fa-solid fa-cart-arrow-down fa-lg" onclick="themvaogiohang(this)"></i>
                </div>
                <a class="img5"><img src="/public/images/SanPham/thanhtu4.jpg" alt></a>
                <p class="tieude"><a>Thám Tử Đã Chết - 4</a></p>
                <div class="gia">
                    87.200₫ <del>109.000₫</del>
                </div>
                <div class="tacgia-sp">demotg</div>
                <div class="nxb-sp">demonxb</div>
                <div class="namxb-sp">demo2023</div>
                <div class="kichthuoc-sp">13 x 17 cm</div>
                <div class="noidung-sp">
                    Hiện giờ là đầu tháng 1/2023.
                    Kirito, Asuna cùng nhóm công phá đã tới tầng 7. Theo
                    dự tính lạc quan của Kirito thì với tốc độ hiện
                    thời, cứ bảy ngày họ sẽ công phá được một tầng. Còn
                    93 tầng, theo lý thuyết là tầm mùa thu năm 2024 họ
                    sẽ lên tới chóp Aincrad, đối mặt với trùm cuối chưa
                    biết tên tuổi hình dáng đòn thế thế nào.
                </div>
                <input type="number" value="1" min="1" class="none1">
                <input type="number" value="87.200" class="none1 giacuoinha">
            </div>

            <div class="new-spm bg-cl" onmouseover="onboxshad(this)" onmouseout="outboxshad(this)">
                <div class="thao-tacsp">
                    <i class="fa-regular fa-heart fa-lg"></i>
                    <i class="fa-solid fa-cart-arrow-down fa-lg" onclick="themvaogiohang(this)"></i>
                </div>
                <a class="img5"><img src="/public/images/SanPham/lophoc3.jpg" alt></a>
                <p class="tieude"><a>Chào Mừng Đến Với Lớp Học Đề Cao
                        Thực Lực - 03</a></p>
                <div class="gia">
                    42.750₫ <del>45.000₫</del>
                </div>
                <div class="tacgia-sp">Kinugasa Syougo</div>
                <div class="nxb-sp">IPM</div>
                <div class="namxb-sp">2022</div>
                <div class="kichthuoc-sp">18 x 13 cm</div>
                <div class="noidung-sp">
                    Trường Trung học Phổ thông Đào tạo Nâng cao là ngôi
                    trường danh giá hàng đầu Nhật Bản, với gần 100% học
                    sinh đỗ vào trường đại học mong muốn và tìm được
                    việc làm. Học sinh được sử dụng cơ sở vật chất hiện
                    đại bậc nhất, mỗi tháng được cấp một số điểm có giá
                    trị tương đương 100.000 yên, tự do tạo kiểu tóc và
                    mang vật dụng cá nhân. Thật giống như sống trên
                    thiên đường.
                </div>
                <input type="number" value="1" min="1" class="none1">
                <input type="number" value="42.750" class="none1 giacuoinha">
            </div>

            <div class="new-spm bg-cl" onmouseover="onboxshad(this)" onmouseout="outboxshad(this)">
                <div class="thao-tacsp">
                    <i class="fa-regular fa-heart fa-lg"></i>
                    <i class="fa-solid fa-cart-arrow-down fa-lg" onclick="themvaogiohang(this)"></i>
                </div>
                <a class="img5"><img src="/public/images/SanPham/sao24.jfif" alt></a>
                <p class="tieude"><a>Sword Art Online - 024</a></p>
                <div class="gia">
                    116.250₫ <del>125.000₫</del>
                </div>
                <div class="tacgia-sp">demotg</div>
                <div class="nxb-sp">demonxb</div>
                <div class="namxb-sp">demo2023</div>
                <div class="kichthuoc-sp">13 x 17 cm</div>
                <div class="noidung-sp">
                    Hiện giờ là đầu tháng 1/2023.
                    Kirito, Asuna cùng nhóm công phá đã tới tầng 7. Theo
                    dự tính lạc quan của Kirito thì với tốc độ hiện
                    thời, cứ bảy ngày họ sẽ công phá được một tầng. Còn
                    93 tầng, theo lý thuyết là tầm mùa thu năm 2024 họ
                    sẽ lên tới chóp Aincrad, đối mặt với trùm cuối chưa
                    biết tên tuổi hình dáng đòn thế thế nào.
                </div>
                <input type="number" value="1" min="1" class="none1">
                <input type="number" value="116.250" class="none1 giacuoinha">
            </div>

            <div class="new-spm bg-cl" onmouseover="onboxshad(this)" onmouseout="outboxshad(this)">
                <div class="thao-tacsp">
                    <i class="fa-regular fa-heart fa-lg"></i>
                    <i class="fa-solid fa-cart-arrow-down fa-lg" onclick="themvaogiohang(this)"></i>
                </div>
                <a class="img5"><img src="/public/images/SanPham/onepred.jpg" alt></a>
                <p class="tieude"><a>One Piece Film RED</a></p>
                <div class="gia">
                    58.500₫ <del>55.000₫</del>
                </div>
                <div class="tacgia-sp">demotg</div>
                <div class="nxb-sp">demonxb</div>
                <div class="namxb-sp">demo2023</div>
                <div class="kichthuoc-sp">13 x 17 cm</div>
                <div class="noidung-sp">
                    Hiện giờ là đầu tháng 1/2023.
                    Kirito, Asuna cùng nhóm công phá đã tới tầng 7. Theo
                    dự tính lạc quan của Kirito thì với tốc độ hiện
                    thời, cứ bảy ngày họ sẽ công phá được một tầng. Còn
                    93 tầng, theo lý thuyết là tầm mùa thu năm 2024 họ
                    sẽ lên tới chóp Aincrad, đối mặt với trùm cuối chưa
                    biết tên tuổi hình dáng đòn thế thế nào.
                </div>
                <input type="number" value="1" min="1" class="none1">
                <input type="number" value="58.500" class="none1 giacuoinha">
            </div>

            <div class="new-spm bg-cl" onmouseover="onboxshad(this)" onmouseout="outboxshad(this)">
                <div class="thao-tacsp">
                    <i class="fa-regular fa-heart fa-lg"></i>
                    <i class="fa-solid fa-cart-arrow-down fa-lg" onclick="themvaogiohang(this)"></i>
                </div>
                <a class="img5"><img src="/public/images/SanPham/spy2.jpg" alt></a>
                <p class="tieude"><a>SPY ROOM - 2</a></p>
                <div class="gia">
                    80.660₫ <del>109.000₫</del>
                </div>
                <div class="tacgia-sp">demotg</div>
                <div class="nxb-sp">demonxb</div>
                <div class="namxb-sp">demo2023</div>
                <div class="kichthuoc-sp">13 x 17 cm</div>
                <div class="noidung-sp">
                    Hiện giờ là đầu tháng 1/2023.
                    Kirito, Asuna cùng nhóm công phá đã tới tầng 7. Theo
                    dự tính lạc quan của Kirito thì với tốc độ hiện
                    thời, cứ bảy ngày họ sẽ công phá được một tầng. Còn
                    93 tầng, theo lý thuyết là tầm mùa thu năm 2024 họ
                    sẽ lên tới chóp Aincrad, đối mặt với trùm cuối chưa
                    biết tên tuổi hình dáng đòn thế thế nào.
                </div>
                <input type="number" value="1" min="1" class="none1">
                <input type="number" value="80.660" class="none1 giacuoinha">
            </div>

            <div class="new-spm bg-cl" onmouseover="onboxshad(this)" onmouseout="outboxshad(this)">
                <div class="thao-tacsp">
                    <i class="fa-regular fa-heart fa-lg"></i>
                    <i class="fa-solid fa-cart-arrow-down fa-lg" onclick="themvaogiohang(this)"></i>
                </div>
                <a class="img5"><img src="/public/images/SanPham/fire1.webp" alt></a>
                <p class="tieude"><a>Fire Force - 01</a></p>
                <div class="gia">
                    43.000₫<del> </del>
                </div>
                <div class="tacgia-sp">demotg</div>
                <div class="nxb-sp">demonxb</div>
                <div class="namxb-sp">demo2023</div>
                <div class="kichthuoc-sp">13 x 17 cm</div>
                <div class="noidung-sp">
                    Hiện giờ là đầu tháng 1/2023.
                    Kirito, Asuna cùng nhóm công phá đã tới tầng 7. Theo
                    dự tính lạc quan của Kirito thì với tốc độ hiện
                    thời, cứ bảy ngày họ sẽ công phá được một tầng. Còn
                    93 tầng, theo lý thuyết là tầm mùa thu năm 2024 họ
                    sẽ lên tới chóp Aincrad, đối mặt với trùm cuối chưa
                    biết tên tuổi hình dáng đòn thế thế nào.
                </div>
                <input type="number" value="1" min="1" class="none1">
                <input type="number" value="43.000" class="none1 giacuoinha">
            </div>

            <div class="new-spm bg-cl" onmouseover="onboxshad(this)" onmouseout="outboxshad(this)">
                <div class="thao-tacsp">
                    <i class="fa-regular fa-heart fa-lg"></i>
                    <i class="fa-solid fa-cart-arrow-down fa-lg" onclick="themvaogiohang(this)"></i>
                </div>
                <a class="img5"><img src="/public/images/SanPham/livedeath.jfif" alt></a>
                <p class="tieude"><a>Em là người sống, tôi là người
                        chết. Thế giới đôi lúc lại đảo ngược.</a> </p>
                <div class="gia">
                    97.750₫ <del>115.000₫</del>
                </div>
                <div class="tacgia-sp">demotg</div>
                <div class="nxb-sp">demonxb</div>
                <div class="namxb-sp">demo2023</div>
                <div class="kichthuoc-sp">13 x 17 cm</div>
                <div class="noidung-sp">
                    Hiện giờ là đầu tháng 1/2023.
                    Kirito, Asuna cùng nhóm công phá đã tới tầng 7. Theo
                    dự tính lạc quan của Kirito thì với tốc độ hiện
                    thời, cứ bảy ngày họ sẽ công phá được một tầng. Còn
                    93 tầng, theo lý thuyết là tầm mùa thu năm 2024 họ
                    sẽ lên tới chóp Aincrad, đối mặt với trùm cuối chưa
                    biết tên tuổi hình dáng đòn thế thế nào.
                </div>
                <input type="number" value="1" min="1" class="none1">
                <input type="number" value="97.750" class="none1 giacuoinha">
            </div>

            <div class="new-spm bg-cl" onmouseover="onboxshad(this)" onmouseout="outboxshad(this)">
                <div class="thao-tacsp">
                    <i class="fa-regular fa-heart fa-lg"></i>
                    <i class="fa-solid fa-cart-arrow-down fa-lg" onclick="themvaogiohang(this)"></i>
                </div>
                <a class="img5"><img src="/public/images/SanPham/arya1.jfif" alt></a>
                <p class="tieude"><a>Arya Bàn Bên Thỉnh Thoảng Lại Trêu
                        Ghẹo Tôi Bằng Tiếng Nga - 01</a></p>
                <div class="gia">
                    79.800₫ <del>95.000₫</del>
                </div>
                <div class="tacgia-sp">demotg</div>
                <div class="nxb-sp">demonxb</div>
                <div class="namxb-sp">demo2023</div>
                <div class="kichthuoc-sp">13 x 17 cm</div>
                <div class="noidung-sp">
                    Hiện giờ là đầu tháng 1/2023.
                    Kirito, Asuna cùng nhóm công phá đã tới tầng 7. Theo
                    dự tính lạc quan của Kirito thì với tốc độ hiện
                    thời, cứ bảy ngày họ sẽ công phá được một tầng. Còn
                    93 tầng, theo lý thuyết là tầm mùa thu năm 2024 họ
                    sẽ lên tới chóp Aincrad, đối mặt với trùm cuối chưa
                    biết tên tuổi hình dáng đòn thế thế nào.
                </div>
                <input type="number" value="1" min="1" class="none1">
                <input type="number" value="79.800" class="none1 giacuoinha">
            </div>

            <div class="new-spm bg-cl" onmouseover="onboxshad(this)" onmouseout="outboxshad(this)">
                <div class="thao-tacsp">
                    <i class="fa-regular fa-heart fa-lg"></i>
                    <i class="fa-solid fa-cart-arrow-down fa-lg" onclick="themvaogiohang(this)"></i>
                </div>
                <a class="img5"><img src="/public/images/SanPham/arya2.jfif" alt></a>
                <p class="tieude"><a>Arya Bàn Bên Thỉnh Thoảng Lại Trêu
                        Ghẹo Tôi Bằng Tiếng Nga - 02</a></p>
                <div class="gia">
                    80.750₫ <del>95.000₫</del>
                </div>
                <div class="tacgia-sp">demotg</div>
                <div class="nxb-sp">demonxb</div>
                <div class="namxb-sp">demo2023</div>
                <div class="kichthuoc-sp">13 x 17 cm</div>
                <div class="noidung-sp">
                    Hiện giờ là đầu tháng 1/2023.
                    Kirito, Asuna cùng nhóm công phá đã tới tầng 7. Theo
                    dự tính lạc quan của Kirito thì với tốc độ hiện
                    thời, cứ bảy ngày họ sẽ công phá được một tầng. Còn
                    93 tầng, theo lý thuyết là tầm mùa thu năm 2024 họ
                    sẽ lên tới chóp Aincrad, đối mặt với trùm cuối chưa
                    biết tên tuổi hình dáng đòn thế thế nào.
                </div>
                <input type="number" value="1" min="1" class="none1">
                <input type="number" value="80.750" class="none1 giacuoinha">
            </div>

            <div class="new-spm bg-cl" onmouseover="onboxshad(this)" onmouseout="outboxshad(this)">
                <div class="thao-tacsp">
                    <i class="fa-regular fa-heart fa-lg"></i>
                    <i class="fa-solid fa-cart-arrow-down fa-lg" onclick="themvaogiohang(this)"></i>
                </div>
                <a class="img5"><img src="/public/images/SanPham/dav6.jpg" alt></a>
                <p class="tieude"><a>Date a Live - 6</a></p>
                <div class="gia">
                    42.750₫ <del>45.000₫</del>
                </div>
                <div class="tacgia-sp">demotg</div>
                <div class="nxb-sp">demonxb</div>
                <div class="namxb-sp">demo2023</div>
                <div class="kichthuoc-sp">13 x 17 cm</div>
                <div class="noidung-sp">
                    Hiện giờ là đầu tháng 1/2023.
                    Kirito, Asuna cùng nhóm công phá đã tới tầng 7. Theo
                    dự tính lạc quan của Kirito thì với tốc độ hiện
                    thời, cứ bảy ngày họ sẽ công phá được một tầng. Còn
                    93 tầng, theo lý thuyết là tầm mùa thu năm 2024 họ
                    sẽ lên tới chóp Aincrad, đối mặt với trùm cuối chưa
                    biết tên tuổi hình dáng đòn thế thế nào.
                </div>
                <input type="number" value="1" min="1" class="none1">
                <input type="number" value="42.750" class="none1 giacuoinha">
            </div>

            <div class="new-spm bg-cl" onmouseover="onboxshad(this)" onmouseout="outboxshad(this)">
                <div class="thao-tacsp">
                    <i class="fa-regular fa-heart fa-lg"></i>
                    <i class="fa-solid fa-cart-arrow-down fa-lg" onclick="themvaogiohang(this)"></i>
                </div>
                <a class="img5"><img src="/public/images/SanPham/spy-fam.jpg" alt></a>
                <p class="tieude"><a>Spy X Family Fanbook Eyes
                        Only</a></p>
                <div class="gia">
                    290.000₫ <del> </del>
                </div>
                <div class="tacgia-sp">demotg</div>
                <div class="nxb-sp">demonxb</div>
                <div class="namxb-sp">demo2023</div>
                <div class="kichthuoc-sp">13 x 17 cm</div>
                <div class="noidung-sp">
                    Hiện giờ là đầu tháng 1/2023.
                    Kirito, Asuna cùng nhóm công phá đã tới tầng 7. Theo
                    dự tính lạc quan của Kirito thì với tốc độ hiện
                    thời, cứ bảy ngày họ sẽ công phá được một tầng. Còn
                    93 tầng, theo lý thuyết là tầm mùa thu năm 2024 họ
                    sẽ lên tới chóp Aincrad, đối mặt với trùm cuối chưa
                    biết tên tuổi hình dáng đòn thế thế nào.
                </div>
                <input type="number" value="1" min="1" class="none1">
                <input type="number" value="290.000" class="none1 giacuoinha">
            </div>

            <div class="new-spm bg-cl" onmouseover="onboxshad(this)" onmouseout="outboxshad(this)">
                <div class="thao-tacsp">
                    <i class="fa-regular fa-heart fa-lg"></i>
                    <i class="fa-solid fa-cart-arrow-down fa-lg" onclick="themvaogiohang(this)"></i>
                </div>
                <a class="img5"><img src="/public/images/SanPham/bokuhero31.webp" alt></a>
                <p class="tieude"><a>Học Viện Siêu Anh Hùng Tập
                        31</a></p>
                <div class="gia">
                    23,750₫ <del>25,000₫</del>
                </div>
                <div class="tacgia-sp">demotg</div>
                <div class="nxb-sp">demonxb</div>
                <div class="namxb-sp">demo2023</div>
                <div class="kichthuoc-sp">13 x 17 cm</div>
                <div class="noidung-sp">
                    Hiện giờ là đầu tháng 1/2023.
                    Kirito, Asuna cùng nhóm công phá đã tới tầng 7. Theo
                    dự tính lạc quan của Kirito thì với tốc độ hiện
                    thời, cứ bảy ngày họ sẽ công phá được một tầng. Còn
                    93 tầng, theo lý thuyết là tầm mùa thu năm 2024 họ
                    sẽ lên tới chóp Aincrad, đối mặt với trùm cuối chưa
                    biết tên tuổi hình dáng đòn thế thế nào.
                </div>
                <input type="number" value="1" min="1" class="none1">
                <input type="number" value="23,750₫" class="none1 giacuoinha">
            </div>

            <div class="new-spm bg-cl" onmouseover="onboxshad(this)" onmouseout="outboxshad(this)">
                <div class="thao-tacsp">
                    <i class="fa-regular fa-heart fa-lg"></i>
                    <i class="fa-solid fa-cart-arrow-down fa-lg" onclick="themvaogiohang(this)"></i>
                </div>
                <a class="img5"><img src="/public/images/SanPham/lophoc4.jpg" alt></a>
                <p class="tieude"><a>Chào Mừng Đến Với Lớp Đề Cao Thực
                        Lực - 04</a></p>
                <div class="gia">
                    111.600₫ <del>120.000₫</del>
                </div>
                <div class="tacgia-sp">demotg</div>
                <div class="nxb-sp">demonxb</div>
                <div class="namxb-sp">demo2023</div>
                <div class="kichthuoc-sp">13 x 17 cm</div>
                <div class="noidung-sp">
                    Hiện giờ là đầu tháng 1/2023.
                    Kirito, Asuna cùng nhóm công phá đã tới tầng 7. Theo
                    dự tính lạc quan của Kirito thì với tốc độ hiện
                    thời, cứ bảy ngày họ sẽ công phá được một tầng. Còn
                    93 tầng, theo lý thuyết là tầm mùa thu năm 2024 họ
                    sẽ lên tới chóp Aincrad, đối mặt với trùm cuối chưa
                    biết tên tuổi hình dáng đòn thế thế nào.
                </div>
                <input type="number" value="1" min="1" class="none1">
                <input type="number" value="111.600" class="none1 giacuoinha">
            </div>

            <div class="nexttr">
                <a href="./sanpham1.php" class="dangc">1</a>
                <a href="./sanpham2.php">2</a>
            </div>
        </div>

    </div>

    </article>

    <footer id="sanpham3">
        <div class="foo-lh">
            <div class="foo-01">
                <img src="/public/images/Logo/cat.jpg" alt width="70px">
                <p>MEOW NOVEL</p>
            </div>
            <div class="thongtinfoo">
                <p>Địa chỉ: 9 Hà Văn Tính, Hòa Khánh Nam, Liên Chiểu, Đà
                    Nẵng</p>
                <p>Email: tubanovel@gmail.com</p>
                <p>SDT: 0343561287</p>
                <p>Fb: facebook.com/sonthichnovel</p>
            </div>
        </div>
        <div class="foo-nhantt">
            <h4>ĐĂNG KÝ NHẬN TIN</h4>
            <p>Hãy nhập địa chỉ email của bạn vào ô dưới đây để có thể nhận
                được tất cả các tin tức mới nhất của MEOW NOVEL về các sản
                phẩm mới, các chương trình khuyến mãi mới. MEOW NOVEL xin
                đảm bảo sẽ không gửi mail rác, mail spam tới bạn.</p>
            <form>
                <label>
                    <input type="text" placeholder="Nhập email của bạn tại đây...">
                    <button type="submit">Gửi</button>
                </label>
            </form>
        </div>
        <div id="backtop">
            <img src="/public/images/Logo/fighter2.png" width>
        </div>

    </footer>
</body>
<script src="/public/js/sanpham.js"></script>
<script src="/public/js/store.js"></script>

</html>

<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
    crossorigin="anonymous"></script>
<script>
$(document).ready(function() {
    $(window).scroll(function() {
        if ($(this).scrollTop()) {
            $('#backtop').fadeIn();
        } else {
            $('#backtop').fadeOut();
        }
    });
    $('#backtop').click(function() {
        $('html, body').animate({
            scrollTop: 0
        }, 1000);
    });
});
</script>