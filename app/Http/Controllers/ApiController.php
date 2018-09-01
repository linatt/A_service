<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

class ApiController extends Controller
{

  public function sendRequestToBService(Request $request)
  {

    $token = $request->get('token');
    $requestedService = 'B-Service';

    $answera = 'Antwort vom A-Service!';
    $client = new Client(array( 'curl' => array( CURLOPT_SSL_VERIFYPEER => false))); //GuzzleHttp\Client
    $serviceLocation = $client->get('http://registrydb.homestead/api/services/' . $requestedService)->getBody()->read(256);
    $result = $client->post('https://' . $serviceLocation . '/answerToA', ['json' => ['token' => $token]])->getBody()->read(128);
    return array($answera, $result);
  }
}
