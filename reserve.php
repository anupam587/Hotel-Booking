<?php
/*
echo "anupam";
echo $_POST['rsaddress'];

echo $_POST['rsstate'];

echo $_POST['rscountry'];
echo $_POST['rspin'];
echo $_POST['rsemail'];
echo $_POST['rsphone'];
echo $_POST['rscompname'];
echo $_POST['rsholdername'];
echo $_POST['rscardtype'];
echo $_POST['rscardid'];
echo $_POST['rscardnumber'];
echo $_POST['rsexpmonth'];
echo $_POST['rsexpyear'];
echo $_POST['rsadult'];
echo $_POST['rschildren'];
echo $_POST['rsdatein'];
echo $_POST['rsdateout'];
echo $_POST['rsrooms'];
echo $_POST['rsstandardroom'];
echo $_POST['rsdeluxroom'];
echo $_POST['rsgrandroom'];
*/
    $con = mysql_connect("localhost","root","anupam");

    if (!$con)
    {
     die('Could not connect: ' . mysql_error());
    }
    mysql_select_db("hotel", $con);
    $guestid=rand(10000,99999);
    $transactid=rand(10000,99999);

    $data1="insert into cardinformation values($guestid,$transactid,'$_POST[rsholdername]','$_POST[rscardnumber]',$_POST[rscardid],'$_POST[rscardtype]',$_POST[rsexpmonth],$_POST[rsexpyear])";
             
    $result1=mysql_query($data1,$con);
    
    
    $data2="insert into guestinformation values($guestid,'$_POST[rsname]','$_POST[rscompname]','$_POST[rsaddress]','$_POST[rscity]','$_POST[rscountry]','$_POST[rsstate]',$_POST[rspin],$_POST[rsphone],'$_POST[rsemail]',$transactid)";
    
         
    $result2=mysql_query($data2,$con);
    
    $data3="insert into reservation values($guestid,$transactid,$_POST[rsrooms],$_POST[rsstandardroom],$_POST[rsdeluxroom],
            $_POST[rsgrandroom],'$_POST[rsdatein]','$_POST[rsdateout]',$_POST[rsadult],$_POST[rschildren],$_POST[cost])";
            
    $result3=mysql_query($data3,$con);
    
    $data4="update roomaval set standard=standard-$_POST[rsstandardroom],delux=delux-$_POST[rsdeluxroom],grand=grand-$_POST[rsgrandroom] where vardate>='$_POST[rsdatein]' and vardate<='$_POST[rsdateout]'";
             
    $result4=mysql_query($data4,$con);
    
    $data5= "insert into roomcheck values(123,123)";
    $result5= mysql_query($data5,$con);

    mysql_close($con);  
    $con1 = mysql_connect("localhost","root","anupam");

    if (!$con1)
    {
     die('Could not connect: ' . mysql_error());
    }
    mysql_select_db("hm", $con1);
    $start = strtotime("$_POST[rsdatein]");
    $end = strtotime("$_POST[rsdateout]");
    $days_between = ceil(abs($end - $start) / 86400)+1;
    $type="I";
    if($_POST['rsstandardroom']>0){
    $type="I";
    }
    if($_POST['rsdeluxroom']>0){
    $type="II";
    }

    if($_POST['rsgrandroom']>0){
    $type="III";
    }

    $data6= "insert into reserve values($guestid,$transactid,'$_POST[rsname]','','','$_POST[rsdatein]','00:00:00','$type',$_POST[rsrooms],$days_between,'$_POST[rsdateout]','true',$_POST[rsadult],$_POST[rschildren],'$_POST[rsdatein]','internet','visa')";
    $result6= mysql_query($data6,$con1);

    mysql_close($con1);  

    echo "You are Registered Successfully\n";
    echo "Your personal id is:   ";
    echo $guestid;
    echo "\nNote your transaction id:   ";
    echo $transactid; 
?>