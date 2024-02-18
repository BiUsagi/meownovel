<?php include "layout/header.php"; ?>
<!-- End Header  -->


<div class="lienhe">
    <h3>LIÊN HỆ</h3>
    <div class="lh-01">
        <p>MEOW NOVEL shop</p>
    </div>
    <div class="thongtinlh">
        <p>Địa chỉ: 9 Hà Văn Tính, Hòa Khánh Nam, Liên Chiểu, Đà
            Nẵng</p>
        <p>Email: tubanovel@gmail.com</p>
        <p>SDT: 0343561287</p>
        <p>Fb: facebook.com/meowwnovel</p>
    </div>

    <div class="fb-viti">
        <div class="fb-page" data-href="https://www.facebook.com/meowwnovel" data-tabs data-width data-height
            data-small-header="false" data-adapt-container-width="false" data-hide-cover="false"
            data-show-facepile="true" data-lazy="true">
            <blockquote cite="https://www.facebook.com/meowwnovel" class="fb-xfbml-parse-ignore"><a
                    href="https://www.facebook.com/meowwnovel">Meow
                    Novel</a></blockquote>
        </div>
    </div>

    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15335.863656428448!2d108.15811918608401!3d16.067258500707286!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31421906501f5edf%3A0xd80935dfa1dcebd0!2zS8O9IHTDumMgeMOhIHBow61hIHTDonk!5e0!3m2!1sen!2s!4v1679823618387!5m2!1sen!2s"
        width="45%  " height="500" style="border:0;" allowfullscreen loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>

<form action Method=”get” name="myform" onsubmit="return checkform()">
    <fieldset>
        <legend>Form</legend>
        <div class="fm-gp">
            <label>Họ và tên: <br>
                <input type="text" class="fm-cl" id="hovaten" name="hovaten"
                    placeholder="Không bắt buộc là tên thật...">
            </label><br>
        </div>
        <div class="fm-gp">
            <label>Email: <br>
                <input type="text" class="fm-cl" id="email" name="email"
                    placeholder="Chúng tôi sẽ phản hồi lại cho bạn qua địa chỉ này...">
            </label><br>
        </div>
        <div class="fm-gp">
            <label>Nội dung: <br>
                <textarea id="textnote" name="textnote" class="fm-cl" cols="30" rows="10"
                    placeholder="Nhập nội dung liên hệ của bạn ở đây..."></textarea>
            </label><br>
        </div>
        <div id="checkform"></div>
        <div class="fm-gp">
            <button type="submit" class="fm-bn">Gửi</button>
            <button type="reset" class="fm-bn">Nhập lại</button>
        </div>
    </fieldset>
</form>
<!-- footer  -->
<?php include "layout/footer.php"; ?>
<!-- End footer  -->

<script>
    function checkform() {
        var name = document.myform.hovaten.value;
        var email = document.myform.email.value;
        var note = document.myform.textnote.value;

        if (name == "" || name == null) {
            message("Vui lòng điền họ và tên!!");
            return false;
        }

        if (email == "") {
            message("Vui lòng điền email!!");
            return false;
        }

        if (note == "") {
            message("Vui lòng nhập nội dung!!");
            return false;
        }
    }

    function message(m) {
        document.getElementById("checkform").innerHTML = m;
    }

    function chekEmail(e) {
        return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
            .test(e);
    }
</script>