<?php
//user,item,rating 表，然后cpp端根据数据生成_allRatingsByUserId;

$sql = "select user.userId,username,pageID,star from user join zanup on user.userId=zanup.userID order by user.userId";
$sql2 = "select page.pageID,zanup.userID,star from page join zanup on page.pageID = zanup.pageID order by page.pageID";
$sql3 = "select userID,pageID,star from zanup";
try {
    $dbh=new \PDO("mysql:host=localhost;dbname=contestweb", 'root', '');
    //users.xml
    $writer = new XMLWriter();
    $writer->openURI('users.xml');
    $writer->startDocument('1.0','UTF-8');
    $writer->setIndent(4);
    $writer->startElement('Users');
    $stat = $dbh->query($sql);
    $formerId = "";
    $firstFlag = true;
    foreach ($stat as $row){
        $userId = $row['userId'];
        if($userId === $formerId){
            $writer->startElement("Rating");
            $writer->writeElement("PageId",$row['pageID']);
            $writer->writeElement("star",$row['star']);
            $writer->endElement();
        }
        else{ //新的一个User
            if($firstFlag === false){//如果不是第一次，添加下面两个
                //$writer->endElement();//</Rating>
                $writer->endElement();//</User>
            }
            if($firstFlag === true)   $firstFlag = false;//如果是第一次，设置flag
            $writer->startElement("User");
            $writer->writeElement("UserId",$row['userId']);
            $writer->writeElement("UserName",$row['username']);
                $writer->startElement("Rating");
                $writer->writeElement("PageId",$row['pageID']);
                $writer->writeElement("star",$row['star']);
                $writer->endElement();
        }
        $formerId = $userId;
    }
    $writer->endElement();
    $writer->endDocument();
    $writer->flush();
    
    //items.xml
     $writer = new XMLWriter();
    $writer->openURI('items.xml');
    $writer->startDocument('1.0','UTF-8');
    $writer->setIndent(4);
    $writer->startElement('Items');
    $stat = $dbh->query($sql2);
    $formerId = "";
    $firstFlag = true;
    foreach ($stat as $row){
        $itemId = $row['pageID'];
        if($itemId === $formerId){
            $writer->startElement("Rating");
            $writer->writeElement("UserId",$row['userID']);
            $writer->writeElement("star",$row['star']);
            $writer->endElement();
        }
        else{ //新的一个User
            if($firstFlag === false){//如果不是第一次，添加下面两个
             //   $writer->endElement();//</Rating>
                $writer->endElement();//</User>
            }
            if($firstFlag === true)   $firstFlag = false;//如果是第一次，设置flag
            $writer->startElement("Item");
            $writer->writeElement("ItemId",$row['pageID']);
                $writer->startElement("Rating");
                $writer->writeElement("UserId",$row['userID']);
                $writer->writeElement("star",$row['star']);
                $writer->endElement();
        }
        $formerId = $itemId;
    }
    $writer->endElement();
    $writer->endDocument();
    $writer->flush();
    //ratings.xml
       $writer->openURI('ratings.xml');
    $writer->startDocument('1.0','UTF-8');
    $writer->setIndent(4);
    $writer->startElement('Ratings');
    $stat = $dbh->query($sql3);
    foreach ($stat as $row){
        $writer->startElement("Rating");
        $writer->writeElement("UserId",$row['userID']);
        $writer->writeElement("ItemId",$row['pageID']);
        $writer->writeElement("Star",$row['star']);
        $writer->endElement();
    }
    $writer->endElement();
    $writer->endDocument();
    $writer->flush();
    
    $dbh=null;
} catch (\PDOException $e) {
    print"ERROR!: ".$e->getMessage()."<br/>";
    die();
}
