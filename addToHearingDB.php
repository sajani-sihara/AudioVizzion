<?php
include ("database.php");

$HearingCatalogID = $_POST["hearingCatalogID"];
$HearingCatalogName = $_POST["hearingCatalogName"];
$HearingDescription = $_POST["hearingDescription"];
$HearingMake = $_POST["hearingMake"];
$HearingModel = $_POST["hearingModel"];
$HearingAvailability = $_POST["hearingAvailability"];

$SQLDevice = "insert into w1714883_Device (w1714883_deviceCatalogId,w1714883_deviceCatalogName,w1714883_deviceDescrip,w1714883_availabilityStatus) values
(".$HearingCatalogID.",'".$HearingCatalogName."','".$HearingDescription."','".$HearingAvailability."'); 
";

$SQLHearingDevice = "insert into w1714883_Hearing_Device(w1714883_deviceCatalogId,w1714883_hdMake,w1714883_hdModel ) values
(".$HearingCatalogID.",'".$HearingMake."','".$HearingModel."');
";

$exeSQLDevice=mysqli_query($conn,$SQLDevice);
$exeSQLHearingDevice=mysqli_query($conn,$SQLHearingDevice);

if (mysqli_errno($conn)==0)
	{ 
        echo "<p>A new hearing device has been added successfully.";
        echo "<p>Here are the details of the added hearing device:";
		echo "<p>Catalog ID: ".$HearingCatalogID;
        echo "<br>Catalog Name: ".$HearingCatalogName;
        echo "<br>Device Description: ".$HearingDescription;
		echo "<br>Device Make: ".$HearingMake;
		echo "<br>Device Model: ".$HearingModel;
		echo "<br>Availability: ".$HearingAvailability;
	}
	//checking for errors
	else
	{
		echo "<p>An error occured when entering the hearing device. Please try again.";
		//primary key repeated
		if (mysqli_errno($conn)==1062)
		{
			echo "<br>A hearing device with the same Catalog ID already exists. Please check the Catalog ID and try again. ";			
		}
		//details of the frame are not entered correctly
		if (mysqli_errno($conn)==1064)
		{
			echo "<br>Hearing device details were not entered correctly. Please try again.";			
		}
	}
?>