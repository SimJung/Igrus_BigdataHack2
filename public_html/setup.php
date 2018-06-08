<?php

/**
 * @author Ravi Tamada
 * @link http://www.androidhive.info/2012/01/android-login-and-registration-with-php-mysql-and-sqlite/ Complete tutorial
 X
header("Content-Type:application/json; charset=utf-8");
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT');
*/

// json response array
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'autoset');
define('DB_DATABASE', 'test');

$connection = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);


   $return_arr = Array();
   $dap = Array();
   $result = mysqli_query($connection,"SELECT * FROM traffic ORDER BY roadnametext DESC");
   while ($row = mysqli_fetch_array($result)) {
      $row_array['roadsectionid'] = $row['roadsectionid'];
      $row_array['avgspeed'] = $row['avgspeed'];
      $row_array['roadnametext'] = $row['roadnametext'];
      $row_array['traveltime'] = $row['traveltime'];
      $row_array['endpoint'] = $row['endpoint'];
      array_push($return_arr,$row_array);
   }

   string $s="";
   print_r($return_arr);
   


   /*
   for($i=0;$i<$return_arr->sizeof();$i++)
   {

      if(strcmp($st,$return_arr[$i]['roadsectionid'])
      {

      }
      else if(!strcmp($st,$return_arr[$i]['roadsectionid']) && (int)$return_arr[$i]['avgspeed'] < 10)
      {
         $st=$return_arr[$i]['roadsectionid'];
         array_push($dap,$return_arr[$i]);
      }
      
   }
   */

   echo json_encode($dap,JSON_UNESCAPED_UNICODE);

*/

?>