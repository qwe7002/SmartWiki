<?php
include("conf.php");
spl_autoload_register(function($class){
  require preg_replace('{\\\\|_(?!.*\\\\)}', DIRECTORY_SEPARATOR, ltrim($class, '\\')).'.php';
});

use \Michelf\MarkdownExtra;
if(isset($_GET['page'])){
$pages=$_GET['page'];
}else{
  $pages="index";
}
     $text = file_get_contents("file/".$pages.".md");
     $html = MarkdownExtra::defaultTransform($text);
?>
<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $filesetting[$pages]['heading'] ?> - <?php echo $Gsetting["title"]?></title>

    <!-- Bootstrap core CSS -->
    <link href="http://cdn.bootcss.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="http://v3.bootcss.com/examples/jumbotron/jumbotron.css" rel="stylesheet">
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><?php echo $Gsetting["title"]?></a>
        </div>
     <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            
            <?PHP
            foreach ($filesetting as $key => $val)
            {
             if (is_array ($val))
             {
              if($key==$pages){
              echo '<li class= "active"><a href="?page='.$key.'">'.$val["heading"].'</a></li>';
              }else{
              echo '<li><a href="?page='.$key.'">'.$val["heading"].'</a></li>';
             }
             }
            }
            ?>
          </ul>
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1><?PHP echo $filesetting[$pages]['heading'];?></h1>
        <br>
        <p><?PHP echo $filesetting[$pages]['subheading'];?></p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <?php echo $html; ?>
     <hr>

      <footer>
        <p><?php echo $Gsetting['foottitle']?></p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./js/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="./js/ie10-viewport-bug-workaround.js"></script>
  

</body></html>