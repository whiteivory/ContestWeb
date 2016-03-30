<?php 
/*
SimpleXMLElement Object ( 
	[User] => Array ( 
		[0] => SimpleXMLElement Object ( 
			[UserId] => 1 
			[ItemList] => SimpleXMLElement Object ( 
				[ItemId] => Array ( 
					[0] => 1001 
					[1] => 1002 
				)
			 ) 
		) 
		[1] => SimpleXMLElement Object ( 
			[UserId] => 2 
			[ItemList] => SimpleXMLElement Object ( 
				[ItemId] => 1002 
			) 
		) 
	) 
)
*/
$users = simplexml_load_file("recForEachUser.xml");
// print_r($users);
echo $users->User[0]->ItemList->ItemId[1];
$userrecarr  = array();
foreach ($users as $u){
    $m_u = array();
    $userId = $u->UserId;
    $m_u['userId'] = $userId;
    $recarr = array();
    if(is_array($u->ItemList->ItemId)){
        foreach ($u->ItemList->ItemId as $i){
            $recarr[] = $i;
        }
    }
    else{
        $recarr[] = $u->ItemList->ItemId;
    }
    $m_u['recList'] = $recarr;
    $userrecarr[] = $m_u;
}
// echo "<br>";
// print_r($userrecarr);
//@todo insert into mysql
?>