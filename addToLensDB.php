<?php
include ("database.php");

$LensCatalogID = $_POST["lensCatalogID"];
$LensCatalogName = $_POST["lensCatalogName"];
$LensDescription = $_POST["lensDescription"];
$LensSerialNum = $_POST["lensSerialNum"];
$LensVisionType = $_POST["lensVisionType"];
$LensTint = $_POST["lensTint"];
$LensThinness = $_POST["lensThinness"];
$LensAvailability = $_POST["lensAvailability"];

$SQLDevice = "insert into w1714883_Device (w1714883_deviceCatalogId,w1714883_deviceCatalogName,w1714883_deviceDescrip,w1714883_availabilityStatus) values
(".$LensCatalogID.",'".$LensCatalogName."','".$LensDescription."','".$LensAvailability."'); 
";

$SQLVisualDevice = "insert into w1714883_Visual_Device(w1714883_deviceCatalogId, w1714883_frFlag, w1714883_lensFlag, w1714883_lensSerialNb, w1714883_lensVisionType,w1714883_lensTint, w1714883_lensThinnessLevel) values
(".$LensCatalogID.",false,true,'".$LensSerialNum."','".$LensVisionType."','".$LensTint."','".$LensThinness."' );
";

$exeSQLDevice=mysqli_query($conn,$SQLDevice);
$exeSQLVisualDevice=mysqli_query($conn,$SQLVisualDevice);

if (mysqli_errno($conn)==0)
	{ 
        echo "<p>A new lens has been added successfully.";
        echo "<p>Here are the details of the added lens:";
		echo "<p>Catalog ID: ".$LensCatalogID;
        echo "<br>Catalog Name: ".$LensCatalogName;
        echo "<br>Device Description: ".$LensDescription;
		echo "<br>Serial Number: ".$LensSerialNum;
        echo "<br>Vision Type: ".$LensVisionType;
        echo "<br>Lens Tint: ".$LensTint;
        echo "<br>Lens Thinness Level: ".$LensThinness;
		echo "<br>Availability: ".$LensAvailability;
	}
	
	//checking for errors
	else
	{
		echo "<p>An error occured when entering the lens. Please try again.";
		//primary key repeated
		if (mysqli_errno($conn)==1062)
		{
			echo "<br>A lens with the same Catalog ID already exists. Please check the Catalog ID and try again. ";			
		}
		//details of the frame are not entered correctly
		if (mysqli_errno($conn)==1064)
		{
			echo "<br>Lens details were not entered correctly. Please try again.";			
		}
	}
?>