<?php
    $Cname=$_POST['marchant'];
	$Cname2=$_POST['marchant2'];
    $date = date_create($_POST['mydate']);
    $transDate=date_format($date, 'Y-m-dTH:i:sZ');//"2021-07-12T14:25:09Z";
    $vat=$_POST['vatnum'];
    $tax=$_POST['withvat'];
    $total=$_POST['invalue'];
    $Sstring=
     chr(1).chr(strlen($Cname)).$Cname
	.chr(2).chr(strlen($Cname2)).$Cname2
    .chr(3).chr(strlen($transDate)).$transDate
    .chr(4).chr(strlen($total)).$total
   .chr(5).chr(strlen($tax)).$tax;
    //$Sstring1= str_replace(PHP_EOL,'',$Sstring);
    include './phpqrcode/qrlib.php';
    QRcode::png(base64_encode( $Sstring),false,QR_ECLEVEL_Q,6,10);
    
?>