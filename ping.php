<?php
// header('Content-Type: application/json; charset=utf-8')
$hosts = array('103.62.155.226','203.177.160.177','103.236.177.137','45.202.16.161','223.119.80.209','103.62.154.22','103.62.152.234','10.255.40.31','103.62.155.49','103.62.155.226');
$output = array('','','','','','','','','','');

for ($i = 0; $i < sizeof($hosts); $i++) {
    exec("ping -w 1 $hosts[$i]", $output[$i], $result);
    hostStatus($output[$i],$hosts[$i]);
}

function hostStatus($outputParam,$hostParam) {
    if(sizeof($outputParam) == 6){
        echo "<div style='background-color:green; color: white; height: 50px; width: 300px; margin: auto; line-height: 50px; text-align: center;'><p>$hostParam ONLINE </p></div>";
    }else{
        echo "<div style='background-color:red; color: white; height: 50px; width: 300px; margin: auto; line-height: 50px; text-align: center;'><p>$hostParam OFFLINE </p></div>";
    }
}

$page = $_SERVER['PHP_SELF'];
$sec = "60";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
    <title>NOC ping</title>
</head>
<body>
    <center>
        <h2><?php 
        $date = new \DateTime("now");
        echo $date->format(\DateTime::RFC850);
        ?></h2>
    </center>
</body>
</html>