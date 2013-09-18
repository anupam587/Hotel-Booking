<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Room and Facilities</title>
<style type="text/css">
body{
	width:100%;
}
#totalbody{
	width:650px;
	height:auto;
	margin-left:auto;
	margin-right:auto;
}
#roomview{
	width:650px;
	height:auto;
}
.heading{
	width:650px;
	height:30px;
	background-color:#CCCCCC;
	color:white;
	font-size:1.3em;
	text-align:center;
	margin-top:20px;
}
#logo{
	width:650px;
	height:auto;
}
.subheading{
	width:200px;
	height:20px;
	background-color:#CCCCCC;
	color:white;
	font-size:1.1em;
    text-align:center;
	margin-top:10px;
}
.viewfacility{
	width:400px;
	height:300px;
	float:left;
}
.roomimg{
	width:220px;
	height:300px;
	float:right;
	border-left:1px solid #999966;
}
#standard{
	width:650px;
	height:350px;
}
#grand{
	width:650px;
	height:350px;
}
#delux{
	width:650px;
	height:350px;
}
#menunavigation{
	width:400px;
	height:30px;	
    padding-top:8px;
}
.submenu{
    list-style:none;
	width:95px;
	height:25px;
	float:left;
    background-color:#AEC2E8; 
    margin-left:3px;
    border:1px solid #292929;
    border-radius:2px;
    text-align:center;
}
.submenu:hover{
	background-color:gray;
	cursor:pointer;
	color:white;
}
#navigation{
	width:600px;
	height:40px;
	margin-top:20px;	
}

</style>
</head>

<body>
   <?php
   $con = mysql_connect("localhost","root","anupam");

    if (!$con)
    {
     die('Could not connect: ' . mysql_error());
    }
    mysql_select_db("hotel", $con);
    $data1="select * from roomview where name='standard'";
    $result1=mysql_query($data1,$con);
    $row1=mysql_fetch_assoc($result1);
    
    $data2="select * from roomfacility where name='standard'";
    $result2=mysql_query($data2,$con);
    $row2=mysql_fetch_assoc($result2);

    $data3="select * from roomview where name='delux'";
    $result3=mysql_query($data3,$con);
    $row3=mysql_fetch_assoc($result3);
    
    $data4="select * from roomfacility where name='delux'";
    $result4=mysql_query($data4,$con);
    $row4=mysql_fetch_assoc($result4);
    
    $data5="select * from roomview where name='grand'";
    $result5=mysql_query($data5,$con);
    $row5=mysql_fetch_assoc($result5);
    
    $data6="select * from roomfacility where name='grand'";
    $result6=mysql_query($data6,$con);
    $row6=mysql_fetch_assoc($result6);

         
   ?>
 <div id="totalbody">
 <div id="logo">
 <img src="banner(747x130).jpg" style="width:650px;height:60px;"/>
 </div>
<div id="navigation">
<ul id="menunavigation">
<a href="hotel_reservation.html"><li class="submenu">Home</li></a>
<a href="genralinfo.html"><li class="submenu">Genral Info</li></a>
<a href="http://localhost/hotelbooking/room_and_facilities.php"><li class="submenu">Room-Facilty</li></a>
<a href="hotelpolicy.html"><li class="submenu">Hotel Pollicy</li></a>
</ul>
</div>
 <div id="roomview">
 
 <div id="standard">
 <div class="heading">Standard Room</div>
 <div class="viewfacility">
 <div class="subheading">View</div>
 
 <div id="standardview"><?php echo $row1['view'];?>
 </div>
 
 <div class="subheading">Facility</div>
 <div id="standardfacility"><?php echo $row2['facility'];?>

 </div>
 
 </div>
 <div class="roomimg">
 <img src="standard.jpg" style="width:210px;float:right;height:auto;margin-top:30px;"/>

 </div>
 </div>
 
 <div id="delux">
 <div class="heading">Delux</div>
 <div class="viewfacility">
 <div class="subheading">View</div>
 
 <div id="deluxview"><?php echo $row3['view'];?>

 </div>
 
 <div class="subheading">Facility</div>
 <div id="deluxfacility"><?php echo $row4['facility'];?>

 </div>

 </div>
 <div class="roomimg">
 <img src="delux.jpg" style="width:210px;float:right;height:auto;margin-top:30px;"/>

 </div>


 </div>
 
 <div id="grand">
 <div class="heading">Grand Superior</div>
 <div class="viewfacility">
 <div class="subheading">View</div>
 
 <div id="grandview"><?php echo $row5['view'];?>

 </div>
 
 <div class="subheading">Facility</div>
 <div id="grandfacility"><?php echo $row6['facility'];?>

 </div>

 </div>
 <div class="roomimg">
 <img src="grand.jpg" style="width:210px;float:right;height:auto;margin-top:30px;"/>
 </div>


 </div>
 
 </div>
 </div>
</body>

</html>
