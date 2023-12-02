<?php
session_start();
function sendreq($s){
    $user_input = ucfirst($s);
    $url = "https://api.weatherapi.com/v1/current.json?key=a27cd46253a24dae8e8114757230212&q=$user_input&aqi=no";
    $data = file_get_contents($url);
    $decoded_data = json_decode($data);
    return $decoded_data;
}

$search = trim(htmlspecialchars(htmlentities($_GET['serachinput'])));
$return_data =[];
$erorr =[];

if(empty($search)){
    $erorr[]= "input is empty";
}
$data =sendreq($search);

if($data){
    $return_data = [
        "name"    => $data->location->name,
        "country" => $data->location->country,
        "temp_c"  => $data->current->temp_c,
        "conditiontxt"  => $data->current->condition->text,
        "conditionicon"  => $data->current->condition->icon
    ];
    $_SESSION["data"] = $return_data;
}else{
    $erorr[] = "enter valid search";
    $_SESSION["erorrs"] = $erorr;
}

header("location:index.php");