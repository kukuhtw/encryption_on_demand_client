<?php
include("db.php");

date_default_timezone_set("Asia/Jakarta");
$tanggalhariini = date("Y/m/d");
$jamhariini = date("H:i:sa");
$saatini = $tanggalhariini. " ".$jamhariini;
$saatini_tanpaampm = str_replace("am", "", $saatini);
$saatini_tanpaampm = str_replace("pm", "", $saatini_tanpaampm);
$saatini = $saatini_tanpaampm;

$sql = "truncate table `mscustomer_plain`";
$query = mysqli_query($link,$sql)or die ('fail update data'.mysqli_error($link));
$query=null;

$sql = "select * from `mscustomer` order by `createdate` ";
$options = array(
	PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
			);
			$conn = new PDO("mysql:host=$mySQLserver;dbname=$mySQLdefaultdb", $mySQLuser, $mySQLpassword);
			// set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$html = "<table border='1'>";
			$html .= "<tr>";
			$html .= "<td>";
			$html .= "No";
			$html .= "</td>";
			$html .= "<td>";
			$html .= "Name";
			$html .= "</td>";
			$html .= "<td>";
			$html .= "Email";
			$html .= "</td>";
			$html .= "<td>";
			$html .= "Phone";
			$html .= "</td>";
			$html .= "<td>";
			$html .= "Address";
			$html .= "</td>";
			$html .= "<td>";
			$html .= "Zip Code";
			$html .= "</td>";
			$html .= "<td>";
			$html .= "Update";
			$html .= "</td>";
				
			$html .= "</tr>";
			$no=0;
			foreach($conn->query($sql) as $row) {
				$no=$no+1;
				$id=$row['id'];
				$id_1=$row['id_1'];
				$id_2=$row['id_2'];
				$ID_1=$id_1;
				$ID_2=$id_2;
				
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
					
	
					$sql = "insert into `mscustomer_plain` 
					(
					`id`,
					`name`,
					`email`,
					`phone`,
					`address`,
					`zipcode`,
					`note`,
					`createdate`,
					`id_1`,
					`id_2`
					) 
					values 
					(
					'$id',
					'$customer_name_decrypt',
					'$email_decrypt',
					'$phone_decrypt',
					'$address_decrypt',
					'$zipcode_decrypt',
					'$note_decrypt',
					'$saatini',
					'$ID_1',
					'$ID_2'
					) ";

					$query = mysqli_query($link,$sql)or die ('gagal update data'.mysqli_error($link));
					$query=null;
				}
?>
<html lang="en">
 <?php include("head_register.php") ?>
  <body class="bg-dark">
   <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">View Data</div>
        <div class="card-body">
<br>
<br>
<h1>Check Table mscustomer_plain</h1>
<br>Now check table mscustomer_plain, there is some data, but still in mode plain text.
<br>someone could stole those data
<br>
<a href="demo_encrypt_data_customer_plain_encrypt_this.php">Encrypt plain text</a> |
<br>
<br>
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