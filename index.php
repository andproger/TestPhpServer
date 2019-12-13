<?php
require_once("db_storage.php");

if(!isset($_GET["fun"])) {
    echo "need request query param fun";
    return;
} else {
    $request_name = $_GET["fun"];
}

switch($request_name){
	    case 'test_post_method':
		    $postData = file_get_contents('php://input'); 
			$data = json_decode($postData);
			
			ClientApi::saveTest($data);
		break;
		
		case 'test_query_method':
		    if(isset($_GET["my_param1"])){
		        $param = $_GET["my_param1"];
		        echo "has param " . $param;
		    }else{
		        echo "has no param ";
		    }
		break;
	}
?>