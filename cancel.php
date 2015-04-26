<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DasiDog.us</title>
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Comfortaa" />
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-61555440-1', 'auto');
  ga('send', 'pageview');

</script>
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
  $id = replace($_GET['id']);
  $cate = replace($_GET['cate']);
  $key = $_GET['key'];
if($cate=="info")
{
    $check = mysqli_query($con, "SELECT rand FROM story WHERE id = '$id'");
    $row = mysqli_fetch_array($check);
    if(md5($row['rand']) == $key)
    {
      $result = mysqli_query($con, "DELETE FROM story WHERE id = '$id'");
    }
    else
    {
      $out = 1;
    }
}
else{
      $check = mysqli_query($con, "SELECT rand FROM item WHERE id = '$id'");
    $row = mysqli_fetch_array($check);
    if(md5($row['rand']) == $key)
    {
      $result = mysqli_query($con, "DELETE FROM item WHERE id = '$id'");
    }
    else
    {
      $out = 1;
    }
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
        <article>
        <?php 
            if($out!=1){
                echo <<<EOD
                <h3>Thank you again. You have successfully canceled your post</h3>
                  <br>
                    I wish you had a great exprience!
                    <br>
                    Please feel free to contact me for additional support
                    <br>
                    yilu331@gmail.com

EOD;
            }
            else {
                echo "<h3>Thank you, however, you failed to cancel your post, please contact me. Email: yilu331@gmail.com</h3>";
            }
        ?>

            </article>
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
