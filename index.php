<html>
<head> <title> Form ve dosya yükleme işlemleri </title> 
</head>
<body>
<form enctype="multipart/form-data" action="index.php" method="POST">
Kullanıcı adı: <br>
<input type="text" name="kadi">
<br>
E-posta:<br>
<input type="email" name="eposta">
<br>
Dosya seçiniz: <input type="file" name="dosya">
<br> <br>
<input type="submit" value="Yukle ve Gönder">
</form>


<?php
error_reporting(0); 

//adsoyad-eposta bölümü
if($_POST['kadi'] and $_POST['eposta']){
	
	$kadi=$_POST['kadi'];
	$eposta=$_POST['eposta'];
	echo "<b>ad soyad: </b>".$kadi."<br>";
	echo "<b>eposta: </b>".$eposta."<br>";
	}


//cv yükleme bölümü
$uzanti=$_FILES["dosya"]["type"];
$dosya_uzantisi=substr ($uzanti,-4,4);
$dizin = "yuklenendosyalar/";
$dosya_yolu =$dizin.basename($_FILES['dosya']['name']);
 
 if($uzanti=="application/pdf") {
	 if (is_uploaded_file ($_FILES["dosya"]["tmp_name"])){ 
		if (move_uploaded_file($_FILES['dosya']['tmp_name'],$dosya_yolu)) {    
		  echo "CV dosyanız başarıyla yüklendi.<br>";
		 } else {
			echo "Dosya yüklenemedi!<br>";
	 }
   } else {
      echo "Dosya taşımada hata!<br> ";
  }
 } else {
echo "Uzantı pdf olmalıdır!<br>";
} 

?>

</body>
</html>







