<?php
function deldir($dir) {
    //先删除目录下的文件：
    $dh=opendir($dir);
    while ($file=readdir($dh)) {
        if($file!="." && $file!="..") {
            $fullpath=$dir."/".$file;
            if(!is_dir($fullpath)) {
                unlink($fullpath);
            } else {
                deldir($fullpath);
            }
        }
    }

    closedir($dh);
    //删除当前文件夹：
    if(rmdir($dir)) {
        return true;
    } else {
        return false;
    }
}
//删除dirname文件夹下除了placeholder之外所有文件，当dirtype=false时文件夹不删除
function delete($dirname,$dirtype,$placeholder){
    $placeholder=str_replace("\r\n", "", $placeholder);//keng
    if($od=opendir($dirname))   //$d是目录名
    {
        
        while($file=readdir($od)) 
        {
            echo $file.' ';
            if($file=='..'||$file=='.') continue;
            if($placeholder!==0&&strcmp($file,$placeholder)==0){
                echo 'continue';
                continue;
            }
            if(is_dir('./'.$dirname.'/'.$file)) {
                if($dirtype===0)
                    continue;
                else{
                    deldir('./'.$dirname.'/'.$file);
                    continue;
                }
            }
            echo 'unlink '.'./'.$dirname.'/'.$file;
            unlink('./'.$dirname.'/'.$file);
        }
        closedir($od);
    }
}

$file = fopen("deletefile.txt","r");
while(!feof($file))
{
    $line=fgets($file);
    if($line==null) break; //回车空行
    $artmp=explode(' ', $line);
    print_r($artmp);
    delete($artmp[0],$artmp[1],$artmp[2]);
}
fclose($file); 
