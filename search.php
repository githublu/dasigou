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
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-61555440-1', 'auto');
  ga('send', 'pageview');

</script>
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
            <h1><img id="imageresource" src="./uploads/logo.png" style="height: 107px;"><a href="/">DasiDog.us</a></h1>
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
  $word = strtolower($_GET['search']);
  $product = mysqli_query($con, "SELECT * FROM item");
 $row = mysqli_fetch_array($product);
              if(sizeof($row) >0)
              {
                echo <<<EOD
                    <div class="bs-example" data-example-id="hoverable-table">
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th class="col-md-8">Item name</th>
                              <th class="col-md-4">Seller</th>
                            </tr>
EOD;
                    $id = $row['id'];
                    $name = $row['name'];
                    $price = '$'.$row['price'];
                    $email = $row['email'];
                    $seller = $row['seller'];
                    if(strpos(strtolower($name), $word) !==false)
                    {
              echo <<<EOD
                      <tr>
                            <td class="col-md-8"><a style="margin-left: 16px;" href="product.php?item={$id} ">$name <span class="badge">{$price}</span></a></td>
                            <td class="col-md-4">{$seller}</td>
                      </tr>
                          </thead>
                          <tbody>

EOD;
                    }
                  while($row = mysqli_fetch_array($product))
                  {
                    $id = $row['id'];
                    $name = $row['name'];
                    $price = '$'.$row['price'];
                    $email = $row['email'];
                    $seller = $row['seller'];
                    if(strpos(strtolower($name), $word) !==false)
                    {
                    echo <<<EOD
                      <tr>
                            <td class="col-md-8"><a style="margin-left: 16px;" href="product.php?item={$id} ">$name <span class="badge">{$price}</span></a></td>
                            <td class="col-md-4">{$seller}</td>
                      </tr>

EOD;
                  }
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
              if(sizeof($row) >0)
              {
                    $id = $row['id'];
                    $title = $row['title'];
                    if(strpos(strtolower($title), $word) !==false){
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
                  }

                  while($row = mysqli_fetch_array($product))
                  {
                    $id = $row['id'];
                    $title = $row['title'];
                    if(strpos(strtolower($title), $word) !==false){
                    echo <<<EOD
                      <tr>
                            <td><span  style="margin-left: 16px;" class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                            <a href="story.php?story={$id} ">{$title}</a></td>
                      </tr>

EOD;
                  }
                }
              }


//  $path = $row['path'];
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
