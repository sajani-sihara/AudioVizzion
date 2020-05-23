<?php
include ("database.php");

$FrameCatalogID = $_POST["frameCatalogID"];
$FrameCatalogName = $_POST["frameCatalogName"];
$FrameDescription = $_POST["frameDescription"];
$FrameBrand = $_POST["frameBrand"];
$FrameModel = $_POST["frameModel"];
$FrameAvailability = $_POST["frameAvailability"];

$SQLDevice = "insert into w1714883_Device (w1714883_deviceCatalogId,w1714883_deviceCatalogName,w1714883_deviceDescrip,w1714883_availabilityStatus) values
(".$FrameCatalogID.",'".$FrameCatalogName."','".$FrameDescription."','".$FrameAvailability."'); 
";

$SQLVisualDevice = "insert into w1714883_Visual_Device(w1714883_deviceCatalogId, w1714883_frFlag, w1714883_frBrand, w1714883_frModel , w1714883_lensFlag) values
(".$FrameCatalogID.",true,'".$FrameBrand."','".$FrameModel."',false);
";

$exeSQLDevice=mysqli_query($conn,$SQLDevice);
$exeSQLVisualDevice=mysqli_query($conn,$SQLVisualDevice);

if (mysqli_errno($conn)==0)
	{ 
        echo "<p>A new frame has been added successfully.";
        echo "<p>Here are the details of the added frame:";
		echo "<p>Catalog ID: ".$FrameCatalogID;
        echo "<br>Catalog Name: ".$FrameCatalogName;
        echo "<br>Device Description: ".$FrameDescription;
		echo "<br>Device Brand: ".$FrameBrand;
		echo "<br>Device Model: ".$FrameModel;
		echo "<br>Availability: ".$FrameAvailability;
	}
	//checking for errors
	else
	{
		echo "<p>An error occured when entering the frame. Please try again.";
		//primary key repeated
		if (mysqli_errno($conn)==1062)
		{
			echo "<br>A frame with the same Catalog ID already exists. Please check the Catalog ID and try again. ";			
		}
		//details of the frame are not entered correctly
		if (mysqli_errno($conn)==1064)
		{
			echo "<br>Frame details were not entered correctly. Please try again.";			
		}
	}





?>