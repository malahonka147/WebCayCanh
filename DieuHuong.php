<?php
    if(isset($_GET['thamso'])){$tham_so=$_GET['thamso'];}else{$tham_so="";}
    switch($tham_so)
    {
        case "xuat_san_pham":
            include("ChiTietSanPham.php");
        break;
        
    }
?>