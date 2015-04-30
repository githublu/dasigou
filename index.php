<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DasiDog.us</title>
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Comfortaa" />
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script src="jquery.validate.min.js"></script>
  <link href="bootstrap.icon-large.min.css" rel="stylesheet">
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!--
respo, a free CSS web template by ZyPOP (zypopwebtemplates.com/)

Download: http://zypopwebtemplates.com/

License: Creative Commons Attribution
//-->
<style>
.panel-heading
{
    padding:0px;
}
</style>
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
<script>
$(document).ready(function () {

$('#postform').validate({
    rules: {
        name: {
            required: true
        },
        email: {
            required: true,
            email: true
        },
        seller: {
            required: true
        }
    },
    highlight: function (element) {
        $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
    }
});
});
</script>
</head>
<?php
  require_once('library.php');
  require_once('function.php');
  date_default_timezone_set("America/New_York");
  $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
  $con->query("SET time_zone='-4:00'");
?>
<body>
<div id="container">
    <header>
  <div class="width">
        <h1><img id="imageresource" src="./uploads/logo.png" style="height: 107px;"><a href="/" style="text-transform: none;">DasiDog.us</a></h1>
        </div>
    </header>
    <nav>
	<div>
<nav class="navbar">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" style="border-color: #ddd; background:#ddd">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
                <ul><li class="selected"><a href="#" data-toggle="modal" data-target="#myModal" style="margin: 6px;">
                  I want to post </a></li>
                  </ul>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="width: 250px;float: right;">
    	<div style="width:60%; min-width:220px; padding: 11px;">
			<script>
			  (function() {
			    var cx = '001953804360013265686:osxuicxagrw';
			    var gcse = document.createElement('script');
			    gcse.type = 'text/javascript';
			    gcse.async = true;
			    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
			        '//cse.google.com/cse.js?cx=' + cx;
			    var s = document.getElementsByTagName('script')[0];
			    s.parentNode.insertBefore(gcse, s);
			  })();
			</script>
			<gcse:search></gcse:search>
			</div>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Posting</h4>
                      </div>
                      <div class="modal-body">
                      <div role="tabpanel">
                      <!-- Nav tabs -->
                      <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#item" aria-controls="item" role="tab" data-toggle="tab">Sell</a></li>
                        <li role="presentation"><a href="#info" aria-controls="info" role="tab" data-toggle="tab">Tell stories</a></li>
                      </ul>

                      <!-- Tab panes -->
                      <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="item">
                            <form action="action_page.php" method="POST" enctype="multipart/form-data" role ="form" id = "postform">
                             <input type="hidden" name="tab" value = "item">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Choose a Category</label>
                                  <select class="form-control" name = "cate">
                                    <option value="furniture">
                                      Furnitures
                                    </option>
                                    <option value="small_item">
                                      Small items
                                    </option>
                                    <option value="appliance">
                                      Appliances
                                    </option>
                                  </select>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Item Name</label>
                                <input type="text" name = "name" class="form-control" id="name" placeholder="eg. Hair dryer...">
                              </div>
                              <div class="form-group">
                                <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
                                <div class="input-group">
                                  <div class="input-group-addon">$</div>
                                  <input type="number" class="form-control" id="price" name="price" placeholder="Amount" >
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Seller's Name</label>
                                <input type="text" name = "seller" class="form-control" id="seller" placeholder="Jack Brown" >
                              </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Detailed description</label>
                                    <textarea class="form-control" name = "desc" rows="3"></textarea>
                                </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Email to contact you</label>
                                <input type="email" name = "email" class="form-control" id="email" placeholder="Uses virginia.edu email for credibility" >
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Phone number to contact you</label>
                                <input type="text" name = "phone" class="form-control" id="phone" placeholder="(___)-___-___">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputFile">Upload pictures</label>
                                 <input type="file" name="fileToUpload" id="fileToUpload">
                              </div>
                              <button type="submit" class="btn btn-default" name="submit">Submit</button>
                            </form>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="info">
                             <form action="action_page.php" method="POST" enctype="multipart/form-data">
                             <input type="hidden"  name ="tab" value="info" />
                              <div class="form-group">
                                <label for="exampleInputEmail1">Title of your story</label>
                                <input type="text" name = "title" class="form-control" id="exampleInputEmail1" placeholder="...">
                              </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Tell you stories</label>
                                    <textarea class="form-control" name = "story" rows="5"></textarea>
                                </div>
                              <button type="submit" class="btn btn-default" name="submit">Submit</button>
                            </form>
                        </div>
                      </div>

                    </div>
                      </div>
                    </div>
                  </div>
                </div>


	</div>
    </nav>

    <div id="body" class="width" style="width:100%">
        <aside class="sidebar" style="width:100%">
            <div role="tabpanel">

              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Appliances</a>
                </li>
                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Small items</a></li>
                <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Furnitures</a></li>
                <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Tell stories</a></li>
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="home">
              <?php
              $isempty_a = mysqli_query($con, "SELECT * FROM 
              item WHERE cate = 'appliance' ORDER BY timing DESC");
              $row = mysqli_fetch_array($isempty_a);
              if(sizeof($row) >0)
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
                                  <td class="col-md-8"><a  style="margin-left: 16px;" href="product.php?item={$id} ">$name <span class="badge">{$price}</span></a></td>
                                  <td class="col-md-4">{$seller}</td>
                            </tr>
                          </thead>
                          <tbody>

EOD;
                  while($row = mysqli_fetch_array($isempty_a))
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
              ?>
                </div>
                <div role="tabpanel" class="tab-pane" id="profile">
              <?php
              $isempty_s = mysqli_query($con, "SELECT * FROM 
              item WHERE cate = 'small_item' ORDER BY timing DESC");
              $row = mysqli_fetch_array($isempty_s);
              if(sizeof($row) >0)
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
                  while($row = mysqli_fetch_array($isempty_s))
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
              ?>
                </div>
                <div role="tabpanel" class="tab-pane" id="messages">
              <?php
              $isempty_f = mysqli_query($con, "SELECT * FROM 
              item WHERE cate = 'furniture' ORDER BY timing DESC");
              $row = mysqli_fetch_array($isempty_f);
              if(sizeof($row) >0)
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
                  while($row = mysqli_fetch_array($isempty_f))
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
              ?>
                </div>
                <div role="tabpanel" class="tab-pane" id="settings">
                    
              <?php
              $isempty_t = mysqli_query($con, "SELECT * FROM 
              story ORDER BY timing DESC");
              $row = mysqli_fetch_array($isempty_t);
              if(sizeof($row) >0)
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
                  while($row = mysqli_fetch_array($isempty_t))
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
              ?>



                </div>
              </div>

            </div>
    
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
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-61555440-1', 'auto');
  ga('send', 'pageview');

</script>
  <link rel="stylesheet" href="styles.css" type="text/css" />
</body>
</html>