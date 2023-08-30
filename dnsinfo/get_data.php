<?php
$url = 'google.com';
$dns = '8.8.8.8';

$records = Array("A","AAAA", "MX", "NS", "CNAME", "TXT");
function execute($url, $dns)
{
    $returnValue = null;
    $results = Array(); 
    global $records;
    for($i=0; $i<count($records); $i++)
    {
	    $command = 'dig '.$url.' @'.$dns." ".$records[$i] . " +short";
	    $results[$records[$i]] = shell_exec($command);
    }
    return $results;
}

header("Content-Type: application/json");
if(isset($_GET["url"])){

    $default_dns = "1.1.1.1";
    $allowed_dns = ['1.1.1.1', '8.8.8.8', '208.67.222.222'];

    $dns = isset($_GET["dns"]) ? $_GET["dns"] : null;

    if(!($dns !== null && in_array($dns, $allowed_dns))){
        $dns = $default_dns;
    }
    
	$jsonformat = json_encode(execute($_GET["url"], $dns));
	echo $jsonformat;
}else{
	echo "BAD REQUEST: URL NOT PASSED";
}
?>
