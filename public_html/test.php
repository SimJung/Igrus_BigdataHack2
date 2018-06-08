<meta http-equiv="Content-Type" content="text/html";charset=euc-kr">

<?php

$servername = "localhost";
$username = "root";
$password = "autoset";
$dbname = "test";
$conn = new mysqli($servername, $username, $password,$dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

mysqli_query($conn,"set session character_set_connection=utf8;");

mysqli_query($conn,"set session character_set_results=utf8;");

mysqli_query($conn,"set session character_set_client=utf8;");



$xml = simplexml_load_file('http://openapi.its.go.kr/dev/TrafficInfo.xml');
print_r($xml);
$json = json_encode($xml,JSON_UNESCAPED_UNICODE);
$array = json_decode($json,TRUE);
print_r($json);

foreach($array['data'] as $item)
{
   echo $item['roadsectionid'];
   echo $item['avgspeed'];
   echo $item['startnodeid'];
   echo $item['roadnametext'];
   echo $item['traveltime'];
   echo $item['endnodeid'];

$sql = "INSERT INTO traffic (roadsectionid, avgspeed, startnodeid,roadnametext,traveltime,endnodeid)
VALUES ('".$item['roadsectionid']."', '".$item['avgspeed']."', '".$item['startnodeid']."','".$item['roadnametext']."','".$item['traveltime']."','".$item['endnodeid']."')";
$result = mysqli_query($conn, $sql);
}

/*
$sql = "SELECT roadsectionid FROM traffic";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "roadsectionid: " . $row["roadsectionid"]."<br>";
    }
} else {
    echo "0 results";
}
*/
$conn->close();

?>