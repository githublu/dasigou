<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DasiDog.us</title>
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Comfortaa" />
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="styles.css" type="text/css" />
<!--
respo, a free CSS web template by ZyPOP (zypopwebtemplates.com/)

Download: http://zypopwebtemplates.com/

License: Creative Commons Attribution
//-->
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
</head>
<?php
  require_once('library.php');
  require_once('function.php');
  $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
  $con->query("SET time_zone='-4:00'");
  $tab = $_POST['tab'];
  if($tab == 'item' && $_POST['email'] != "")
  {
    $cate = replace($_POST['cate']);
    $name = replace($_POST['name']);
    $price = replace($_POST['price']);
    $des = replace($_POST['desc']);
    $email = replace($_POST['email']);
    $phone = replace($_POST['phone']);
    $seller  = replace($_POST['seller']);
    $time = time();
//file upload
    if(basename($_FILES["fileToUpload"]["name"]) !="")
    {
        $target_dir = "./images/";
        $image_name = $target_dir.$time.str_replace(' ', '_', basename($_FILES["fileToUpload"]["name"]));
        $destination = $target_dir.$time.".jpg";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            echo $check;
            if($check !== false) {
                $uploadOk = 1;
            } else {
            	echo "check is wrong";
                $uploadOk = 0;
            }
        }
    // Check if file already exists
        // if (file_exists($target_file)) {
        //     echo "<h2>Sorry, file already exists.</h2>";
        //     $uploadOk = 0;
        // }
    // Check file size
        if ($_FILES["fileToUpload"]["size"] > 5000000) {
           	#echo "<h2>Sorry, your file is too large.</h2>";
            $uploadOk = 0;
        }
    // Allow certain file formats
        $imageFileType = strtolower($imageFileType);
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
           #echo "<h2>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</h2>";
            $uploadOk = 0;
        }
    // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            #echo "<h2>Sorry, your file was not uploaded.</h2>";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $image_name)) {
            	$d = compress($image_name, $destination, 60);
               #echo "<h2>The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.</h2>";
            } else {
                echo "<h2>Sorry, Your image is larger than 2m. Please resize it to below 2m and upload again.</h2>";
            }
        }
            $path = $d;
    }
// end of file upload

        $con->query("INSERT INTO item (name,cate,price,des,email,phone,timing,path,seller,rand)
          VALUES ('$name', '$cate', '$price','$des', '$email', '$phone',(select NOW()), '$path', '$seller','$time')");
  }

  if($tab == 'info')
  {
    $story = replace($_POST['story']);
    $title = replace($_POST['title']);
    $path = '';
   $con->query("INSERT INTO story (story,timing,path,title,rand)
      VALUES ('$story', (select NOW()), '$path', '$title','$time')");

  }
?>
<body>
<div id="container">
  <header>
  <div class="width">
        <h1><img id="imageresource" src="./uploads/logo.png" style="height: 107px;"><a href="/" style="text-transform: none;">DasiDog.us</a></h1>
        </div>
    </header>
    <nav>
  <div class="width">
        <ul>
            <li class="selected"><a href="index.php">Back to Home</a></li>
          </ul>
  </div>
    </nav>

    <div id="body" class="width" style="width:100%">
    
        <section id="content">
        <?php 
          if($_POST['email'] != "")
          {
        ?>
      <article>
            <h3>Thank you for posting! <?php echo $seller;?></h3>
              <br>
              <div class="alert alert-warning" role="alert">
              <h2>Use the following link to delete your post after your item is sold.</h2><br>
              <h4><a><?php echo "www.dasidog.us/cancel.php?id=".$con->insert_id."&cate=".$tab."&key=".md5($time); ?></a></h4>
              </div>
          </article>
        <?php 
          }
          else {
            ?>
          <article>
            <h3>Sorry, we cannot process you post</h3>
              <br>
              <div class="alert alert-warning" role="alert">
              <h2>The email address cannot be empty. Please check and post again. Thank you</h2><br>
              </div>
          </article>
            <?php
          }
        ?>
        </section>
      <div class="clear"></div>
    </div>
    <footer>
        <div class="footer-bottom">
            <p>By Yi Lu - yilu331@gmail.com</p>
            <p>Welcome first years and farewell fourth years</p>
         </div>
    </footer>
</div>
<?php



  require 'PHPMailer-master/class.phpmailer.php';
  require 'PHPMailer-master/PHPMailerAutoload.php';
  $mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'dasidog.us@gmail.com';                 // SMTP username
$mail->Password = '3!forever';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;   
// echo (extension_loaded('openssl')?'SSL loaded':'SSL not loaded')."\n";                                 // TCP port to connect to
//$mail->SMTPDebug = 3;
$mail->From = 'dasidog.us@gmail.com';
$mail->FromName = 'DasiDog.us';
$mail->addAddress($email, $seller);     // Add a recipient

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = "Thank you for posting ".$name." at DasiDog.us";
$mail->Body    = "Thank you for posting ".$name." at DasiDog.us<br>Keep this link to delete your post after your item is sold.<br> www.dasidog.us/cancel.php?id=".$con->insert_id."&cate=".$tab."&key=".md5($time);
$mail->AltBody = "Thank you for posting ".$name." at DasiDog.us  Keep this link to delete your post after your item is sold.  www.dasidog.us/cancel.php?id=".$con->insert_id."&cate=".$tab."&key=".md5($time);
if(!$mail->send()) {
    //echo 'Message could not be sent.';
    //echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    //echo 'Message has been sent';
}

?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-61555440-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>
