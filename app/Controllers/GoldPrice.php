<?php namespace App\Controllers;

use CodeIgniter\Controller;

class GoldPrice extends Controller
{
    public function index()
    {
        $apiKey = "goldapi-1qtfsm2ihh7da-io";
        $symbol = "XAU";
        $curr = "USD";
        $date = "";

        $myHeaders = array(
            'x-access-token: ' . $apiKey,
            'Content-Type: application/json'
        );

        $curl = curl_init();

        $url = "https://www.goldapi.io/api/{$symbol}/{$curr}{$date}";

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTPHEADER => $myHeaders,
            CURLOPT_SSL_VERIFYPEER => false // Disable SSL certificate verification
        ));


        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

        if ($error) {
            return $this->response->setJSON(['error' => $error]);
        } else {
            return $this->response->setJSON(json_decode($response, true));
        }
    }
}
