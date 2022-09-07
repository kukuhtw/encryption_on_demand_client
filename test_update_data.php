<?php
include("db.php");
ini_set("error_log", "err12.txt");

include("head_dashboard.php");
?>
  <body id="page-top">
<?php
include("nav_dashboard.php");
?>
<div id="wrapper">
<?php
include("sidebar_dashboard.php");

date_default_timezone_set("Asia/Jakarta");
$tanggalhariini = date("Y/m/d");
$jamhariini = date("H:i:sa");
$saatini = $tanggalhariini. " ".$jamhariini;
$saatini_tanpaampm = str_replace("am", "", $saatini);
$saatini_tanpaampm = str_replace("pm", "", $saatini_tanpaampm);
$saatini = $saatini_tanpaampm;

$mode = isset($_POST['mode']) ? $_POST['mode'] : '';

$id = isset($_GET['id']) ? $_GET['id'] : '';

if ($id=="") {
	$id = isset($_POST['id']) ? $_POST['id'] : '';
}

if ($id=="") {
	exit;
}

$id = mysqli_escape_string($link,$id);


if ($mode=="update") {

	$customer_name = isset($_POST['customer_name']) ? $_POST['customer_name'] : '';
	$customer_email = isset($_POST['customer_email']) ? $_POST['customer_email'] : '';
	$customer_address = isset($_POST['customer_address']) ? $_POST['customer_address'] : '';
	$customer_zipcode = isset($_POST['customer_zipcode']) ? $_POST['customer_zipcode'] : '';
	$customer_note= isset($_POST['customer_note']) ? $_POST['customer_note'] : '';
	$customer_phone = isset($_POST['customer_phone']) ? $_POST['customer_phone'] : '';

	$customer_name = mysqli_escape_string($link,$customer_name);
	$customer_email = mysqli_escape_string($link,$customer_email);
	$customer_address = mysqli_escape_string($link,$customer_address);
	$customer_zipcode = mysqli_escape_string($link,$customer_zipcode);
	$customer_note = mysqli_escape_string($link,$customer_note);
	$customer_phone = mysqli_escape_string($link,$customer_phone);

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
	//echo "<br>customer_zipcode = ".$customer_zipcode_encrypt;
	
	$customer_phone_encrypt = $json_return_decode["data"][5]["data_result"];
	//echo "<br>customer_phone = ".$customer_phone_encrypt;


	$sql = "update `mscustomer` set `name`='$customer_name_encrypt',	
	`email`= '$customer_email_encrypt', 
	`phone`='$customer_phone_encrypt' ,
	`address`='$customer_address_encrypt',
	`zipcode`='$customer_zipcode_encrypt',
	`note`='$customer_note_encrypt',
	`id_1`='$ID_1',
	`id_2`='$ID_2' 	where `id`='$id'
	";

	//echo "<br>sql = ".$sql;

	$query = mysqli_query($link,$sql)or die ('gagal update data'.mysqli_error($link));
	$query=null;


}

$sql = "select * from `mscustomer` where `id`='$id' ";
$options = array(
	PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
			);
			$conn = new PDO("mysql:host=$mySQLserver;dbname=$mySQLdefaultdb", $mySQLuser, $mySQLpassword);
			// set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				foreach($conn->query($sql) as $row) {
					$id_1=$row['id_1'];
					$id_2=$row['id_2'];
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


					$json_return = call_api_services_decryption($customer_name,$customer_email ,$customer_address,$customer_zipcode,$customer_note,$customer_phone,$id_1,$id_2);

					$json_return_decode = json_decode($json_return,true);
	
					//echo "<br>json_return = ".$json_return,"<STOP>";
					//echo "<br>json_return_decode = ".$json_return_decode;


					$status=$json_return_decode["status"];

					//echo "<br>status = ".$status;
					

					if ($status<>"200") {
						//echo "<br>status data ke = ".$no;
						exit;
					}

					$customer_name_decrypt = $json_return_decode["data"][0]["data_result"];
					//echo "<br>customer_name_decrypt = ".$customer_name_decrypt;

					$email_decrypt = $json_return_decode["data"][1]["data_result"];
					$address_decrypt = $json_return_decode["data"][2]["data_result"];
					$zipcode_decrypt = $json_return_decode["data"][3]["data_result"];
					$note_decrypt = $json_return_decode["data"][4]["data_result"];
					$phone_decrypt = $json_return_decode["data"][5]["data_result"];
					
				
			}
			$conn=null;


?>

 <div id="content-wrapper">
       <div class="container-fluid">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              Dashboard
            </li>
            <li class="breadcrumb-item active">Update Data</li>
          </ol>
          <!-- Icon Cards-->
          <div class="row">
  <div class="container">
<br>
All Data below this, is purely encrypted in database mysql.
you can decryped data below this, by using encrypton / decryption services.
<br

<h1>Table MsCustomer</h1>
<form method="POST">
<br>Nama Pelanggan :
<br><input type="text" name="customer_name" value="<?php echo $customer_name_decrypt ?>">	
<br>Email Pelanggan :
<br><input type="text" name="customer_email" value="<?php echo $email_decrypt ?>">	
<br>Mobile Phone:
<br><input type="text" name="customer_phone" value="<?php echo $phone_decrypt ?>">	
<br>Alamat Pelanggan :
<br><textarea name="customer_address"><?php echo $address_decrypt ?></textarea>	
<br>KodePos Pelanggan :
<br><input type="text" name="customer_zipcode" value="<?php echo $zipcode_decrypt ?>">	
<br>

<input type="hidden" name="customer_note" value="<?php echo $note_decrypt ?>">
<input type="hidden" name="id" value="<?php echo $id ?>">
<input type="hidden" name="mode" value="update">
<br><input type="submit" name="" value="Update">
</form>

 </div>
<br>
         </div>
<?php
include("scrollup_icon_dashboard.php");
include("logout_modal_dashboard.php");
include("footer_javascript.php") 
?>
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
	//echo "<br>headers: ".json_encode($headers);
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
	//echo "<br>headers: ".json_encode($headers);
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