<?php
//print_invoice.php
//include 'Invoice.php';

if(isset($_GET["pdf"]) && isset($_GET["id"]))
{
      include('database_connection.php');
/*
      require_once('./stock/tcpdf/tcpdf.php');  

        class MYPDF extends TCPDF {
          public function Header() {
             $this->SetFont('aealarabiya', 'I', 15);
                   // parent::header();
               $this->Cell(189, 8, "", 0, 1, 'L', 0, '', 0, false, 'M', 'C');
               $this->Cell(189, 8, "الرجاء كتابة الاسم التجاري هنا", 10, 10, 'C', 0, '', 0, false, 'M', 'C');
          }

           // Page footer
           public function Footer()
           {
               $this->SetFont('aealarabiya', '', 10);
               parent::Footer();
               $this->Cell(0, 5, "", 0, 1, 'L', 0, '', 0, false, 'M', 'M');
               $this->Cell(0, 8, "امدرمان  الفتيحاب مربع 4 شارع الشقلة جوار مدرسة الصدى الثانوية  ت- 0116846548           "  .date("dS M Y H:i")."", 0, 1, 'L', 0, '', 0, false, 'M', 'C');
           }

          }
          $obj_pdf = new MYPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', true);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("فاتورة");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('Arial');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins('5', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(true);  
      $obj_pdf->setPrintFooter(true);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('aealarabiya', '', 12);  

      $obj_pdf->AddPage();  
*/
 $output = '';
 $statement = $connect->prepare("
  SELECT * FROM tbl_order 
  WHERE order_id = :order_id
  LIMIT 1
 ");
 $statement->execute(
  array(
   ':order_id'       =>  $_GET["id"]
  )
 );
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output .= '
 <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img align="center" width="300px" height="150px" src = "images/logo.jpeg" alt = "Test Image" /></br></div>
      <table width="20%" align="left" border="0" cellpadding="1" cellspacing="0">
      <tr>
	
	<td colspan="2" align="center" style="font-size:14px"><b>مؤسسة الربيع لتاجير المعدات</b></td>
	</tr>
	<tr>
		<td colspan="2" align="center" style="font-size:14px"><b>AL Rabie Equipment Rental</b></td>
	</tr>
	<tr>
		<td colspan="2" align="center" style="font-size:14px"><b>حى السكة الحديد-بجوار بقالة روائع المعروف</b></td>
	</tr>
	<tr>
		<td colspan="2" align="center" style="font-size:14px"><b>المدينة المنورة0546624256-051688338</b></td>
	</tr>
	<tr>
		<td colspan="2" align="center" style="font-size:14px"><b>..................................................................................................</b></td>
	</tr>
	<tr>
		<td colspan="2" align="center" style="font-size:14px"><b>فاتورة ضريبية مبسطة</b></td>
	</tr>
	<tr>
		<td colspan="2" align="center" style="font-size:14px"><b>..................................................................................................</b></td>
	</tr>
	
	<tr>
		<td colspan="2" align="center" style="font-size:14px"><b>رقم الفاتورة :  '.$row["order_id"].'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>تاريخ الفاتورة : '.$row["order_date"].'</b></td>
	</tr>
	<tr>
		<td colspan="2" align="center" style="font-size:14px"><b>..................................................................................................</b></td>
	</tr>
	<tr>
		<td colspan="2" align="center" style="font-size:14px"><b>الرقم الضريبى:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;304567876543903</b></td>
	</tr>
	<tr>
		<td colspan="2" align="center" style="font-size:14px"><b>..................................................................................................</b></td>
	</tr>
	<tr>
		<td colspan="2" align="center" style="font-size:14px"><b>اسم العميل : '.$row["order_receiver_name"].'</b>&nbsp;&nbsp;&nbsp;&nbsp;<b>العنوان : '.$row["order_receiver_address"].'</b></td>
	</tr>
		<tr>
		<td colspan="2" align="center" style="font-size:14px"><b>..................................................................................................</b></td>
	</tr>
      <tr>
        <td colspan="2" align="right">
        <table width="100%" cellpadding="1">
          <!--<tr>
            <td width="35%">
          <br>
          <br>
            رقم الفاتورة :  '.$row["order_id"].' <br />
             تاريخ الفاتورة : '.$row["order_date"].'<br />
            </td>

            <td width="65%">
              <b>الي :</b><br />
              اسم العميل : '.$row["order_receiver_name"].'<br />  
               العنوان : '.$row["order_receiver_address"].'<br />
            </td>
          </tr>-->
        </table>
    <br />
      <table width="100%" border="1" cellpadding="2" cellspacing="0">
       <tr>
        <th align="center" width="6%" rowspan="2">المجموع</th>
       <!-- <th align="center" width="15%" colspan="2">الضريبة 3 (%)</th>-->
        <th align="center" width="15%" colspan="2">بدل تالف</th>
        <th align="center" width="15%" colspan="2">ض.قيمة مضافة</th>
        <th align="center" width="10%">الايجار</th>
        <th align="center" width="10%">اجر يوم</th>
        <th align="center" width="3%">الايام</th>
        <th align="center" width="22%">اسم المعدة </th>
        <th align="center" width="3%">م</th>
       </tr>
       <tr>
       <!-- <th align="right">المبلغ.</th>-->
       <!-- <th align="right" width="7.5%">النسبة</th>-->
        <th align="right">المبلغ.</th>
        <th align="right" width="7.5%">النسبة</th>
        <th align="right">المبلغ.</th>
        <th align="right" >النسبة</th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
       </tr>';
  $statement = $connect->prepare(
   "SELECT * FROM tbl_order_item 
   WHERE order_id = :order_id"
  );
  $statement->execute(
   array(
    ':order_id'       =>  $_GET["id"]
   )
  );
  $item_result = $statement->fetchAll();
  $count = 0;
  foreach($item_result as $sub_row)
  {
   $count++;
   $output .= '
   <tr font-size="3px">
    <td align="center">'.$sub_row["order_item_final_amount"].'</td>
   <!-- <td align="center">'.$sub_row["order_item_tax3_amount"].'</td>-->
   <!-- <td align="center">'.$sub_row["order_item_tax3_rate"].'%</td>-->
    <td align="center">'.$sub_row["order_item_tax2_amount"].'</td>
    <td align="center">'.$sub_row["order_item_tax2_rate"].'%</td>
    <td align="center">'.$sub_row["order_item_tax1_amount"].'</td>
    <td align="center">'.$sub_row["order_item_tax1_rate"].'%</td>
    <td align="center">'.$sub_row["order_item_actual_amount"].'</td>
    <td align="center">'.$sub_row["order_item_price"].'</td>
    <td align="center">'.$sub_row["order_item_quantity"].'</td>
    <td align="center">'.$sub_row["item_name"].'</td>
    <td align="center">'.$count.'</td>
   </tr>
   ';
  }
  $output .= '
  <tr>
   <td align="center"><b>'.$row["order_total_after_tax"].'</b>ريال</td>
   <td align="right" colspan="11"><b>اجمالى الايجار شامل الضريبة</b></td>
  </tr>
  <tr>
   <td align="center"><b>'.$row["order_total_before_tax"].'</b>ريال</td>
   <td colspan="11" align="right"><b>اجمالى الايجار قبل الضريبة</b></td>
  </tr>
  <tr>
   <td align="center"><b>'.$row["order_total_tax1"].'</b>ريال</td>
   <td colspan="11" align="right">مبلغ ضريبة القيمة المضافة</td>
  </tr>
  <tr>
   <td align="center"><b>'.$row["order_total_tax2"].'</b>ريال</td>
   <td colspan="11" align="right">مبلغ بدل الفاقد والتالف</td>
  </tr>
  <tr>
   <td align="center">'.$row["order_total_tax3"].'</td>
   <td colspan="11" align="right">الضريبة 3 :</td>
  </tr>
  <!--<tr>
   <td align="center">'.$row["order_total_tax"].'</td>
   <td colspan="11" align="right"><b>اجمالي مبلغ الضريبة</b></td>
  </tr>-->
  <tr>
   <td align="center"><b>'.$row["order_total_after_tax"].'</b>ريال</td>
   <td colspan="11" align="right"><b>صافى المطلوب من العميل</b></td>
  </tr>
  </table>
  
  ';
  $marchant='مؤسسة الربيع لتاجير المعدات';
  $marchant2='301234567891203';
	include './inc/QrImg.php';
	//echo $imageName;
	//exit();
$output .= '
	</table>
	</td>
	</tr>
	</table>';
	$output .= '
	</table>
	</td>
	
	</table><br>
	<div align="left" font="1px" ><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>all rights @rs soft-hodib78@gmail</b></td></div><br>
	<div><td  align="center" style="font-size:12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>THANK YOU</b></td></div><br>
	<div><td  align="center" style="font-size:12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>نسخة العميل</b></td></div><br>
	<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img width="200px" height="200px"src = " data:image/jpeg;base64,'.$BaseImage.'" alt = "Test Image" /></div><br>
	<div><td  align="left" style="font-size:12px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>الفاتورة الالكترونية QR</b></td><br></div>
		</tr>
	</table>';

	
	
	
  $output .= '
      </table>
     </td>
    </tr>
   </table>
  ';
  
  echo $output;
	exit;
 }
      $obj_pdf->writeHTML($output);  
      ob_end_clean();
      $obj_pdf->Output('sample.pdf', 'I'); 
}
?>