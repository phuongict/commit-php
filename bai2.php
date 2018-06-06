<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Đăng ký Tour du lịch</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="430" border="1">
    <tr>
      <td width="197"><div  align="center">Họ tên KH
        <label></label>
      </div >      </td>
      <td width="217"><input name="ten" type="text" id="ten" /></td>
    </tr>
    <tr>
      <td><div align="center">SĐT
      </div >        <label></label></td>
      <td><input name="sdt" type="text" id="sdt" /></td>
    </tr>
    <tr>
      <td><div align="center">Tour
      </div>        <label></label></td>
      <td><select name="Tour">
        <option value="1">Hà Nội - Đà Nẵng</option>
        <option value="2">Hà Nội - TP.Hồ Chí Minh</option>
        <option value="3">Hải Phòng - Phú Quốc</option>
        <option value="4">Hải Dương - Điện Biên</option>
            </select></td>
    </tr>
    <tr>
      <td><div align="center">Số khách
      </div>        <label></label></td>
      <td><input name="sokhach" type="text" id="sokhach" /></td>
    </tr>
    <tr>
      <td><div align="center">Phương tiện </div></td>
      <td><p>
          <input name="phuongtien" type="radio" value="oto" />
        Xe oto</p>
        <p>
          <label>
          <input name="phuongtien" type="radio" value="tauhoa" />
          </label> 
        Tàu hỏa</p>
        <p>
          <label>
          <input name="phuongtien" type="radio" value="maybay" />
          </label> 
      Máy bay</p></td>
    </tr>
    <tr>
      <td><div align="center">Thời gian đi </div></td>
      <td><label>
        <select name="thoigian">
          <option value="1">Tháng 1</option>
          <option value="2">Tháng 2</option>
          <option value="3">Tháng 3</option>
          <option value="4">Tháng 4</option>
          <option value="5">Tháng 5</option>
          <option value="6">Tháng 6</option>
          <option value="7">Tháng 7</option>
          <option value="8">Tháng 8</option>
          <option value="9">Tháng 9</option>
          <option value="10">Tháng 10</option>
          <option value="11">Tháng 11</option>
          <option value="12">Tháng 12</option>
        </select>
      </label></td>
    </tr>
    <tr>
      <td><div align="center">Bạn biết đến công ty qua </div></td>
      <td><label>
        <input name="thongtin" type="checkbox" id="thongtin" value="Báo chí" />
      Báo chí<br />
      <input name="thongtin" type="checkbox" id="thongtin" value="internet" /> 
      Internet<br />
      <input name="thongtin" type="checkbox" id="thongtin" value="Người giới thiệu" /> 
      Người giới thiệu
</label></td>
    </tr>
    <tr>
      <td colspan="2"><label>
        <div align="center">
          <input type="submit" name="ok" value="Đăng ký" />
          </div>
      </label></td>
    </tr>
  </table>
</form>

<?php
if(isset($_POST['ok'])){
if(!is_numeric($_POST['sdt']))
	{
		echo "SĐT là so";
		return;
	}
if($_POST['sokhach']<1)
{
	echo "Số khách phải lớn hơn 0";
	return;
}
	$tour = array();
	switch($_POST['Tour']){
		case 1:
			$tour['tien'] = 2000000;
			$tour['ten'] = 'Hà Nội - Đà Nẵng';
			break;
		case 2:
			$tour['tien'] = 3000000;
			$tour['ten'] = 'Hà Nội - TP.Hồ Chí Minh';
			break;
		case 3:
			$tour['tien'] = 4000000;
			$tour['ten'] = 'Hải Phòng - Phú Quốc';
			break;
		case 4:
			$tour['tien'] = 5000000;
			$tour['ten'] = 'Hải Dương - Điện Biên';
			break;
	}
	echo "Họ tên KH là:".$_POST['ten']."</br>";
	echo "SĐT:".$_POST['sdt']."</br>";
	echo "Tour:".$tour['ten']."</br>";
	echo "Số khách:".$_POST['sokhach']."</br>";
	echo "Phương tiện:".$_POST['phuongtien']."</br>";
	echo "Thời gian đi: tháng ".$_POST['thoigian']."</br>";
	echo "Bạn biết thông tin qua:".$_POST['thongtin']."</br>";
	echo "Tien phai trả là: ";
	$tien = $tour['tien'];
	if($_POST['thoigian']==5||$_POST['thoigian']==6||$_POST['thoigian']==7)
	{
		$tien *=2;
	}
	echo number_format($tien).'vnd';
}
?>
</body>
</html>
