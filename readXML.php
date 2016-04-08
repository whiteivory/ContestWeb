<?php 
$users = simplexml_load_file("recs.xml");
$ar = array();
foreach ($users as $u){
    $m_u = array();
    $recarr = array();
    $m_u['userId'] = $u->UserId->__toString();
    foreach ($u->Item as $i){
        $itemtmp = array();
       //var_dump($i);
        $itemtmp['itemId'] = $i->ItemId->__toString();
        $itemtmp['predictRating']=$i->PredictRating->__toString();
        $recarr[] = $itemtmp;
    }
    $simiarr = array();
    foreach ($u->Simi as $s){
        $simitmp = array();
        //var_dump($s);
        $simitmp['simiId'] = $s->SimiId->__toString();
        $simitmp['similarity'] = $s->Similarity->__toString();
        $simiarr[] = $simitmp;
    }
    $m_u['reclist'] = $recarr;
    $m_u['similist'] = $simiarr;
    $ar[] = $m_u;
}

//var_dump($ar);
/*
 * array (size=2)
  0 => 
    array (size=2)
      'userId' => string '1' (length=1)
      'reclist' => 
        array (size=2)
          0 => 
            array (size=2)
              'itemId' => string '1004' (length=4)
              'predictRating' => string '5' (length=1)
          1 => 
            array (size=2)
              'itemId' => string '1001' (length=4)
              'predictRating' => string '3' (length=1)
      'similist' => 
        array (size=1)
          0 => 
            array (size=2)
              'simiId' => string '2' (length=1)
              'similarity' => string '1' (length=1)
 */
//insert into mysql
$dbh=new \PDO("mysql:host=localhost;dbname=contestweb", 'root', '');
foreach ($ar as $_u){
    $sqlstr = "insert into recs(userId,pageId,predictRating) values(?,?,?)
        on duplicate key update predictRating = ? ";
    $userId = $_u['userId'];
    foreach ($_u['reclist'] as $_r){
        $pageId = $_r['itemId'];
        $p = $_r['predictRating'];
        $stmt = $dbh->prepare($sqlstr);
        $stmt->execute(array($userId,$pageId,$p,$p));
    }
    $sqlstr2 = "insert into recfris(userId,friendId,simi) values(?,?,?)
        on duplicate key update simi = ? ";
    foreach ($_u['similist'] as $_s){
        $friId = $_s['simiId'];
        $s = $_s['similarity'];
        $stmt = $dbh->prepare($sqlstr2);
        $stmt->execute(array($userId,$friId,$s,$s));
    }
}
$dbh= null;
?>