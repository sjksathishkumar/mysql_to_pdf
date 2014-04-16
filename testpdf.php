<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Test PDF</title>
</head>

<body>

<?php
//SHOW A DATABASE ON A PDF FILE
//CREATED BY: Carlos Vasquez S.
//E-MAIL: cvasquez@cvs.cl
//CVS TECNOLOGIA E INNOVACION
//SANTIAGO, CHILE

require('sql_to_pdf/fpdf.php');

		$host='localhost'; // Host Name.
    	$db_user= 'root'; //User Name
    	$db_password= '';
    	$db= 'sathish'; // Database Name.
    	$conn=mysql_connect($host,$db_user,$db_password) or die (mysql_error());
    	mysql_select_db($db) or die (mysql_error());


//Select the Products you want to show in your PDF file
$result=mysql_query("select * from emp",$conn);
$number_of_products = mysql_numrows($result);

//Initialize the 3 columns and the total
$column_id = "";
$column_name = "";
$column_branch = "";
$column_doj = "";
$column_bank_acc_no = "";
$column_bank_name = "";
$column_designation = "";
$column_emp_dep = "";
$column_asm = "";
$column_pf_no = "";
$column_esi_no = "";
$column_basic = "";
$column_utilty_allow = "";
$column_communication = "";
$column_mt_allow = "";
$column_spl_allow = "";
$column_house_rnt_allow = "";
$column_child_hstl_allow = "";
$column_project_allow = "";
$column_email = "";
$column_mobile = "";


//For each row, add the field to the corresponding column
while($row = mysql_fetch_array($result))
{
    $code = $row["emp_id"];
	$name = $row["emp_name"];
	$branch = $row["branch"];
	$doj = $row["dt_of_join"];
	$acc_no = $row["bank_acc_no"];
	$bank_name = $row["bank_name"];
	$designation =$row["designation"];
	$emp_dep = $row["emp_dep"];
	$asm = $row["asm"];
	$pf_no = $row["pf_no"];
	$esi_no = $row["esi_no"];
	$basic = $row["basic"];
	$utilty_allow = $row["utilty_allow"];
	$communication = $row["communication"];
	$mt_allow = $row["mt_allow"];
	$spl_allow = $row["spl_allow"];
	$house_rnt_allow = $row["house_rnt_allow"];
	$child_hstl_allow = $row["child_hstl_allow"];
	$project_allow = $row["project_allow"];
	$email = $row["email"];
	$mobile = $row["mobile"];

    $column_id = $column_id.$code."\n";
    $column_name = $column_name.$name."\n";
    $column_branch = $column_branch.$branch."\n";
	$column_doj = $column_doj.$doj."\n";
	$column_bank_acc_no = $column_bank_acc_no.$acc_no."\n";
	$column_bank_name = $column_bank_name.$bank_name."\n";
	$column_designation = $column_designation.$designation."\n";
	$column_emp_dep = $column_emp_dep.$emp_dep."\n";
	$column_asm = $column_asm.$asm."\n";
	$column_pf_no = $column_pf_no.$pf_no."\n";
	$column_esi_no = $column_esi_no.$esi_no."\n";
	$column_basic = $column_basic.$basic."\n";
	$column_utilty_allow = $column_utilty_allow.$utilty_allow."\n";
	$column_communication = $column_communication.$communication."\n";
	$column_mt_allow = $column_mt_allow.$mt_allow."\n";
	$column_spl_allow = $column_spl_allow.$spl_allow."\n";
	$column_house_rnt_allow = $column_house_rnt_allow.$house_rnt_allow."\n";
	$column_child_hstl_allow = $column_child_hstl_allow.$child_hstl_allow."\n";
	$column_project_allow = $column_project_allow.$project_allow."\n";
	$column_email = $column_email.$email."\n";
	$column_mobile = $column_mobile.$mobile."\n";

}
mysql_close();


//Create a new PDF file
$pdf=new FPDF('L');
$pdf->AddPage();

//Fields Name position
$Y_Fields_Name_position = 20;
//Table position, under Fields Name
$Y_Table_Position = 26;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(232,232,232);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',8);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(15,6,'EMP_ID',1,0,'C',1);
$pdf->SetX(20);
$pdf->Cell(30,6,'EMP_NAME',1,0,'C',1);
$pdf->SetX(50);
$pdf->Cell(20,6,'BRANCH',1,0,'C',1);
$pdf->SetX(70);
$pdf->Cell(25,6,'DATE_OF_JOIN',1,0,'C',1);
$pdf->SetX(95);
$pdf->Cell(25,6,'BANK_ACC_NO',1,0,'C',1);
$pdf->SetX(120);
$pdf->Cell(20,6,'BANK_NAME',1,0,'C',1);
$pdf->SetX(140);
$pdf->Cell(40,6,'DESIGNATION',1,0,'C',1);
$pdf->SetX(180);
$pdf->Cell(30,6,'EMP_DEPARTMENT',1,0,'C',1);
$pdf->SetX(210);
$pdf->Cell(20,6,'MOBILE',1,0,'C',1);
$pdf->SetX(230);
$pdf->Cell(60,6,'EMAIL',1,0,'C',1);
$pdf->Ln();

//Now show the 3 columns
$pdf->SetFont('Arial','',8);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(5);
$pdf->MultiCell(15,6,$column_id,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(20);
$pdf->MultiCell(30,6,$column_name,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(50);
$pdf->MultiCell(20,6,$column_branch,1,'L');
$pdf->SetY($Y_Table_Position);
$pdf->SetX(70);
$pdf->MultiCell(25,6,$column_doj,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(95);
$pdf->MultiCell(25,6,$column_bank_acc_no,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(120);
$pdf->MultiCell(20,6,$column_bank_name,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(140);
$pdf->MultiCell(40,6,$column_designation,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(180);
$pdf->MultiCell(30,6,$column_emp_dep,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(210);
$pdf->MultiCell(20,6,$column_mobile,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(230);
$pdf->MultiCell(60,6,$column_email,1);







//Create lines (boxes) for each ROW (Product)
//If you don't use the following code, you don't create the lines separating each row
$i = 0;
$pdf->SetY($Y_Table_Position);
while ($i < $number_of_products)
{
    $pdf->SetX(5);
    $pdf->MultiCell(285,6,'',1);
    $i = $i +1;
}

$pdf->AddPage();

//Fields Name position
$Y_Fields_Name_position = 20;
//Table position, under Fields Name
$Y_Table_Position = 26;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(232,232,232);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',8);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(15,6,'EMP_ID',1,0,'C',1);
$pdf->SetX(20);
$pdf->Cell(30,6,'ASM',1,0,'C',1);
$pdf->SetX(50);
$pdf->Cell(15,6,'PF_NO',1,0,'C',1);
$pdf->SetX(65);
$pdf->Cell(20,6,'ESI_NO',1,0,'C',1);
$pdf->SetX(85);
$pdf->Cell(15,6,'BASIC',1,0,'C',1);
$pdf->SetX(100);
$pdf->Cell(25,6,'UTILITY_ALLOW',1,0,'C',1);
$pdf->SetX(125);
$pdf->Cell(30,6,'COMMUNICATION',1,0,'C',1);
$pdf->SetX(155);
$pdf->Cell(20,6,'MT_ALLOW',1,0,'C',1);
$pdf->SetX(175);
$pdf->Cell(20,6,'SPL_ALLOW',1,0,'C',1);
$pdf->SetX(195);
$pdf->Cell(35,6,'HOUSE_RENT_ALLOW',1,0,'C',1);
$pdf->SetX(230);
$pdf->Cell(30,6,'CHILD_HSTL_ALLOW',1,0,'C',1);
$pdf->SetX(260);
$pdf->Cell(30,6,'PROJECT_ALLOW',1,0,'C',1);
$pdf->Ln();

//Now show the 3 columns
$pdf->SetFont('Arial','',8);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(5);
$pdf->MultiCell(15,6,$column_id,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(20);
$pdf->MultiCell(30,6,$column_asm,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(50);
$pdf->MultiCell(15,6,$column_pf_no,1,'L');
$pdf->SetY($Y_Table_Position);
$pdf->SetX(65);
$pdf->MultiCell(20,6,$column_esi_no,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(85);
$pdf->MultiCell(15,6,$column_basic,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(100);
$pdf->MultiCell(25,6,$column_utilty_allow,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(125);
$pdf->MultiCell(30,6,$column_communication,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(155);
$pdf->MultiCell(20,6,$column_mt_allow,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(175);
$pdf->MultiCell(20,6,$column_spl_allow,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(195);
$pdf->MultiCell(35,6,$column_house_rnt_allow,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(230);
$pdf->MultiCell(30,6,$column_child_hstl_allow,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(260);
$pdf->MultiCell(30,6,$column_project_allow,1);







//Create lines (boxes) for each ROW (Product)
//If you don't use the following code, you don't create the lines separating each row
$i = 0;
$pdf->SetY($Y_Table_Position);
while ($i < $number_of_products)
{
    $pdf->SetX(5);
    $pdf->MultiCell(285,6,'',1);
    $i = $i +1;
}


ob_end_clean();
$pdf->Output();
?>
</body>
</html>