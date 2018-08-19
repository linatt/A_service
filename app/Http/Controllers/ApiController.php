<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class ApiController extends Controller
{

  public function sendRequestToBService(Request $request)
  {

    $token = $request->get('token');

    $answera = 'Antwort vom A-Service!';
    $client = new Client(); //GuzzleHttp\Client
    $result = $client->post('http://b-service.homestead/answerToA', ['token' => $token])->getBody()->read(128);
    return array($answera, $token);
  }
}
