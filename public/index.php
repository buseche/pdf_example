<?php

ini_set('memory_limit', '1024M');
require "../vendor/autoload.php";

use App\Pdf;
//We get all the data from Internet

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.coincap.io/v2/assets');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

$response = curl_exec($ch);
curl_close($ch);

$data = json_decode($response, TRUE);

$pdf = new Pdf();
$pdf->SetMargins(4, 4, 4); //configuramos los margenes
$pdf->SetTitle("Crypto Market report"); //seteamos el titulo
$pdf->SetSubtitle("Market revenue"); //Seteamos el subtitulo
$pdf->SetFont("Arial", '', 11); //Seteamos la fuente
$pdf->AddPage(); //añadimos una nueva pagina
$dataResponse = array();
/*Recorremos los datos */
$count = 0;
foreach($data['data'] as $key => $value)
{
    $dataResponse[] = [
        $value['id'],
        $value['rank'],
        $value['symbol'],
        $value['name'],
        round(floatval($value['supply']),2),
        round(floatval($value['marketCapUsd']),2),
        $value['explorer'],
    ];
    $count++;
}

$pdf->table($dataResponse); //seteamos la tabla
$pdf->SetTotalRows($count); //Seteamos el numero total de registros
$pdf->Output('', $pdf->getTitle()); //Imprimimos



?>