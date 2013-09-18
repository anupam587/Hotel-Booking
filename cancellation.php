<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Cancellation</title>
<script type="text/javascript" src="jquery.js"></script>
<style type="text/css">
#totalbody{
	margin-left:auto;
	margin-right:auto;
	width:650px;
	height:auto;
}
.infolabel{
	width:300px;
}
.infotake{
	width:200px;
	margin-left:20px;
}
.inputbox{
	margin-left:30px;
	border:1px solid #292929;
    border-radius:3px;
}

#mainbody{
   margin-top:40px;
	background-color:gray;
	border:solid 2px #996633;
	border-radius:3px;
}
#navigation{
	width:600px;
	height:40px;
	margin-top:20px;	
}
.submenu{
    list-style:none;
	width:125px;
	height:25px;
	float:left;
    background-color:#AEC2E8; 
    margin-left:3px;
    border:1px solid #292929;
    border-radius:2px;
}
.submenu:hover{
	background-color:gray;
	cursor:pointer;
	color:white;
}
#menunavigation{
	width:400px;
	height:30px;	
    padding-top:8px;
    
}

</style>

</head>

<body>
<div id="totalbody">
<div id="logo">
<img src="banner(747x130).jpg" style="width:650px;height:60px"/>
</div>
<div id="navigation">
<ul id="menunavigation">
<a href="hotel_reservation.html"><li class="submenu">Reservation</li></a>
<li class="submenu">Modification</li>
<a href="http://localhost/hotelbooking/cancellation.php"><li class="submenu">Cancellation</li></a>
</ul>
</div>

<div id="mainbody">
<br/>
<div id="heading" style="color:red; font-size:1.5em;margin-left:220px;">Cancellation Form
</div>
<br/>
<div id="cancelform">
<label class="infolabel">Guest personal Id:</label>
<input class="inputbox" id="gid" type="text"/><br/>
<label class="infolabel">Guest Name:</label>&nbsp;&nbsp;&nbsp;
<input class="inputbox" id="gname" type="text" style="margin-left:50px;"/><br/>
<input type="submit" onclick="cancelme()" style="background-color:#999966; margin-top:20px;margin-left:120px; margin-right:35px;color:white; border-radius:5px; width:150px; height:30px; font-size:1em;" value="CancelBooking"/>

</div>
<br/>
</div>
</div>
<script type="text/javascript" language="javascript">
function cancelme()
{
 var id=document.getElementById('gid').value;
 var name= document.getElementById('gname').value;
 $.post('cancel.php',{gid:id,gname:name},function(data){
       alert(data);
       
       });

}
</script>
</body>

</html>
