<?php
$con = mysql_connect("localhost","root","anupam");
    if (!$con)
    {
     die('Could not connect: ' . mysql_error());
    }
    mysql_select_db("hotel", $con);
    
    $data2="select * from roomcost where roomtype='standard'";
    $result2 =mysql_query($data2,$con);
    $row2=mysql_fetch_assoc($result2);
    $data3="select * from roomcost where roomtype='delux'";
    $result3 =mysql_query($data3,$con);
    $row3=mysql_fetch_assoc($result3);
    $data4="select * from roomcost where roomtype='grandsuperior'";
    $result4 =mysql_query($data4,$con);
    $row4=mysql_fetch_assoc($result4);
    $data5="select * from service where name='spa'";
    $result5 =mysql_query($data5,$con);
    $row5=mysql_fetch_assoc($result5);
    $data6="select * from service where name='sightseen'";
    $result6 =mysql_query($data6,$con);
    $row6=mysql_fetch_assoc($result6);
    $data7="select * from service where name='airport'";
    $result7 =mysql_query($data7,$con);
    $row7=mysql_fetch_assoc($result7);
    $data8="select * from service where name='breakfast'";
    $result8 =mysql_query($data8,$con);
    $row8=mysql_fetch_assoc($result8);
    $data12="select * from package where name='diwali'";
    $result12 =mysql_query($data12,$con);
    $row12=mysql_fetch_assoc($result12);
    $data13="select * from package where name='family'";
    $result13 =mysql_query($data13,$con);
    $row13=mysql_fetch_assoc($result13);
    
    mysql_close($con);

$totalcharge=$_POST['standardadult']*$row2['adult']+$_POST['standardchildren']*$row2['children']+
                  $_POST['deluxadult']*$row3['adult']+$_POST['deluxchildren']*$row3['children']+
                  $_POST['familypack']*$row13['cost']+$_POST['diwalipack']*$row12['cost']+
                  $_POST['spaquant']*$row5['cost']+$_POST['sightquant']*$row6['cost']+$_POST['airportquant']*$row7['cost']+$_POST['breakfastquant']*$row8['cost']+
                  $_POST['grandchildren']*$row4['children']+$_POST['grandadult']*$row4['adult'];
echo "Total Booking Cost:   "; 
echo $totalcharge;

?>
