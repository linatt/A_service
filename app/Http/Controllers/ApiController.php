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

    $answera = 'Antwort vom A-Service!';
    $client = new Client(); //GuzzleHttp\Client
    $result = $client->post('http://b-service.homestead/answerToA', ['json' => ['token' => $token]])->getBody()->read(128);
    return array($answera, $result);
  }
}
