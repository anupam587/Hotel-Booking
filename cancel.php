<?php
   $con = mysql_connect("localhost","root","anupam");

    if (!$con)
    {
     die('Could not connect: ' . mysql_error());
    }
    mysql_select_db("hotel", $con);
    
    $data="delete from guestinformation where guestid=$_POST[gid]";
    $result=mysql_query($data,$con);
    $data1="delete from cardinformation where guestid=$_POST[gid]";
    $result1=mysql_query($data1,$con);
    $data3="select * from reservation where guestid=$_POST[gid]";
    $result3=mysql_query($data3,$con);
    $row3=mysql_fetch_assoc($result3);
    $data2="delete from reservation where guestid=$_POST[gid]";
    $result2=mysql_query($data2,$con);
    mysql_close($con);
    $con1 = mysql_connect("localhost","root","anupam");

    if (!$con1)
    {
     die('Could not connect: ' . mysql_error());
    }
    mysql_select_db("hm", $con1);
    $data4="delete from reserve where Guestid=$_POST[gid]";
    $result4=mysql_query($data4,$con1);
    mysql_close($con1);

    echo "you successfully cacelled your booking";
?>
