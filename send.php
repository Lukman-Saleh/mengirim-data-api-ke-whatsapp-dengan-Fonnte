<?php

$token = "Ra5hPb#9qVm1dE-QRsbj";
$target ="6281227377201";

//data API XML
//DIBuat Oleh 12211846 Lukman Saleh
$url="https://data.bmkg.go.id/DataMKG/TEWS/gempadirasakan.xml";
$gempa= new SimpleXMLElement($url,null,true);

$result=json_decode($gempa) ;
//echo "<pre>";print_r($gempa);
echo "<center><h2>Data Gempa</h2></center>";

 
for ($i=0;$i<count($gempa->gempa) ;$i++) {
    
    $tanggal= $gempa->gempa[$i]->Tanggal;
    $jam= $gempa->gempa->Jam;
    $datetime= $gempa->gempa->DateTime;
    $koordinate= $gempa->gempa->point->coordinates;
    $lintang= $gempa->gempa->Lintang;
    $bujur= $gempa->gempa->Bujur;
    $magnitude= $gempa->gempa->Magnitude;
    $kedalaman= $gempa->gempa->Kedalaman;
    $wilayah= $gempa->gempa->Wilayah;
    $dirasakan= $gempa->gempa->Dirasakan;

   
}

    
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.fonnte.com/send',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array(
'target' => $target,
'message' => "Tanggal: $tanggal, 
    Jam: $jam, 
    DateTime: $datetime, 
    Koordinasi: $koordinate,   
    Lintang: $lintang, 
    Bujur: $bujur, 
    Magnitude: $magnitude,   
    Kedalaman: $kedalaman, 
    Wilayah: $wilayah, 
    Diarasakan: $dirasakan", 
'countryCode' => '62', //optional
),
  CURLOPT_HTTPHEADER => array(
    "Authorization: $token" //change TOKEN to your actual token
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

?>
