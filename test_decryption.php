<?php
include("db.php");

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


$sql = "select * from `mscustomer` order by `createdate` ";
$options = array(
	PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
			);
			$conn = new PDO("mysql:host=$mySQLserver;dbname=$mySQLdefaultdb", $mySQLuser, $mySQLpassword);
			// set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$html = "<h1>Table MsCustomer</h1>";
	$html .= "<div class='card mb-3'>
            <div class='card-header'>
              <i class='fas fa-table'>&nbsp;</i>
              </div>
            <div class='card-body'>
              <div class='table-responsive'>
                <table class='table table-bordere' id='dataTable' width='100%' cellspacing='0'>
                  <thead>
                    <tr>";

			$html .= "<th>";
			$html .= "No";
			$html .= "</th>";
			$html .= "<th>";
			$html .= "Name";
			$html .= "</th>";
			$html .= "<th>";
			$html .= "Email";
			$html .= "</th>";
			$html .= "<th>";
			$html .= "Phone";
			$html .= "</th>";
			$html .= "<th>";
			$html .= "Address";
			$html .= "</th>";
			$html .= "<th>";
			$html .= "Zip Code";
			$html .= "</th>";
			$html .= "<th>";
			$html .= "Note";
			$html .= "</th>";
			$html .= "<th>";
			$html .= "Update";
			$html .= "</th>";
				
			$html .= "</tr>";
			$html .= "
			  </thead>
                  <tfoot>
                    <tr>";
            $html .= "<th>";
			$html .= "No";
			$html .= "</th>";
			$html .= "<th>";
			$html .= "Name";
			$html .= "</th>";
			$html .= "<th>";
			$html .= "Email";
			$html .= "</th>";
			$html .= "<th>";
			$html .= "Phone";
			$html .= "</th>";
			$html .= "<th>";
			$html .= "Address";
			$html .= "</th>";
			$html .= "<th>";
			$html .= "Zip Code";
			$html .= "</th>";
			$html .= "<th>";
			$html .= "Note";
			$html .= "</th>";
			$html .= "<th>";
			$html .= "Update";
			$html .= "</th>
			        </tr>
                  </tfoot>
                  <tbody>";

			$no=0;

			foreach($conn->query($sql) as $row) {
				$no=$no+1;
				$id=$row['id'];
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
					
					
					$html .= "<tr>";
					$html .= "<td>";
					$html .= $no;
					$html .= "</td>";
					$html .= "<td>";
					$html .= $customer_name_decrypt;
					$html .= "</td>";
					$html .= "<td>";
					$html .= $email_decrypt;
					$html .= "</td>";
					$html .= "<td>";
					$html .= $phone_decrypt;
					$html .= "</td>";
					$html .= "<td>";
					$html .= $address_decrypt;
					$html .= "</td>";
					$html .= "<td>";
					$html .= $zipcode_decrypt;
					$html .= "</td>";
					$html .= "<td>";
					$html .= $note_decrypt;
					$html .= "</td>";
					$html .= "<td>";
					$html .= "<a href='test_update_data.php?id=$id'>Update All Data</a>";
					$html .= "<br><a href='test_update_data_note.php?id=$id'>Update Data Note</a>";
					$html .= "</td>";
					$html .= "</tr>";


			}
			$html .= "</table>";
			$conn=null;

?>
 <div id="content-wrapper">
       <div class="container-fluid">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              Dashboard
            </li>
            <li class="breadcrumb-item active">Edit Content</li>
          </ol>
          <!-- Icon Cards-->
          <div class="row">
  <div class="container">
<br>
All Data below this, is purely encrypted in database mysql.
you can decryped data below this, by using encrypton / decryption services.
<br>
  
<?php			
echo $html;
?>
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