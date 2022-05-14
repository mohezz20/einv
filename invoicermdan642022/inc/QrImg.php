<?php

    $rq=[];
    $rq['apiuser']='hodib';
    $rq['apikey']='46cce89752596953fdb3691aac8a320b';
    $rq['marchant']=$marchant;
    $rq['marchant2']=$marchant2;
    $rq['mydate']= $row['order_date'];
    $rq['vatnum']=$row['order_id'];
    $rq['withvat']=$row['order_total_tax1'];
    $rq['invalue']=$row['order_total_after_tax'];
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,'localhost/invoicermdan642022/m/qrtrial.php');
    curl_setopt($ch,CURLOPT_POST,1);
    curl_setopt($ch,CURLOPT_HEADER,0);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$rq);
    
    $Qrimg= curl_exec($ch);
    $BaseImage=base64_encode($Qrimg);
/* 
    $imageName='';
    if(strlen($Qrimg)>1){
        $imageName= 'images/'.time().'_'.$invoiceValues['order_id'].'.png';
        file_put_contents($imageName,$Qrimg);
    }else{
        $imageName='images/sksa.jpg';
    } */


?>