<?php
include "db.php";
$sn=$_POST['dist'];
$fn=$_POST['mandal']; 
$fname=strtoupper($_POST['name']);
$lname=strtoupper($_POST['lname']);
$fullname=$fname."  ".$lname;
$de=$_POST['designation'];
$bank=$_POST['bank'];
$month=$_POST['month'];
$acc=$_POST['accountnum'];
$branch=strtoupper($_POST['branch']);
$ifsc=strtoupper($_POST['ifsc']);
$from=$_POST['from'];
$f=date("d/m/Y",strtotime($from));
$to=$_POST['to'];
$t=date("d/m/Y",strtotime($to));
$no=$_POST['no'];
$total=$_POST['total'].".";
$final=15-($no+$total);
$tot=$final.".";
$sign=$_POST['sign'].".";
$office=strtoupper($_POST['office']);
$present=date("d/m/Y") ;
$sql3="select * from dist where id=$sn";
$result3 = $conn->query($sql3);
$row3 = $result3->fetch_assoc();
$dname=$row3['d_name'];
$sql1="select * from mandal where id=$fn";
$result1 = $conn->query($sql1);
$row1 = $result1->fetch_assoc();
$mname=$row1['m_name'];
?>
<?php
include('mpdf/vendor/autoload.php');
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4']);
$mpdf->autoScriptToLang = true;
$mpdf->baseScript = 1;
$mpdf->autoLangToFont = true;
$mpdf->SetDefaultBodyCSS('background', "url('1.jpg')");
$mpdf->SetDefaultBodyCSS('background-image-resize', 6);
$html1="<div style='position:absolute; font-size:13px; left:155px; top:400px;'><b>$dname</b></div>";
$html2="<div style='position:absolute; font-size:13px; left:560px; top:400px;'><b>$f</b></div>";
$html3="<div style='position:absolute; font-size:13px; left:665px; top:400px;'><b>$t</b></div>";
$html4="<div style='position:absolute; font-size:13.5px; left:490px; top:454px;'><b>$bank</b></div>";
$html5="<div style='position:absolute; font-size:15px; left:305px; top:452px;'><b>$acc</b></div>";
$html6="<div style='position:absolute; font-size:16px; left:405px; top:288px;'><b>$fullname</b></div>";
$html7="<div style='position:absolute; font-size:15px; left:90px; top:343px;'><b>$de</b></div>";
$html8="<div style='position:absolute; font-size:13px; left:346px; top:346px;'><b>$office</b></div>";
$html9="<div style='position:absolute; font-size:11.5px; left:605px; top:347px;'><b>$mname</b></div>";
$html10="<div style='position:absolute; font-size:15px; left:94px; top:505px;'><b>$branch</b></div>";
$html11="<div style='position:absolute; font-size:15px; left:438px; top:505px;'><b>$ifsc</b></div>";
$html12="<div style='position:absolute; font-size:18px; left:600px; top:150px;'><b>$month</b></div>";
$html13="<div style='position:absolute; font-size:14.5px; left:610px; top:190px;'><b>$present</b></div>";
$html14="<div style='position:absolute; font-size:15px; left:627px; top:816px;'><b>$sign</b></div>";
$html15="<div style='position:absolute; font-size:13px; left:520px; top:843px;'><b>$office</b></div>";
$html16="<div style='position:absolute; font-size:13.5px; left:352px; top:560px;'><b>$no</b></div>";
$html17="<div style='position:absolute; font-size:13.5px; left:352px; top:592px;'><b>$total</b></div>";
$html18="<div style='position:absolute; font-size:13.5px; left:348px; top:625px;'><b>$tot</b></div>";

$mpdf->WriteHTML($html1);
$mpdf->WriteHTML($html2);
$mpdf->WriteHTML($html3);
$mpdf->WriteHTML($html4);
$mpdf->WriteHTML($html5);
$mpdf->WriteHTML($html6);
$mpdf->WriteHTML($html7);
$mpdf->WriteHTML($html8);
$mpdf->WriteHTML($html9);
$mpdf->WriteHTML($html10);
$mpdf->WriteHTML($html11);
$mpdf->WriteHTML($html12);
$mpdf->WriteHTML($html13);
$mpdf->WriteHTML($html14);
$mpdf->WriteHTML($html15);
$mpdf->WriteHTML($html16);
$mpdf->WriteHTML($html17);
$mpdf->WriteHTML($html18);
$mpdf -> output();
?>