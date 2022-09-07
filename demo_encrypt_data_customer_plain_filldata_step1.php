<?php
include("db.php");

date_default_timezone_set("Asia/Jakarta");
$tanggalhariini = date("Y/m/d");
$jamhariini = date("H:i:sa");
$saatini = $tanggalhariini. " ".$jamhariini;
$saatini_tanpaampm = str_replace("am", "", $saatini);
$saatini_tanpaampm = str_replace("pm", "", $saatini_tanpaampm);
$saatini = $saatini_tanpaampm;

$sql = "DROP TABLE IF EXISTS `mscustomer_plain`;";
$query = mysqli_query($link,$sql)or die ('fail update data'.mysqli_error($link));
$query=null;

$sql = "CREATE TABLE IF NOT EXISTS `mscustomer_plain` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `createdate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
$query = mysqli_query($link,$sql)or die ('fail update data'.mysqli_error($link));
$query=null;

$sql = "COMMIT;";
$query = mysqli_query($link,$sql)or die ('fail update data'.mysqli_error($link));
$query=null;


$sql = "ALTER TABLE `mscustomer_plain` ADD `id_1` INT NOT NULL AFTER `createdate`, ADD `id_2` INT NOT NULL AFTER `id_1`, ADD `is_encrypted` BOOLEAN NOT NULL DEFAULT FALSE AFTER `id_2`;";
$query = mysqli_query($link,$sql)or die ('fail update data'.mysqli_error($link));
$query=null;

$sql = "ALTER TABLE `mscustomer_plain` CHANGE `id` `id` BIGINT(20) NOT NULL AUTO_INCREMENT, add PRIMARY KEY (`id`);";
$query = mysqli_query($link,$sql)or die ('fail update data'.mysqli_error($link));
$query=null;




?>
<html lang="en">
 <?php include("head_register.php") ?>
  <body class="bg-dark">
   <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">View Data</div>
        <div class="card-body">
<h1>Check Table msCustomer_plain</h1>
<br>
<br>
We have just create table mscustomer_plain to show how we can encrypted plain data.
this table stil empty. click link below to fill some data
<br>
<br>
<a href="demo_encrypt_data_customer_plain_filldata_step2.php">Run this Statement</a> |
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
<br>
<?php
exit;

?>