<?php
$con = mysql_connect("localhost","root","anupam");
    if (!$con)
    {
     die('Could not connect: ' . mysql_error());
    }
mysql_select_db("hotel", $con);

$data="select min(standard) from roomaval where vardate>='2012-10-27' ";
$result =mysql_query($data,$con);
//echo $result;
$row=mysql_fetch_assoc($result);
echo $row['min(standard)'];
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>

<link rel="stylesheet" href="jquery-ui.css" />
    <script type="text/javascript" src="jquery-1.8.2.js"></script>
    <script type="text/javascript" src="jquery-ui.js"></script>
    <link rel="stylesheet" href="resources/demos/style.css" />
    <script type="text/javascript" language="javascript">
    $(function() {
        $( ".datepicker" ).datepicker();
    });
    </script>

</head>

<body>

<input id="datebox1" type="text" class="datepicker" name="checkin"/>
<input type="submit" value="submit" onclick="calcharge()" />

<script type="text/javascript" language="javascript">
function calcharge(){

$.post('totcharge.php',{},function(data){
     alert(data);
});
}
</script> 
</body>

</html>
