<?php
$conn = mysqli_connect("localhost", "root", "", "login_db");

$affectedRow = 0;

$xml = simplexml_load_file("books.xml") or die("Error: Cannot create object");


/*
echo "<pre>";
foreach ($xml->Worksheet->Table->Row as $row) {
	$ID = $row->Cell[0];
    $BookID = $row->Cell[1];
	$BookCount = $row->Cell[2];
	$Author =$row->Cell[3];
	$PublicationYear =$row->Cell[4];
    $OriginalTitle = $row->Cell[5];
	$Title = $row->Cell[6];
    $LanguageCode = $row->Cell[7];
    $Average_rating = $row->Cell[8];
	print_r($row);
    
}
echo "</pre>";
*/


foreach ($xml->Worksheet->Table->Row as $row) {
    $ID = $row->Cell[0]->Data;
    $BookID = $row->Cell[1]->Data;
	$BookCount = $row->Cell[2]->Data;
	$Author =$row->Cell[4]->Data;
	$PublicationYear =$row->Cell[5]->Data;
    $OriginalTitle = $row->Cell[6]->Data;
	$Title = $row->Cell[7]->Data;
    $LanguageCode = $row->Cell[8]->Data;
    $Average_rating = $row->Cell[9] ? $row->Cell[9]->Data : '';
	$sql = "INSERT INTO `books`(id,BookID,BookCount,Author,PublicationYear,OriginalTitle,Title,LanguageCode,Average_rating)"
	." VALUES ({$ID} ,'{$BookID} ', '{$BookCount}', '{$Author}','{$PublicationYear}','{$OriginalTitle}','{$Title}','{$LanguageCode}','{$Average_rating}' )";
	
    $result = mysqli_query($conn, $sql);
    
    if (! empty($result)) {
        $affectedRow ++;
    } else {
        $error_message = mysqli_error($conn) . "\n";
    }
echo "<pre>";
echo "</pre>";
}
?>
<h2>Insert XML Data to MySql Table Output</h2>

<?php
if ($affectedRow > 0) {
    $message = $affectedRow . " records inserted";
} else {
    $message = "No records inserted";
}

?>