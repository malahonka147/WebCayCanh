<?php
    include("DieuHuong.php");
?>
<html>
<head runat="server">

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
        session_start();
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
                <div class="tieude">
                    <button class="dropdown-btn">
                        <i class="fa fa-bars" aria-hidden="true"></i>Danh mục sản phẩm
                    </button>
                </div>
                <div class="danhmuc">
                    <div class="dropdown-container">
                        <div ID="Danhmuc">
                            
                                
                                <?php
                                
                                $connection= mysqli_connect("localhost", "root", "", "webcaycanh"); 
                                $sql1="sELECT  * from loaisanpham";
                                mysqli_query($connection,"set names 'utf8'");
                                $query1=mysqli_query($connection,$sql1);
                            echo "<table style='color:#4B4B4B;font-weight:normal;font-style:normal;text-decoration:none;width:245px;border-collapse:collapse;font-family: Tahoma, Geneva, sans-serif;'>";
                            $i=1;
                            while($data1= mysqli_fetch_array($query1))
                            {
                                echo "<tr>";
                                $link1="?MaLoaiSP=".$data1['MaLoaiSP'];
                                $i++;
                                if($i%2==0)
                                {
                                    echo "<td style='list-style-type: none;background-color:#BADE8F;";
                                }
                                else echo "<td style='list-style-type: none;background-color:White;";
                                
                                echo "height:40px'><a ID='DanhMucSP'  href='TheLoaiSanPham.php$link1' style=' margin:20px;' class='TenDSSP'>"; 
                                echo $data1['TenLoaiSP'];
                                echo "</a></td></tr>";
                                
                                
                            }
                            echo "</table>";
                            ?>
                                
                                
                            </div>
                    </div>
                </div>
            </div>
            <div class="Danhsacha">
                <div class="tieude">
                    <i class="fa fa-bars" aria-hidden="true"></i><span>Tin tức mới nhất</span></div	>
                <div class="tintuc">
                <?php
                    $connection= mysqli_connect("localhost", "root", "", "webcaycanh"); 
                    $sql5="sELECT  MaBlog, HinhAnh, NgayDang,TieuDe, TTND FROM BLOG order by NgayDang desc limit 2;";
                    mysqli_query($connection,"set names 'utf8'");
                    $query5=mysqli_query($connection,$sql5);
                    
                    echo "<table style='border-collapse:collapse;'>";
                    
                    while($data5= mysqli_fetch_array($query5))
                    {
                        
                        echo "<tr ><td><div class='auto-style43'><div>";     
  
                                $link_anh2="Anh/Blog/".$data5['HinhAnh']; 
                                
                                $link2="?thamso=xuat_san_pham&id=".$data5['MaBlog'];
                                ?>
                                
                                        <a href='ChiTietTinTuc.php<?php echo $link2; ?>'><img class='anh' src='<?php echo $link_anh2?>' style="height:151px;width:216px;margin-right: 0" ></a>
                                    </div>
                                <div class="kc"><strong>
                                    
                                        <a  class="Link" href='ChiTietSanPham.php<?php echo $link2;?>'  style="color: #009900"><?php echo $data5['TieuDe']; ?></a>
                                        </strong>
                                    </div>
                                <div class="kc">
                                <a href='ChiTietTinTuc.php<?php echo $link2; ?>' style="text-decoration:none;color: #999999; font-size: small" ><?php echo $data5['TTND']; ?></a>
                                 </div>
                                 </div></br></td>       
                                </tr>
                               
                        
                              <?php  
                    }
                   
                    echo "</table>";
                    mysqli_close($connection);
                ?>
                </div>
            </div>
       
        
    </div>
    <div class="rightmain">
        <div class="sphot">
        <div class="Danhsachsp">
            Sản phẩm bán chạy</div>


                <?php
                    $connection= mysqli_connect("localhost", "root", "", "webcaycanh"); 
                    $sql="sELECT  LOAISANPHAM.TenLoaiSP, SANPHAM.TenSP, SANPHAM.HinhAnh, SANPHAM.TienSP, SANPHAM.MaSP, LOAISANPHAM.MaLoaiSP, SANPHAM.SoLuongBan FROM LOAISANPHAM INNER JOIN SANPHAM ON LOAISANPHAM.MaLoaiSP = SANPHAM.MaLoaiSP ORDER BY SANPHAM.SoLuongBan desc limit 4;";
                    mysqli_query($connection,"set names 'utf8'");
                    $query=mysqli_query($connection,$sql);
                    
                    echo "<table class='auto-style3' ><tr >";
                    
                    while($data= mysqli_fetch_array($query))
                    {
                        
                        echo "<td><div><table>";     
  
                                $link_anh="Anh/CayCanh/".$data['HinhAnh']; 
                                
                                $link="?thamso=xuat_san_pham&id=".$data['MaSP'];
                                
                                ?>
                                <tr>
                                    <td>
                                        <a href='ChiTietSanPham.php<?php echo $link; ?>'><img class='anh' src='<?php echo $link_anh?>' style='width:244px;Height:267px' ></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: center"><strong>
                                        <a ID="TenSP" class="tenSP" href='ChiTietSanPham.php<?php echo $link;?>'  Width='139px'><?php echo $data['TenSP']; ?></a>
                                        </strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: center">
                                        <span ID="Label1"  style="color: #FF0000"  ><?php echo $data['TienSP']; ?></span>
                                        <span style="color: #FF0000">VNĐ</span><br />
                                    </td>
                                </tr></table>
                                </div>
                            </td>
                        
                              <?php  
                    }
                   
                    echo "</tr></table>";
                    mysqli_close($connection);
                ?>
               
                

            
            
    </div>
        <div class="Danhsachsp">
            Danh sách sản phẩm</div>
            

            <?php
                    $connection= mysqli_connect("localhost", "root", "", "webcaycanh"); 
                    $sql3="sELECT LOAISANPHAM.TenLoaiSP, SANPHAM.TenSP, SANPHAM.HinhAnh, SANPHAM.TienSP, SANPHAM.MaSP, LOAISANPHAM.MaLoaiSP FROM LOAISANPHAM INNER JOIN SANPHAM ON LOAISANPHAM.MaLoaiSP = SANPHAM.MaLoaiSP order by Sanpham.MaSP asc";
                    mysqli_query($connection,"set names 'utf8'");
                    $query=mysqli_query($connection,$sql3);
                    
                    echo "<table style='width:997px;border-collapse:collapse;' ><tr >";
                    
            
                    while($data= mysqli_fetch_array($query))
                    {
                        
                        echo "<td><div class='blognd' style='width: 321px'>";
            
                         echo "<table class='auto-style3' ><tr >";

                        $link_anh="Anh/CayCanh/".$data['HinhAnh']; 
                        
                        $link="?thamso=xuat_san_pham&id=".$data['MaSP'];
                       ?>

                       <td class="auto-style7" rowspan="3">
                        <a href='ChiTietSanPham.php<?php  echo $link; ?>'><img class='anh' src='<?php echo $link_anh?>' style='height:207px;width:170px;' ></a>
                       </td>
                       <td class="auto-style12" >
                            <strong><a ID="TenSP" class="tenSP" href='ChiTietSanPham.php<?php echo $link;?>'  Width='139px'><?php echo $data['TenSP']; ?></a></strong>
                       </td></tr>
                       <tr>
                       <td><span class="auto-style5"><strong>Giá:</strong></span><span class="auto-style11" style="color: #FF0000"> <?php echo $data['TienSP']; ?></span></td></tr>
                       <tr><td class="auto-style10">
                       <a  class="btnDat" href='Giohang.php<?php echo $link;?>'  >Đặt Hàng</a>
                       </td>
                       </tr>
                       </table></div></td>
                       <?php
                       
                    }
                   
                    echo "</tr></table>";
                    mysqli_close($connection);
                ?>
            </div>

    
      
    </div>
  </div>
  <div class="footer"> 
      <table class="auto-style14">
          <tr>
              <td class="auto-style40">Địa chỉ: Đường Lê Chí Dân, phường Tương Bình Hiệp, TP. Thủ Dầu Một, Tỉnh Bình Dương webcaycanh@gmail.com</td>
          </tr>
          <tr>

              <td class="auto-style42">SĐT: 0903000063</td>
          </tr>
          <tr>
              
              <td class="auto-style39">
                  
                  <asp:Label ID="lbDangOnline" runat="server"></asp:Label>
                  
                  <br />Copyright @ 2020 @ by TTT . All right reserved.</td>
          </tr>
      </table>
            </div>
</div>
        
    </form>
   
</body>
</html>
