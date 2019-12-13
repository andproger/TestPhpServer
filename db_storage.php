<?php

class MYSQL_PROVIDER{
		private static $mysql_db_name = "id11261706_mybase";
		private static $mysql_db_adress = "localhost";
		private static $mysql_db_user = "id11261706_test";
		private static $mysql_db_user_password = "test123";

		public static function get_query($qstr){
			$connect = mysqli_connect(
			    self::$mysql_db_adress, 
			    self::$mysql_db_user, 
			    self::$mysql_db_user_password, 
			    self::$mysql_db_name
			);
			
			$result = mysqli_query($connect, $qstr);
			
			mysqli_close($connect);
			return $result;
		}

		public static function fetch_object($query){ 
			return mysqli_fetch_object($query);
		}
}

class ClientApi extends MYSQL_PROVIDER{
    
    public static function saveTest($data){
	    $name = $data->{'name'};
	    $age = $data->{'age'};
	    
	    $ins_query_string = "INSERT into test_table (name, age) VALUES('$name', '$age')";

		parent::get_query($ins_query_string);
	}
}

?>