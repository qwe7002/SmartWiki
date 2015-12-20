<?php
include("../config.php");
$path="./file/".$_GET["dir"];
    $prevpath=dirname($path);
    $files=scandir($path);
    foreach ($files as $file){
        if($file!="." && $file!="..") {
            $filename=$file;         
            if(is_dir("./".$_GET["dir"].'/'.$filename)){
              $dirarr[]=$filename;
            }else if(is_file("./".$_GET["dir"].'/'.$filename)){ 
              $filearr[]=$filename;
            }
        }
    }
    foreach ($dirarr as $filename){
        echo '<tr>
                <td>1</td>
                <td><a href="#">'.$Pages[$filename]['Title'].'</a></td>
                <td>子分类</td>
                <td>
                <div class="am-btn-toolbar">
                <div class="am-btn-group am-btn-group-xs">
                <button class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 编辑</button>
                <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</button>
                </div>
                </div>
                </td>
                </tr>';
              }
   foreach ($filearr as $filename){
            echo '<tr>
                <td>1</td>
                <td><a href="#">'.$Pages[$filename].'</a></td>
                <td>文档</td>
                <td>
                <div class="am-btn-toolbar">
                <div class="am-btn-group am-btn-group-xs">
                <button class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 编辑</button>
                <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</button>
                </div>
                </div>
                </td>
                </tr>';
   }
?>