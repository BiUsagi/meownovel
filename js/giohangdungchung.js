document.getElementById("storeee").style.display = "none";
function show(){
    var xx = document.getElementById("storeee");
    if(xx.style.display == "block"){
        xx.style.display = "none";
    }
    else{
        xx.style.display = "block";
    }
    showmcart();
}


var giohang = new Array();
function themvaogiohang(a){
    var boxsp = a.parentElement.parentElement.children;
        var xx = document.getElementById("storeee");
        if(xx.style.display == "block"){
            xx.style.display = "none";
        }
    
        alert("THÊM SẢN PHẨM THÀNH CÔNG!");
        // console.log(boxsp);
    
        var anh = boxsp[1].parentElement.childNodes[3].childNodes[0].src;
        var ten = boxsp[2].parentElement.childNodes[5].childNodes[0].text;
        var gia = boxsp[10].value;
        var soluong = boxsp[9].parentElement.childNodes[19].value;
    
        if(kiemtrasptrung(ten)>=0){
            capnhatsl(kiemtrasptrung(ten));
        }
        else{
            var sp = new Array(anh, ten, gia, soluong);
            giohang.push(sp);
        }
    
        
        document.getElementById("sto-trong").classList.add("none1");
        showsoluong();
    
        // luu gio hang
        sessionStorage.setItem("giohang", JSON.stringify(giohang));
    
}    


function kiemtrasptrung(x){
    let vitri = -1;
    for (let i = 0; i < giohang.length; i++) {
        if(giohang[i][1] == x){
            vitri = i;
            break;
        }
    }
    return vitri;
}
function capnhatsl(vt){
    for (let i = 0; i < giohang.length; i++) {  
        if(i == vt){
            giohang[i][3] = Number(giohang[i][3]);
            giohang[i][3] += 1;
            break;
        }
    }
}

function showsoluong(){
    document.getElementById("slsanpham").innerHTML = giohang.length;
}


function showmcart(){
    var ttgh = "";
    var tong = 0;
    var tongt = "";
    for (let i = 0; i < giohang.length; i++) {
        var thanhtien = giohang[i][2] * giohang[i][3];
        tong+=thanhtien;
        ttgh +=  '<div id="ds-sp">'+
        '<div id="sto-anh"><img src="'+ giohang[i][0] +'" alt=""></div>' +
        '<div id="sto-ten">'+ giohang[i][1] +'</div>'+
        '<div id="sto-sl">'+ giohang[i][3] +'</div>'+
        '<div id="sto-gia">'+ thanhtien.toFixed(3) +'₫</div>'+
        '<div style="clear: both;"></div> '+
        '</div>';
    }
    tongt += tong.toFixed(3) + '₫'

    document.getElementById("sto-thongtinchitiet").innerHTML = ttgh;
    
    document.getElementById("tong-tien").innerHTML = tongt;
}
   
function themspvaogio(x){
    var xx = document.getElementById("storeee");
    if(xx.style.display == "block"){
        xx.style.display = "none";
    }
    var chitietsp = x.parentElement.children;
    alert("THÊM SẢN PHẨM THÀNH CÔNG!");

    var anh = chitietsp[1].src;
    var ten = chitietsp[2].childNodes[1].innerHTML;
    var gia = chitietsp[2].childNodes[13].value;
    var soluong = chitietsp[4].childNodes[5].value;

    console.log(gia);


    if(kiemtrasptrung(ten)>=0){
        capnhatsl(kiemtrasptrung(ten));
    }
    else{
        var sp = new Array(anh, ten, gia, soluong);
        giohang.push(sp);
    }

    document.getElementById("sto-trong").classList.add("none1");
    showsoluong();

    // luu gio hang
    sessionStorage.setItem("giohang", JSON.stringify(giohang));
}
