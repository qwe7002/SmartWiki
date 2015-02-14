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
if(!file_exists("file/".$pages.".md")){
die("404 Not Found");
}else{
 //$text = file_get_contents("file/".$pages.".md");
$handle = @fopen("file/".$pages.".md", "r");
if($handle){
while(!feof($handle)){
    $texttemp = fgets($handle, 4096);
  if(substr($texttemp, 0,3)=="***"){
   break;
  }else{
   $temparray[]=$texttemp;
  }
}
  $heading="";
  $subheading="";
if(count($temparray)!=0){
  foreach ($temparray as $key => $val)
  {
    if($val!=""&&substr($val, 0,1)=="#"){
      $heading=trim(substr($val, 1));
    }
   if($val!=""&&substr($val, 0,1)!="#"){
     $subheading=$subheading.trim($val);
   }
  }
}else{
  $heading="无标题";
  $subheading="";
}
$text="";
    while (!feof($handle)) {
        $text = $text.fgets($handle, 4096);
    }
    fclose($handle);
}
 $html = MarkdownExtra::defaultTransform($text);
     }
?>
<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $filesetting[$pages]?> - <?php echo $Gsetting["title"]?></title>

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
              if($key==$pages){
              echo '<li class= "active"><a href="?page='.$key.'">'.$val.'</a></li>';
              }else{
              echo '<li><a href="?page='.$key.'">'.$val.'</a></li>';
             }
            }
            ?>
          </ul>
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1><?PHP echo $heading;?></h1>
        <br>
        <p><?PHP echo $subheading;?></p>
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