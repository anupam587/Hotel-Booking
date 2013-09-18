<!DOCTYPE html>
<html lang="en"> 
<head>
<meta charset="utf-8">
<title>Guest Information</title>
<script type="text/javascript" src="jquery.js"></script>
<style type="text/css">
body{
	width:100%;

}
#totalbody{
    margin-left:auto;
    margin-right:auto;
	width:650px;
	height:auto;
}
#logo{
	width:650px;
	height:auto;
}
#guestdetail{
    margin-top:20px;
	width:650px;
	height:auto;
}
#carddetail{
    margin-top:20px;
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
.inputbox{
	margin-left:30px;
	border:1px solid #292929;
    border-radius:3px;

}
#guestcontent{
	margin-top:20px;
}
#cardcontent{
	margin-top:20px;
	border-bottom:2px solid #999966;
}
#attention{
	background-color:#999966;
	border:2px solid #292929;
	border-radius:3px;
	margin-top:10px;
}
#guestcarddetail{
	margin-left:auto;
	margin-right:auto;
	width:650px;
	height:auto;
}
#roominfo{
	width:650px;
	height:auto;
}
#hotelinfo{
	text-align:center;
	width:650px;
	height:auto;
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
    $data="select * from tempbook";
    $result=mysql_query($data,$con);
    $row=mysql_fetch_assoc($result);
    $data1="delete from tempbook";
    $result1=mysql_query($data1,$con);
    mysql_close($con);
?>
<div id="totalbody">
<div id="logo">
<img src="banner(747x130).jpg" style="width:650px;height:60px"/>
</div>
<div id="guestcarddetail">
<div class="heading">Hotel Reservation</div>
<div id="roominfo">
<div id="hotelinfo">
Sample Graywood Hotel <br/>
Miami, United States Of America
</div>
<div id="roomsearch">
<table  border="0" cellspacing="" cellpadding="">
<tr><td>Staying Date:</td>
<td id="checkindate"><?php echo $row['checkin'];?></td>
<td >&nbsp;&nbsp;&nbsp;TO&nbsp;&nbsp;&nbsp;</td>
<td id="checkoutdate"><?php echo $row['checkout'];?> </td>
</tr>
<tr><td>No of Rooms:</td>
<td id="roomno"><?php echo $row['standard']+$row['delux']+$row['grand'];?></td>
</tr>
</table>
</div>
</div>
<div id="guestdetail">
<div class="heading">Guest Details</div>
<div id="guestcontent">
<table border="0" cellspacing="" cellpadding="">
<tr>
<td>Guest Name* </td>
<td><input id="gname" class="inputbox" type="text"/></td>
</tr>
<tr>
<td>Company Name*</td>
<td><input id="gcompname" class="inputbox"  type="text"/></td>
</tr>
<tr>
<td>Address* </td>
<td><textarea id="gaddress" class="inputbox"></textarea></td>
</tr>
<tr>
<td>City* </td>
<td><input id="gcity" class="inputbox"  type="text"/></td>
<td>Contry* </td>
<td><input id="gcountry" class="inputbox"  type="text"/></td>

</tr>
<tr>
<td>State* </td>
<td><input id="gstate" class="inputbox"  type="text"/></td>
<td>Postal Code* </td>
<td><input id="gpin" class="inputbox"  type="text"/></td>

</tr>
<tr>
<td>Phone* </td>
<td><input id="gphone" class="inputbox"  type="text"/></td>

</tr>
<tr>
<td>E-mail* </td>
<td><input id="gemail" class="inputbox"  type="email"/></td>
</tr>

</table>
</div>
</div>
<div id="carddetail">
<div class="heading">Card Details</div>
<div id="cardcontent">
<table border="0" cellspacing="" cellpadding="">
<tr>
<td>Card Number* :</td>
<td><input id="gcardno" class="inputbox" type="text"/></td>
<td>Card Type* :</td>
<td><select id="gcardtype" class="inputbox">
<option>Master Card</option>
<option>Visa</option>
</select></td>
</tr>
<tr>
<td>Expiry Date* :</td>
<td>
<select id="gcardmexpmonth" class="inputbox">
<option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option>
<option>7</option><option>8</option><option>9</option><option>10</option><option>11</option><option>12</option>
</select>
/
<select id="gcardexpyear" class="inputbox">
<option>2013</option><option>2014</option><option>2015</option><option>2016</option><option>2017</option><option>2018</option>
<option>2019</option><option>2020</option><option>2021</option><option>2022</option><option>2023</option><option>2024</option>
</select>
</td>
</tr>
<tr>
<td>Card Holder Name* :</td>
<td><input id="gcardname" class="inputbox" type="text"/></td>
<td>Pin no* :</td>
<td><input id="gcardid" class="inputbox" type="password"/></td>
</tr>
</table>
</div> 
</div>
<div id="attention">
<p style="font-size:1.2em;border-bottom:2px solid gray;font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">Attention Note:</p>
<p >We reserve the right to cancel or modify reservations where it appears that a customer has engaged in fraudulent
or inappropriate activity or under other circumstances where it appears that the reservations contain or resulted
from a mistake or error.</p>
</div>
<div id="checkpolicy" style="margin-top:15px;">
<input id="checkterms" type="radio"/>
 I have read and understood the Cancellation and Other Policy and agree to it
</div>
<div id="reserve">
<input type="submit" onclick="reserveme()" style="background-color:#999966; margin-top:20px; margin-right:135px;color:white; border-radius:5px; width:150px; height:30px; font-size:1em;" value="ConfirmReservation"/>
</div>
</div>
</div>
<script type="text/javascript" language="javascript">
function reserveme()
{
 //alert('anupam');
 
 //alert(document.getElementById('gaddress').value);
 var name=document.getElementById('gname').value;
 var compname=document.getElementById('gcompname').value;
 var address=document.getElementById('gaddress').value;
 var city=document.getElementById('gcity').value;
 var country=document.getElementById('gcountry').value;
 var state=document.getElementById('gstate').value;
 var pin=document.getElementById('gpin').value;
 var phone=document.getElementById('gphone').value;
 var email=document.getElementById('gemail').value;
 var cardnumber=document.getElementById('gcardno').value; 
 var cardtype=$('#gcardtype option:selected').text();
 var expmonth=$('#gcardmexpmonth option:selected').text();
 var expyear=$('#gcardexpyear option:selected').text();
 var holdername=document.getElementById('gcardname').value;
 var cardid=document.getElementById('gcardid').value;
 var adult=<?php echo $row['adult'];?>;
 var children=<?php echo $row['children'];?>;
 var standardroom=<?php echo $row['standard'];?>;
 var deluxroom=<?php echo $row['delux'];?>;
 var grandroom=<?php echo $row['grand'];?>; 
 var totcost=<?php echo $row['cost'];?>;
 //var type =  <?php echo(string)$row['checkin'];?>;
var rooms=document.getElementById('roomno').innerHTML;
var datein=document.getElementById('checkindate').innerHTML;
var dateout=document.getElementById('checkoutdate').innerHTML;
 if(document.getElementById('checkterms').checked==true){
 if(name!=''&&compname!=''&&address!=''&&city!=''&&country!=''&&state!=''&&pin!=''&&phone!=''&&email!=''&&cardnumber!=''&&cardtype!=''&&expmonth!=''&&expyear!=''&&holdername!=''&&cardid!=''){
 $.post('reserve.php',{rsname:name,rscompname:compname,rsaddress:address,rscity:city,rscountry:country,rsphone:phone,
                   rsstate:state,rspin:pin,rsemail:email,rscardnumber:cardnumber,rscardtype:cardtype,
             rsexpmonth:expmonth,rsexpyear:expyear,rsholdername:holdername,rscardid:cardid,
             rsadult:adult,rschildren:children,rsstandardroom:standardroom,rsdeluxroom:deluxroom,
             rsgrandroom:grandroom,rsrooms:rooms,rsdatein:datein,rsdateout:dateout,cost:totcost},function(data){
       alert(data);
       window.location='hotel_reservation.html';
       });
       }
       else{
       alert('fill all details');
       }
       
     }
     else{
     alert('first check the terms & condition checkbox');
     }
}
function test()
{
alert('inside test');
}
</script>
</body>

</html>
