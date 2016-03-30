<?php
//user,item,rating 表，然后cpp端根据数据生成_allRatingsByUserId;
$sql = "select userId,username from user";
$sql2 = "select pageId from page";
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
    foreach ($stat as $row){
        $writer->startElement("User");
        $writer->writeElement("UserId",$row['userId']);
        $writer->writeElement("UserName",$row['username']);
        $writer->endElement();
    }
    $writer->endElement();
    $writer->endDocument();
    $writer->flush();
    //items.xml
    $writer->openURI('items.xml');
    $writer->startDocument('1.0','UTF-8');
    $writer->setIndent(4);
    $writer->startElement('Items');
    $stat = $dbh->query($sql2);
    foreach ($stat as $row){
        $writer->startElement("Item");
        $writer->writeElement("ItemId",$row['pageId']);
        $writer->endElement();
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
        $writer->startElement("Ratng");
        $writer->writeElement("UserId",$row['userID']);
        $writer->writeElement("ItemId",$row['pageID']);
        $writer->writeElement("Rating",$row['star']);
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
