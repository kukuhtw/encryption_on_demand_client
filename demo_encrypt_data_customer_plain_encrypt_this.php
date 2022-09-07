<?php
include("db.php");

date_default_timezone_set("Asia/Jakarta");
$tanggalhariini = date("Y/m/d");
$jamhariini = date("H:i:sa");
$saatini = $tanggalhariini. " ".$jamhariini;
$saatini_tanpaampm = str_replace("am", "", $saatini);
$saatini_tanpaampm = str_replace("pm", "", $saatini_tanpaampm);
$saatini = $saatini_tanpaampm;

$sql = "select * from `mscustomer_plain` where `is_encrypted`='0' order by `createdate` ";
$options = array(
	PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
			);
			$conn = new PDO("mysql:host=$mySQLserver;dbname=$mySQLdefaultdb", $mySQLuser, $mySQLpassword);
			// set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$no=0;
			foreach($conn->query($sql) as $row) {
				$no=$no+1;
				$id=$row['id'];
						
				$name=$row['name'];
				$email=$row['email'];
				$phone=$row['phone'];
				$address=$row['address'];
				$zipcode=$row['zipcode'];
				$note=$row['note'];
				$customer_name = $name;
				$customer_email = $email;
				$customer_address = $address;
				$customer_zipcode = $zipcode;
				$customer_note = $note;
				$customer_phone = $phone;
				
				$json_return = call_api_services_encryption($customer_name,$customer_email ,$customer_address,$customer_zipcode,$customer_note,$customer_phone);
	
	//echo "<br>p = ".$p;
	$json_return_decode = json_decode($json_return,true);
	
	//echo "<br>json_return = ".$json_return;

	$status=$json_return_decode["status"];
	if ($status<>"200") {
		//echo "<br>status = ".$status;
		exit;
	}

	$ID_1=$json_return_decode["ID_1"];
	//echo "<br>ID_1 = ".$ID_1;

	$ID_2=$json_return_decode["ID_2"];
	//echo "<br>ID_1 = ".$ID_2;

	$count_data=count($json_return_decode["data"]);
	//echo "<br>count_data = ".$count_data;

	$customer_name_encrypt = $json_return_decode["data"][0]["data_result"];
	//echo "<br>customer_name_encrypt = ".$customer_name_encrypt;

	$customer_email_encrypt = $json_return_decode["data"][1]["data_result"];
	//echo "<br>customer_email = ".$customer_email_encrypt;

	$customer_address_encrypt = $json_return_decode["data"][2]["data_result"];
	//echo "<br>customer_address = ".$customer_address_encrypt;
		
	$customer_zipcode_encrypt = $json_return_decode["data"][3]["data_result"];
	//echo "<br>customer_zipcode = ".$customer_zipcode_encrypt;

	$customer_note_encrypt = $json_return_decode["data"][4]["data_result"];
	//echo "<br>customer_note_encrypt = ".$customer_note_encrypt;
	
	$customer_phone_encrypt = $json_return_decode["data"][5]["data_result"];
	//echo "<br>customer_phone = ".$customer_phone_encrypt;


$sql = "update `mscustomer_plain` set `name`='$customer_name_encrypt',	
	`email`= '$customer_email_encrypt', 
	`phone`='$customer_phone_encrypt' ,
	`address`='$customer_address_encrypt',
	`zipcode`='$customer_zipcode_encrypt',
	`note`='$customer_note_encrypt',
	`id_1`='$ID_1',
	`id_2`='$ID_2',
	`is_encrypted`='1'
	 	where `id`='$id'
	";

	//echo "<br>sql = ".$sql;

	$query = mysqli_query($link,$sql)or die ('gagal update data'.mysqli_error($link));
	$query=null;

					

			}

			
			$conn=null;

?>
<html lang="en">
 <?php include("head_register.php") ?>
  <body class="bg-dark">
   <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">View Data</div>
        <div class="card-body">
<h1>Check Table mscustomer_plain</h1>
<br>
<br>now check table mscustomer_plain, all the data now has been encrypted
<br>
<br>
<?php

include("menu.php");
?>
 <div class="text-center">
    		          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  </body>

</html>
<?php
function call_api_services_encryption($customer_name,$customer_email ,$customer_address,$customer_zipcode,$customer_note,$customer_phone) {
	
	include("settings.php");
	$BASE_END_POINT = $BASE_END_POINT_ENCRYPT;
	//data 0
	$data[] = array (
	 'data_field' => 'customer_name' ,
	  'data_raw' => $customer_name	
	);

	//data 1
	$data[] = array (
	 'data_field' => 'customer_email' ,
	 'data_raw' => $customer_email	
	);

	//data 2
	$data[] = array (
	 'data_field' => 'customer_address' ,
	 'data_raw' => $customer_address	
	);

	//data 3
	$data[] = array (
	 'data_field' => 'customer_zipcode' ,
	 'data_raw' => $customer_zipcode	
	);

	//data 4
	$data[] = array (
	 'data_field' => 'customer_note' ,
	 'data_raw' => $customer_note	
	);

	//data 5
	$data[] = array (
	 'data_field' => 'customer_phone' ,
	 'data_raw' => $customer_phone	
	);

	

	$postData = array(
	  'AppsID' => $AppsID ,
	  'Apps_TOKEN' => $Apps_TOKEN ,
	  'Organization' => $Organization ,
	  'data' => $data	  
	  );
	//echo "<br>goint to set ch";
	$ch = curl_init($BASE_END_POINT);
	//echo "<br>ch=".$ch;

	$headers = array(
	  'Content-Type: application/json'  ,
	  'Accept: application/json'  ,
	  "Client-ID: $Header_ClientID",
	  "Pass-Key: $Header_PassKey"
	);
	
	
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
	$content = curl_exec($ch);
	$content = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $content);
	$json = json_decode($content, true);
	
	//echo "<br>BASE_END_POINT: ".$BASE_END_POINT;
	//echo "<br>postData: ".json_encode($postData);
	//echo "<br>customer_name: ".$customer_name;
	//echo "<br>customer_email: ".$customer_email;
	//echo "<br>content: ".$content;
	//echo "<br>json: ".$json;
	
	$content_results = $content;
	curl_close($ch);

	return $content;
}


function call_api_services_decryption($customer_name,$customer_email ,$customer_address,$customer_zipcode,$customer_note,$customer_phone,$id_1,$id_2) {

	include("settings.php");
	$BASE_END_POINT = $BASE_END_POINT_DECRYPT;

	//data 0
	$data[] = array (
	 'data_field' => 'customer_name' ,
	  'data_raw' => $customer_name	
	);

	//data 1
	$data[] = array (
	 'data_field' => 'customer_email' ,
	 'data_raw' => $customer_email	
	);

	//data 2
	$data[] = array (
	 'data_field' => 'customer_address' ,
	 'data_raw' => $customer_address	
	);

	//data 3
	$data[] = array (
	 'data_field' => 'customer_zipcode' ,
	 'data_raw' => $customer_zipcode	
	);

	//data 4
	$data[] = array (
	 'data_field' => 'customer_note' ,
	 'data_raw' => $customer_note	
	);

		//data 5
	$data[] = array (
	 'data_field' => 'customer_phone' ,
	 'data_raw' => $customer_phone	
	);


	$postData = array(
	  'AppsID' => $AppsID ,
	  'Apps_TOKEN' => $Apps_TOKEN ,
	  'Organization' => $Organization ,
	   'id_1' => $id_1 ,
	    'id_2' => $id_2 ,
	  'data' => $data	  
	  );
	//echo "<br>goint to set ch";
	$ch = curl_init($BASE_END_POINT);
	//echo "<br>ch=".$ch;

	$headers = array(
	  'Content-Type: application/json'  ,
	  'Accept: application/json'  ,
	  "Client-ID: $Header_ClientID",
	  "Pass-Key: $Header_PassKey"
	);
	
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
	$content = curl_exec($ch);
	$content = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $content);
	$json = json_decode($content, true);
	
	//echo "<br>BASE_END_POINT: ".$BASE_END_POINT;
	//echo "<br>postData: ".json_encode($postData);
	//echo "<br>customer_name: ".$customer_name;
	//echo "<br>customer_email: ".$customer_email;
	//echo "<br>content: ".$content;
	//echo "<br>json: ".$json;
	
	$content_results = $content;
	curl_close($ch);

	return $content;
}

?>