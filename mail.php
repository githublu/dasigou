<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DasiDog.us</title>
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
<script>
$(function () {
  $('[data-toggle="popover"]').popover()
})
</script>
</head>

<body>
<div id="container">
  <header>
    <div class="width">
            <h1><a href="/">DasiDog.us</a></h1>
        </div>
    </header>
    <nav>
    <div class="width">
          <ul>
                <li class="selected"><a style="text-transform: none;" href="index.php">Back to Home</a></li>
            </ul>
    </div>
    </nav>

    <div id="body" class="width" style="width:100%">
        
        <section id="content">

        <article>
<?php
  require_once('library.php');
  require_once('function.php');
  $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);

  require 'PHPMailer-master/class.phpmailer.php';
  require 'PHPMailer-master/PHPMailerAutoload.php';
  $mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output
$word = "asdsad";
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'dasidog.us@gmail.com';                 // SMTP username
$mail->Password = '3!forever';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;   
 echo (extension_loaded('openssl')?'SSL loaded':'SSL not loaded')."\n";                                 // TCP port to connect to
//$mail->SMTPDebug = 3;
$mail->From = 'dasidog.us@gmail.com';
$mail->FromName = 'Mailer-Yi Lu';
$mail->addAddress('yl4px@virginia.edu', 'Yi Lu');     // Add a recipient

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>'.$word;
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}





  $word = $_POST['search'];
  $product = mysqli_query($con, "SELECT * FROM item");
 $row = mysqli_fetch_array($product);
              if(sizeof($row) >0 && strpos($row['name'], $word))
              {
                    $id = $row['id'];
                    $name = $row['name'];
                    $price = '$'.$row['price'];
                    $email = $row['email'];
                    $seller = $row['seller'];
              echo <<<EOD
                      <div class="bs-example" data-example-id="hoverable-table">
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th class="col-md-8">Item name</th>
                              <th class="col-md-4">Seller</th>
                            </tr>
                      <tr>
                            <td class="col-md-8"><a style="margin-left: 16px;" href="product.php?item={$id} ">$name <span class="badge">{$price}</span></a></td>
                            <td class="col-md-4">{$seller}</td>
                      </tr>
                          </thead>
                          <tbody>

EOD;
                  while($row = mysqli_fetch_array($product))
                  {
                    $id = $row['id'];
                    $name = $row['name'];
                    $price = '$'.$row['price'];
                    $email = $row['email'];
                    $seller = $row['seller'];
                    echo <<<EOD
                      <tr>
                            <td class="col-md-8"><a style="margin-left: 16px;" href="product.php?item={$id} ">$name <span class="badge">{$price}</span></a></td>
                            <td class="col-md-4">{$seller}</td>
                      </tr>

EOD;
                  }
                  echo <<<EOD


                          </tbody>
                        </table>
                      </div>
EOD;
              }
// story

  $product = mysqli_query($con, "SELECT * FROM story");
  $row = mysqli_fetch_array($product);
              if(sizeof($row) >0 && strpos($row['title'], $word))
              {
                    $id = $row['id'];
                    $title = $row['title'];
              echo <<<EOD
                      <div class="bs-example" data-example-id="hoverable-table">
                        <table class="table table-hover">
                          <thead>
                      <tr>
                            <td><span style="margin-left: 16px;" class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                            <a href="story.php?story={$id} ">{$title}</a></td>
                      </tr>
                          </thead>
                          <tbody>

EOD;
                  while($row = mysqli_fetch_array($product))
                  {
                    $id = $row['id'];
                    $title = $row['title'];
                    echo <<<EOD
                      <tr>
                            <td><span  style="margin-left: 16px;" class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                            <a href="story.php?story={$id} ">{$title}</a></td>
                      </tr>

EOD;
                  }
                  echo <<<EOD


                          </tbody>
                        </table>
                      </div>
EOD;
              }


//  $path = $row['path']
?>



            
            </article>
        </section>
        
        <aside class="sidebar">

           <ul> 
              <?php 
                $new_a = mysqli_query($con, "SELECT * FROM item WHERE cate = 'appliance' ORDER BY timing DESC LIMIT 4");
                $row = mysqli_fetch_array($new_a);
                if(sizeof($row) >0)
                {
                  $price = '$'.$row['price'];
                  echo <<<EOD
                <li>

                    <h4>New Arrival Appliances</h4>
                    <ul>
                      <li><a href="product.php?item={$row['id']}" >{$row['name']} <span class="badge">{$price}</span></a></li>
EOD;
                while($row = mysqli_fetch_array($new_a))
                {
                  echo <<<EOD
                  <li><a href="product.php?item={$row['id']}" >{$row['name']} <span class="badge">{$price}</span></a></li>
EOD;
                }
                    echo <<<EOD
                    </ul>
                </li>
EOD;
              }
               ?>
<!-- Furnitures -->
              <?php 
                $new_a = mysqli_query($con, "SELECT * FROM item WHERE cate = 'furniture' ORDER BY timing DESC LIMIT 4");
                $row = mysqli_fetch_array($new_a);
                if(sizeof($row) >0)
                {
                  $price = '$'.$row['price'];
                  echo <<<EOD
                <li>

                    <h4>New Arrival Furnitures</h4>
                    <ul>
                      <li><a href="product.php?item={$row['id']}" >{$row['name']} <span class="badge">{$price}</span></a></li>
EOD;
                while($row = mysqli_fetch_array($new_a))
                {
                  echo <<<EOD
                  <li><a href="product.php?item={$row['id']}" >{$row['name']} <span class="badge">{$price}</span></a></li>
EOD;
                }
                    echo <<<EOD
                    </ul>
                </li>
EOD;
              }
               ?>
                
<!-- Small item -->
              <?php 
                $new_a = mysqli_query($con, "SELECT * FROM item WHERE cate = 'small_item' ORDER BY timing DESC LIMIT 4");
                $row = mysqli_fetch_array($new_a);
                if(sizeof($row) >0)
                {
                  $price = '$'.$row['price'];
                  echo <<<EOD
                <li>

                    <h4>New Arrival Small Items</h4>
                    <ul>
                      <li><a href="product.php?item={$row['id']}" >{$row['name']} <span class="badge">{$price}</span></a></li>
EOD;
                while($row = mysqli_fetch_array($new_a))
                {
                  echo <<<EOD
                  <li><a href="product.php?item={$row['id']}" >{$row['name']} <span class="badge">{$price}</span></a></li>
EOD;
                }
                    echo <<<EOD
                    </ul>
                </li>
EOD;
              }
               ?>
                
            </ul>
        
        </aside>
        <div class="clear"></div>
    </div>
    <footer>
        <div class="footer-bottom">
            <p>By Yi Lu - yilu331@gmail.com</p>
            <p>Welcome first years and farewell fourth years</p>
         </div>
    </footer>
</div>
</body>
</html>
