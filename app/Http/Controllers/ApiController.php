<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class ApiController extends Controller
{

  public function sendRequestToBService()
  {

    $answera = 'Antwort vom A-Service!';
    $client = new Client(); //GuzzleHttp\Client
    $result = $client->get('http://b-service.homestead/answerToA')->getBody()->read(128);
    return array($answera, $result);
  }
}
