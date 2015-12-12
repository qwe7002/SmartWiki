<?php
//设定是否重写
define("REWRITE", true);
//载入配置文件
$Config =json_decode(file_get_contents("./config/config.json"),true);
$Pages = json_decode(file_get_contents("./config/pages.json"),true);
include './Library/Markdown/MarkdownExtra.inc.php';
use \Michelf\MarkdownExtra;

$Page = array();
$Page['Name'] = isset($_GET['page']) ? stripslashes($_GET['page']) : 'index';
$Page['List'] = explode('/', $Page['Name']);

if (count($Page['List']) > 1) {
  $Page['Title'] = $Pages[$Page['List'][0]][$Page['List'][1]];
} else {
  $Page['Title'] = isset($Pages[$Page['Name']]) ? $Pages[$Page['Name']] : '';
}

$Page['File'] = 'File/' . $Page['Name'] . '.md';
if (!file_exists($Page['File'])) {
  die('404 Not Found');
}

$handle = @fopen($Page['File'], "r");
if ($handle) {
  $heading = 0;

  while (!feof($handle)) {
    $Page['ContentTemp'] = fgets($handle, 4096);

    if (substr($Page['ContentTemp'], 0, 3) == '***') {
      $heading = 1;
      break;
    } else {
      $temparray[] = $Page['ContentTemp'];
    }
  }

  $Page['Heading']  = '';
  $temptext = '';

  if ($heading === 1) {
    foreach ($temparray as $key => $val) {
      $temptext = $temptext . "\n" . $val;
    }

    $Page['Heading'] = MarkdownExtra::defaultTransform($temptext);
  } else {
    $Page['Heading'] = '<h1>无标题</h1>';
  }

  $Page['Content'] = '';

  while (!feof($handle)) {
    $Page['Content'] = $Page['Content'] . fgets($handle, 4096);
  }

  fclose($handle);
}

$Page['Output'] = MarkdownExtra::defaultTransform($Page['Content']);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?php echo $Page['Title']?> - <?php echo $Config['Title']?> - Powered by SmartWiki</title>
  <link href="http://cdn.bootcss.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="http://v3.bootcss.com/examples/jumbotron/jumbotron.css" rel="stylesheet">
</head>

<body>
  <style type="text/css">
    body {font-family:"Helvetica Neue",Helvetica,"Segoe UI",Ubuntu,"Hiragino Sans GB","Microsoft YaHei","WenQuanYi Micro Hei",sans-serif;}
  </style>

  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"><?php echo $Config['Title']?></a>
      </div>
     
      <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav"><?php
          $link_prefix = (REWRITE == 'true' ? '' : '?page=');

          foreach ($Pages as $key => $val) {
            if($key == $Page['Name'] && !is_array($val)) {
              echo '<li class="active"><a href="', $link_prefix, $key, '">', $val, '</a></li>';
            } else {
              if (is_array($val)) {
                echo '<li class="dropdown' . ($key == $Page['Name'] ? 'active' : '') . '">',
                    '<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">',
                    $val['Title'],
                    '<span class="caret"></span></a>',
                    '<ul class="dropdown-menu" role="menu">';                    

                foreach ($val as $id => $return) {
                  if ($id != 'Title')
                    echo '<li><a href="', $link_prefix, $key, "/", $id, '">', $return, '</a></li>';
                }
                
                echo '</ul></li>';
              } else {
                echo '<li><a href="/', $key, '">', $val, '</a></li>';
              }
            }
          } ?></ul>
    </div>
  </nav>

  <div class="jumbotron">
    <div class="container">
      <?php echo $Page['Heading'];?>
    </div>
  </div>

  <main id="main" class="container">
    <?php echo $Page['Output']; ?>
    <hr>
  </main>

  <footer id="footer">
    <section class="container">
      <p><?php echo $Config['FooterInfo']?></p>
      <p>Powered by SmartWiki.</p>
    </section>
  </footer>

  <script src="./Static/JavaScript/jquery.min.js"></script>
  <script src="./Static/JavaScript/bootstrap.min.js"></script>  
</body>
</html>