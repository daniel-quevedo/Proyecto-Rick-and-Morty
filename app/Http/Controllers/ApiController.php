<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
  public function Index()
  {
    $total = '';
    for ($i=1; $i <= 99 ; $i++) $total .= $i.',';

    $response = Http::get('https://rickandmortyapi.com/api/character/'.$total.'100');
    $data = $response->json();

    //dd($data);
    return view('landing', compact('data'));
  }

}
