<?php 
$users = simplexml_load_file("recs.xml");
$ar = array();
foreach ($users as $u){
    $m_u = array();
    $recarr = array();
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

var_dump($ar);
?>