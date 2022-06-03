<?php
	include_once("DataProvider.php");
    session_start();
    $matk=$_SESSION['MaTK'];
	$sql = "select * from taikhoan where matk = ".$matk;
	$result = DataProvider::ExecuteQuery($sql);
	$row = mysqli_fetch_assoc($result);
	if(isset($_REQUEST['btnLuu'])){
		$MaTK = $_REQUEST['txtMaTK'];
		$TenTK = $_REQUEST['txtTenTK'];
		$DiaChi = $_REQUEST['txtDiaChi'];
		$SDT = $_REQUEST['txtSDT'];
		$Email = $_REQUEST['txtEmail'];
		$sql = "update taikhoan set tentk = '$TenTK', diachi='$DiaChi', sdt='$SDT',email='$Email' where matk =".$matk;

        $result = DataProvider::ExecuteQuery($sql);

	}
?>
<html>
<head>

    <title></title>

    <link href="CSS.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="dropdownt.js"></script>
   
    <script src="ckeditor/ckeditor.js"></script>
    <script src="ckfinder/ckfinder.js"></script>
  
    <style type="text/css">
        .auto-style6 {
            width: 372px;
        }
        .auto-style8 {
            width: 654px;
        }
        .auto-style10 {
            width: 372px;
            color: #499C4D;
        }
        .auto-style11 {
            color: #499C4D;
            
        }
        .auto-style14 {
            width: 100%;
            height: 153px;
        }
        .auto-style39 {
            height: 18px;
            text-align: center;
        }
        .auto-style40 {
            height: 5px;
            text-align: center;
        }
        .auto-style42 {
            height: 15px;
            text-align: center;
        }
        .auto-style43 {
            width: 226px;
            margin: 5px;
            padding: 5px;
        }
        .auto-style44 {
            color: #006600;
        }
        .auto-style45 {
            width: 654px;
            height: 29px;
        }
        .auto-style46 {
            height: 29px;
        }
        .auto-style48 {
            color: #009933;
        }
        .auto-style49 {
            color: #009900;
        }
        </style>

</script> 
</head>

<body>
<?php 
        
       $matk=$_SESSION['MaTK'];
       $TenKH=$_SESSION['TenKH'];
       

        if(empty($_SESSION['MaTK'])) //  ko có tk
        {
            
            echo "<style>.lbTenDN{display:none } .hpDX{ display:none}</style>";
        }
        else //có tk
        {
            
            echo "<style>.lbTenDN{display:block} .hpDN { display:none} .hpDK{ display:none} </style>";
            
        }
        ?>
    <form id="form1" runat="server" autocomplete="off">
        <div class="container">
  <div class="header">
    
    
      <table style="width:100%;">
          <tr class="dndk">
                 

              
              <td class="auto-style6" rowspan="2">&nbsp;&nbsp;&nbsp;&nbsp; <img alt="banner" class="banner" src="Anh/logo.png" />&nbsp;</td>
              <td class="auto-style45" ></td>
              <td class="auto-style46"><strong>
                  <span class="auto-style44">
                      <a class="hpDN" runat="server" href="DangNhap.php"><span class="auto-style48">Đăng nhập</span></a>
                      <!--<Label class="lbTenDN" class="auto-style49" >Xin Chào:</Label>-->
                  <a class="hpTenDN" runat="server" href="QuanLiThongTin.php">
                    <?php if(empty($_SESSION['MaTK'])) echo $TenKH; else echo $TenKH;?>
                  </a>
                  </span>
                  <span class="auto-style48">|</span><span class="auto-style44"><a href='XuLy/XulyDangXuat.php' class="hpDX" runat="server"   class="auto-style48">Đăng Xuất</a>
&nbsp;<a class="hpDK" runat="server"  href="DangKy.php"><span class="auto-style48">Đăng Kí</span></a>
                  </span>
                  </strong></td>
              
          </tr>
          <tr>
              <td class="search" style="width: 654px" >
                  <asp:TextBox ID="tbNDTimKiem" runat="server"></asp:TextBox>
            
                  <asp:Button ID="btnTimKiem" runat="server" CssClass="btnDat" Height="40px"  Text="Tìm" Width="72px"  />
            
              </td>
              <td class="giohang" ><a href="../../GioHang.php"><i class="fa fa-shopping-cart"></i><span class="auto-style11"><strong>Giỏ hàng</strong></span></a>
                  <!--<div class="minicart">
                      <ul class="minicart-sanpham">
                          <li><a href="#"><img src="Anh/logo.png" width="30" height="30" />Sản phẩm 1</a><button><i class="fa fa-close"></i></button></li>
                          <li><a href="#"><img src="Anh/logo.png" width="30" height="30" />Sản phẩm 2</a><button><i class="fa fa-close"></i></button></li>
                      </ul>
                      <div class="xem"><a href="#">Xem chi tiết</a></div>
                  </div>-->
                  <asp:Label ID="lbTongThanhTien" runat="server"></asp:Label>
              </td>
          </tr>
          <tr>
              
              <td class="auto-style10">&nbsp;</td>
              <td class="auto-style8">&nbsp;</td>
              <td>&nbsp;</td>
          </tr>
      </table>
    
    
  </div>
  <div class="menu">
    
        
<ul>
     <li><a href="Default.php">Trang Chủ</a></li>
      <li><a href="GioiThieu.php">Giới thiệu</a></li>
      <li><a href="#">Cây cảnh</a>
        <ul class="submenu">
        <?php
                                
                                $connection= mysqli_connect("localhost", "root", "", "webcaycanh"); 
                                $sql1="sELECT  * from loaisanpham";
                                mysqli_query($connection,"set names 'utf8'");
                                $query1=mysqli_query($connection,$sql1);
                                while($data1= mysqli_fetch_array($query1))
                                {    
                                    $link = "TheLoaiSanPham.php?MaLoaiSP=".$data1['MaLoaiSP'];
?>
                    <li style="text-align: left; padding-left: 20px">
                        <a   href='<?php echo $link; ?>' class="TenDSSP"><?php echo $data1['TenLoaiSP']; ?></a></li>
                    <br />
                   <?php } ?>
          
        </ul>
      </li>
      
      <li><a href="TinTuc.php">Blog - Tin tức</a></li>
      <li class="auto-style12"><a href="HoTroLienHe.php">Hỗ trợ - Liên hệ</a></li>
        
        
        
        </ul>
    
    
  </div>
            
 
  <div class="container content">
      
    <div class="leftmain">
    	<div class="Danhsach">
        <div class="leftthongtin">
        <table style="width: 100%; height: 178px;">
            <tr>
                <td class="tieude phantrang" style="height: 43px"><strong>Quản lí tài khoản</strong></td>
            </tr>
            <tr>
                <td style="text-align: left;">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="QuanLiThongTin.php">Thông tin tài khoản</a>
                </td>
            </tr>
            
            <tr>
                <td style="text-align: left; height: 33px;">
                	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="DoiMatKhau.php">Đổi mật khẩu</a>
                </td>
            </tr>
            
            <tr>
                <td style="height: 28px; text-align: left;" >
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="#">Quản lý giỏ hàng</a>
                </td>
            </tr>
            
            <tr>
                <td style="text-align: left">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="#">Quản lý bài viết</a>
                </td>
            </tr>
        </table>
    </div>
      </div>
    </div>
    <div class="rightmain">
    <form name="form1" method="post" action="ThongTinTaiKhoan.php">
     <table style="height: 400px;" class="nav-justified">
        <tr>
            <td class="text-center" colspan="2">
                <caption class="text-center"></caption>
            </td>
        </tr>
                    <span style="font-size: xx-large;text-align:center">
                    <strong>&nbsp;<br />
                    Thông Tin Tài Khoản</strong></span><tr>
            <td class="text-left" style="height: 46px; width: 124px"><strong>&nbsp;&nbsp;&nbsp; Mã TK</strong>&nbsp;&nbsp; <strong>&nbsp;</strong></td>
            <td style="height: 46px" class="auto-style46">
                <input id="txtMaTK" name="txtMaTK" type="text" required value="<?php echo $row['MaTK']?>" style="height:32px;width:204px;">
            </td>
        </tr>
        <tr>
            <td class="text-left" style="height: 37px; width: 124px"><strong>&nbsp;</strong><b>&nbsp;&nbsp; </b><strong>Tên KH</strong></td>
            <td style="height: 37px">
                <input id="txtTenTK" name="txtTenTK" type="text" value="<?php echo $row['TenTK']?>" id="TenKH" style="height:32px;width:204px;">
            </td>
        </tr>
        <tr>
            <td class="modal-sm" style="width: 124px; text-align: left; height: 75px;"><strong>&nbsp;&nbsp;&nbsp; Địa Chỉ</strong>&nbsp;&nbsp;&nbsp; </td>
            <td style="height: 75px" class="auto-style46">
                <input id="txtDiaChi" name="txtDiaChi" type="text" value="<?php echo $row['DiaChi']?>" id="DiaChiKH" style="height:32px;width:204px;">
            </td>
        </tr>
        <tr>
            <td class="modal-sm" style="width: 124px; text-align: left; height: 53px;"><strong>&nbsp;&nbsp;&nbsp; S</strong><span style="font-weight: bold">DT</span></td>
            <td style="height: 53px">
                <input id="txtSDT" name="txtSDT" type="text" value="<?php echo $row['SDT']?>" id="SDTKH" style="height:32px;width:204px;">
   
                
                
   
                
            </td>
            
        </tr>
        <tr>
            <td class="modal-sm" style="width: 124px; text-align: left; height: 26px;"><strong>&nbsp;&nbsp;&nbsp; Email</strong>&nbsp; &nbsp;<strong> </strong></td>
            <td style="height: 26px">
               <input id="txtEmail" name="txtEmail" type="text" value="<?php echo $row['Email']?>" id="EmailKH" style="height:32px;width:204px;">
            </td>
        </tr>
        <tr>
            <td class="modal-sm" style="width: 124px; text-align: left; height: 120px;"></td>
            <td style="height: 120px">
                <input id="btnLuu" type="submit" name="btnLuu" value="Lưu" id="btnLuu" class="btnDat">
            </td>
        </tr>
    </table>
    </form>
       
   
    </div>
      

  </div>
  <form>
  <div class="footer"> 
      <table class="auto-style14">
          <tr>
              <td class="auto-style40">Địa chỉ: Đường Lê Chí Dân, phường Tương Bình Hiệp, TP. Thủ Dầu Một, Tỉnh Bình Dươngcanh@gmail.com</td>
          </tr>
          <tr>
              <td class="auto-style42">SĐT: 0903000063</td>
          </tr>
          <tr>
              <td class="auto-style39">Copyright @ 2020 @ by TTT . All right reserved.</td>
          </tr>
      </table>
            </div>
</div>
        
    </form>
   
</body>
</html>
