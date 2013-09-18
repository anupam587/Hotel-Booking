<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Room-Service Selection</title>
<script type="text/javascript" src="jquery.js"></script>

<style type="text/css">
body{
	width:100%;
}
#totalbody{
	width:650px;
	height:auto;
	background-position:center;
	margin-left:300px;
}
#logo{
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
#hotelinfo{
	font-size:1.3em;
	font-family:"Lucida Sans", "Lucida Sans Regular", "Lucida Grande", "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
}
#roomsearch{
	margin-top:30px;
	width:650px;
	height:auto;
	text-align:center;
	margin-left:40px;
	font-size:1.1em;
}
#roominfo{
	width:650px;
	height:auto;
}
#hotelinfo{
	text-align:center;
	width:650px;
	height:auto;
}
#roomaval{
	margin-top:20px;
}
.roomselect{
	width:100px;
	border:1px solid black;
	border-radius:2px;
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
    $data="select * from tempreserve";
    $result =mysql_query($data,$con);
    $row=mysql_fetch_assoc($result);    
    $noofroom=$row['noofroom'];
    $checkin= $row['checkin'];
    $checkout= $row['checkout'];
    $adult=$row['adult'];
    $children=$row['children'];
    $data1="delete from tempreserve";
    $result1 =mysql_query($data1,$con);
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
    $data9="select min(standard) from roomaval where vardate>='$checkin' and vardate<='$checkout' ";
    $result9 =mysql_query($data9,$con);
    $row9=mysql_fetch_assoc($result9);
    $data10="select min(delux) from roomaval where vardate>='$checkin' and vardate<='$checkout' ";
    $result10 =mysql_query($data10,$con);
    $row10=mysql_fetch_assoc($result10);
    $data11="select min(grand) from roomaval where vardate>='$checkin' and vardate<='$checkout' ";
    $result11 =mysql_query($data11,$con);
    $row11=mysql_fetch_assoc($result11);
    $data12="select * from package where name='diwali'";
    $result12 =mysql_query($data12,$con);
    $row12=mysql_fetch_assoc($result12);
    $data13="select * from package where name='family'";
    $result13 =mysql_query($data13,$con);
    $row13=mysql_fetch_assoc($result13);
    mysql_close($con);

?>

<div id="totalbody">
<div id="logo">
<img src="banner(747x130).jpg" style="width:650px;height:70px;"/>
</div>
<div class="heading">Hotel Reservation</div>
<div id="roominfo">
<div id="hotelinfo">
Sample Graywood Hotel <br/>
Miami, United States Of America
</div>
<div id="roomsearch">
<table  border="0" cellspacing="" cellpadding="">
<tr><td>Staying Date:</td>
<td id="checkindate"><?php echo $checkin;?></td>
<td >&nbsp;&nbsp;&nbsp;TO&nbsp;&nbsp;&nbsp;</td>
<td id="checkoutdate"><?php echo $checkout;?> </td>
</tr>
<tr><td>No of Rooms:</td>
<td id="roomno"><?php echo $noofroom;?></td>
</tr>
</table>
</div>
</div>
<div id="roomaval">
<div class="heading">Aviliable Rooms</div>
<div id="roomtypes">
<table border="0" cellpadding="" cellspacing="3px" style="text-align:center;">
<tr>
<th></th>
<th>Room Type</th>
<th>NO of Rooms</th>
<th>Aviliable Rooms</th>
<th>Cost/adult</th>
<th>No of Adult</th>
<th>Cost/children</th>
<th>No of children</th>
</tr>
<tr>
<td><input type="checkbox" id="standard" value="yes"/></td>
<td>Standard Room</td>
<td><input id="standardrooms" class="roomselect" type="text"/></td>
<td><?php echo $row9['min(standard)'];?></td>
<td><?php echo $row2['adult'];?></td>
<td><input id="standardadult" class="roomselect" type="text"/></td>
<td><?php echo $row2['children'];?></td>
<td><input id="standardchildren" class="roomselect" type="text"/></td>
</tr>
<tr>
<td><input type="checkbox" id="delux" value="yes"/></td>
<td>Delux Room</td>
<td><input id="deluxrooms" class="roomselect" type="text"/></td>
<td><?php echo $row10['min(delux)'];?></td>
<td><?php echo $row3['adult'];?></td>
<td><input id="deluxadult" class="roomselect" type="text"/></td>
<td><?php echo $row3['children'];?></td>
<td><input id="deluxchildren" class="roomselect" type="text"/></td>
</tr>
<tr>
<td><input type="checkbox" id="grand" value="yes"/></td>
<td>Grand Superior</td>
<td><input id="grandrooms" class="roomselect" type="text"/></td>
<td><?php echo $row11['min(grand)'];?></td>
<td><?php echo $row4['adult'];?></td>
<td><input id="grandadult" class="roomselect" type="text"/></td>
<td><?php echo $row4['children'];?></td>
<td><input id="grandchildren" class="roomselect" type="text"/></td>
</tr>
</table>
</div>
<div id="packeges">
<div class="heading">Packages</div>
<table border="0" cellspacing="3px" cellpadding="5px;" style="text-align:center;">
<tr>
<th></th>
<th style="width:200px;">Package Name</th>
<th style="width:200px;">Package Cost</th>
</tr>

<tr>
<td><input type="checkbox" id="diwali" name="" value="yes"/></td>
<td style="width:200px;">Deepawali Special Offer</td>
<td style="width:200px;"><?php echo $row12['cost'];?></td>
<td><a href="genralinfo.html">Details</a></td>
</tr>
<tr>
<td><input type="checkbox" id="family" name="" value="yes"/></td>
<td style="width:200px;">Family Package</td>
<td style="width:200px;"><?php echo $row13['cost'];?></td>
<td><a href="genralinfo.html">Details</a></td>
</tr>
</table>
</div>
<div id="services">
<div class="heading">Services</div>
<table border="0" cellpadding="" cellspacing="" style="text-align:center;">
<tr>
<th></th>
<th style="width:300px">Service Name</th>
<th style="width:100px">Price(in RS)</th>
<th style="width:200px">Quantity</th>
</tr>
<tr>
<td><input type="checkbox" id="spa" value="yes"/></td>
<td style="width:300px; text-align:center;">All Inclusive SPA Treatment</td>
<td style="width:100px"><?php echo $row5['cost'];?></td>
<td style="width:200px; text-align:center"><input id="spaquant" class="roomselect" type="text"/></td>
</tr>
<tr>
<td><input type="checkbox" id="sightseen" value="yes"/></td>
<td style="width:300px;text-align:center; " >Local Sightseeing Tour </td>
<td style="width:100px"><?php echo $row6['cost'];?></td>
<td style="width:200px; text-align:center;"><input id="sightquant" class="roomselect" type="text"/></td>
</tr>
<tr>
<td><input type="checkbox" id="airport" value="yes"/></td>
<td style="width:300px; text-align:center;">Exclusive Airport Transfer </td>
<td style="width:100px"><?php echo $row7['cost'];?></td>
<td style="width:200px; text-align:center;"><input id="airportquant" class="roomselect" type="text"/></td>
</tr>
<tr>
<td><input type="checkbox" id="breakfast" value="yes"/></td>
<td style="width:300px; text-align:center;">Breakfast </td>
<td style="width:100px"><?php echo $row8['cost'];?></td>
<td style="width:200px; text-align:center;"><input id="breakfastquant" class="roomselect" type="text"/></td>
</tr>

</table>
</div>
<div id="grandtotal">
<p style="border-top:1px solid black; margin-top:20px;"></p>
<input type="submit" onclick="calcharge()" style="background-color:#999966; margin-top:10px; margin-right:135px;color:white; border-radius:5px; width:150px; height:30px; font-size:1em;" value="TotalCharge"/>
</div>
<div id="totalcharge">
</div>
</div>
<div id="book">
<input type="submit" onclick="bookme()" style="background-color:#999966; margin-top:20px; margin-right:135px;color:white; border-radius:5px; width:150px; height:30px; font-size:1em;float:right;" value="BOOK"/>
<div id="bookinfo"></div>
</div>
</div>


<script type="text/javascript" language="javascript">
function calcharge(){
  
 var adultstandard=0;
 var childrenstandard=0;
 var roomsstandard=0;
 var adultdelux=0;
 var childrendelux=0;
 var roomsdelux=0;
 var adultgrand=0;
 var childrengrand=0;
 var roomsgrand=0;
 var packdiwali=0;
 var packfamily=0;
 var quantspa=0;
 var quantsight=0;
 var quantairport=0;
 var quantbreakfast=0;
 
 //alert(adultstandard);

 if(document.getElementById('standard').checked==true){
 var adultstandard=document.getElementById('standardadult').value;
 var childrenstandard= document.getElementById('standardchildren').value;
 var roomsstandard=document.getElementById('standardrooms').value;
 }
 
 
  
 if(document.getElementById('delux').checked==true) {
 var adultdelux=document.getElementById('deluxadult').value;
 var childrendelux= document.getElementById('deluxchildren').value;
 var roomsdelux=document.getElementById('deluxrooms').value;
 }
  
 
 if(document.getElementById('grand').checked==true) {
 var adultgrand=document.getElementById('grandadult').value;
 var childrengrand= document.getElementById('grandchildren').value;
 var roomsgrand=document.getElementById('grandrooms').value;
 }
 
 
if(document.getElementById('diwali').checked==true){
 var packdiwali=1;
}

if(document.getElementById('family').checked==true){
 var packfamily =1;
}

if(document.getElementById('spa').checked==true){
var quantspa=document.getElementById('spaquant').value;
}

if(document.getElementById('sightseen').checked==true){
var quantsight=document.getElementById('sightquant').value;
}

if(document.getElementById('airport').checked==true){
var quantairport=document.getElementById('airportquant').value;
}

if(document.getElementById('breakfast').checked==true){
var quantbreakfast=document.getElementById('breakfastquant').value;
}




$.post('totcharge.php',{standardadult:adultstandard,standardchildren:childrenstandard,standardrooms:roomsstandard,
       deluxadult:adultdelux,deluxchildren:childrendelux,deluxrooms:roomsdelux,
       grandadult:adultgrand,grandchildren:childrengrand,grandrooms:roomsgrand,
       spaquant:quantspa,sightquant:quantsight,airportquant:quantairport,breakfastquant:quantbreakfast,
       familypack:packfamily,diwalipack:packdiwali},function(data){
     $("#totalcharge").text(data);
    });


}
function bookme()
{

 var adultstandard=0;
 var childrenstandard=0;
 var roomsstandard=0;
 var adultdelux=0;
 var childrendelux=0;
 var roomsdelux=0;
 var adultgrand=0;
 var childrengrand=0;
 var roomsgrand=0;
 var packdiwali=0;
 var packfamily=0;
 var quantspa=0;
 var quantsight=0;
 var quantairport=0;
 var quantbreakfast=0;
 
 //alert(adultstandard);

 if(document.getElementById('standard').checked==true){
 var adultstandard=document.getElementById('standardadult').value;
 var childrenstandard= document.getElementById('standardchildren').value;
 var roomsstandard=document.getElementById('standardrooms').value;
 }
 
 
  
 if(document.getElementById('delux').checked==true) {
 var adultdelux=document.getElementById('deluxadult').value;
 var childrendelux= document.getElementById('deluxchildren').value;
 var roomsdelux=document.getElementById('deluxrooms').value;
 }
  
 
 if(document.getElementById('grand').checked==true) {
 var adultgrand=document.getElementById('grandadult').value;
 var childrengrand= document.getElementById('grandchildren').value;
 var roomsgrand=document.getElementById('grandrooms').value;
 }
 
 
if(document.getElementById('diwali').checked==true){
 var packdiwali=1;
}

if(document.getElementById('family').checked==true){
 var packfamily =1;
}

if(document.getElementById('spa').checked==true){
var quantspa=document.getElementById('spaquant').value;
}

if(document.getElementById('sightseen').checked==true){
var quantsight=document.getElementById('sightquant').value;
}

if(document.getElementById('airport').checked==true){
var quantairport=document.getElementById('airportquant').value;
}

if(document.getElementById('breakfast').checked==true){
var quantbreakfast=document.getElementById('breakfastquant').value;
}


var rooms=document.getElementById('roomno').innerHTML;
var datein=document.getElementById('checkindate').innerHTML;
var dateout=document.getElementById('checkoutdate').innerHTML;

//var checkin=<?php echo $checkin;?>;
//alert(datein);
//alert(dateout); 

$.post('bookstatus.php',{standardadult:adultstandard,standardchildren:childrenstandard,standardrooms:roomsstandard,
       deluxadult:adultdelux,deluxchildren:childrendelux,deluxrooms:roomsdelux,
       grandadult:adultgrand,grandchildren:childrengrand,grandrooms:roomsgrand,
       spaquant:quantspa,sightquant:quantsight,airportquant:quantairport,breakfastquant:quantbreakfast,
       familypack:packfamily,diwalipack:packdiwali,room:rooms,checkin:datein,checkout:dateout},function(data){
       //alert(data);
      if(data=="notok"){  
      $("#bookinfo").text("WARNING: Error in no of room of this Transaction");
      }
      else{
      window.location='guest_information.php';
       }
    });


}
function checktest()
{
//alert('inside check');

}
</script>
</body>

</html>
