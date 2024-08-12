<?php
$q = filter_input(INPUT_GET, "q");

require_once("config.php");

switch ($q) {
    case "il":
        $il = filter_input(INPUT_GET, "il");
        ilce_getir($il);
        break;

    case "ilce":
        $il = filter_input(INPUT_GET, "il");
        $ilce = filter_input(INPUT_GET, "ilce");
        market_getir($il, $ilce);
        break;

    default:
        break;
}

function ilce_getir($il) {
    global $connectDatabase;
    
    $sql = "SELECT DISTINCT market_ilce FROM marketler WHERE market_il = '" . $il . "'";
    $query = $connectDatabase->query($sql);
    $result = array();
    
    foreach ($connectDatabase->query($sql) as $res) {
        $result["ilce"][] = $res["market_ilce"];
    }
    
    echo json_encode($result);
}

function market_getir($il, $ilce) {
    global $connectDatabase;
    
    $sql = "SELECT * FROM marketler WHERE market_il = '" . $il . "' AND market_ilce = '" . $ilce . "'";
    $query = $connectDatabase->query($sql);
    $result = array();
    
    foreach ($connectDatabase->query($sql) as $r) {
        $result["market"][] = array(
            "id" => $r["market_id"],
            "adi" => $r["market_adi"],
            "il" => $r["market_il"],
            "ilce" => $r["market_ilce"],
            "tel" => $r["market_tel"],
            "adres" => $r["market_adres"],
            "enlem" => $r["market_enlem"],
            "boylam" => $r["market_boylam"]
        );
    }
    
    echo json_encode($result);
}