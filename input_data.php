<?php
//Creates new record as per request
    //Connect to database
    $servername = "localhost";
    $username = "root";
    $pass = "";
    $db = "nodemcu";
// http://192.168.56.1/postData/postdemo.php //api for Arduino IDE code
    // Create connection
    $conn = new mysqli($servername, $username, $pass, $db);
    // Check connection
    if ($conn->connect_error) {
        die("Database Connection failed: " . $conn->connect_error);
    }

    //Get current date and time
    date_default_timezone_set('Asia/Kolkata');
    $d = date("Y-m-d");
    // echo "Date: ".$d." ";
    $t = date("H:i:s");

    //post data
    if(!empty($_POST['mac']) && !empty($_POST['kelembaban']) && !empty($_POST['suhu']) && !empty($_POST['volt']) && !empty($_POST['amper']) && !empty($_POST['watt']) && !empty($_POST['kwh']) && !empty($_POST['hertz']) && !empty($_POST['pff']))
    {
        $mac = $_POST['mac'];
        $kelembaban = $_POST['kelembaban'];
        $suhu = $_POST['suhu'];
        $volt = $_POST['volt'];
        $amper = $_POST['amper'];
        $watt = $_POST['watt'];
        $kwh = $_POST['kwh'];
        $hertz = $_POST['hertz'];
        $pff = $_POST['pff'];
        //insert data from microcontroler into db
	    $sql = "INSERT INTO datas (mac, kelembaban, suhu, volt, amper, watt, kwh, hertz, pff)
		
		VALUES ('".$mac."','".$kelembaban."', '".$suhu."', '".$volt."', '".$amper."','".$watt."','".$kwh."','".$hertz."','".$pff."')";

		if ($conn->query($sql) === TRUE) {
		    echo "Berhasil Input Data";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}


	$conn->close();
?>