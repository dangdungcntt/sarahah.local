<?php
	session_start();
	require_once './class/split.php';
	require_once 'connect.php';
	$userid = $_SESSION['id'];
	$idMess = $_GET['message-id'];

	$query = "select content from message where idreceive = $userid and id = $idMess";
	$result = $conn->query($query);
	
	$string = $result->fetch_assoc()['content'];

	
	$im = ImageCreateFromJpeg("./img/share/a.jpg"); // Link ảnh gốc
	
	

	$soChuMotDong = 15;
	$arrRuleText = splitStringToMultiLine($string, $soChuMotDong);

	$pxX = 100; // Tạo độ X của chữ
	$pxY = 210; // Tạo độ Y của chữ
	$fontsize = "18"; // Cỡ chữ

    $kichThuocMotChu = 11;

	$color = ImageColorAllocate($im, 0, 0, 0); // Màu chữ
	$font = __DIR__ . "./font/arial.ttf"; // Font chữ

	foreach ($arrRuleText as $line) {
	    ImagettfText(
	        $im, $fontsize, 0,
	        getStartPoint($line, $kichThuocMotChu, 500),
	        $pxY, $color, $font, $line);
	    $pxY += 30;
	}
	$imgName = "./img/share/Message-" . $userid  . "-" . $idMess . ".png";
	// echo $imgName;
	// die();
	imagePng($im,$imgName); // Tiến hành tạo file ảnh mới có tên 66.png và cho chữ rõ hơn hàm imagejpeg()
	 // Gọi kết quả
	ImageDestroy($im);
	$imgLink = urlencode("https://chát.vn/action/share.php?img=$userid-$idMess");
	header("Location: https://www.facebook.com/share.php?u=$imgLink");
?>