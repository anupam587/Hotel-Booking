<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
</head>

<body>
 <?php
    $con = mysql_connect("localhost","root","anupam");
    if (!$con)
    {
     die('Could not connect: ' . mysql_error());
    }
    mysql_select_db("hotel", $con);

    $datein=explode('/',$_POST['checkin']);
     
    $dateout=explode('/',$_POST['checkout']);

    //echo date_format($date,'y-mm-dd');
    $data="insert into tempreserve values(\"".$datein[2].$datein[0].$datein[1]."\",\"".$dateout[2].$dateout[0].$dateout[1]."\",$_POST[noofroom],$_POST[adults],$_POST[childrens])";   
    $result =mysql_query($data,$con);
    mysql_close($con);
    header('Location:roomselection.php'); 
    
 ?>
</body>

</html>
