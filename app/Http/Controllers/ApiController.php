<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use App\Models\CharactersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
  public function Index()
  {
    $total = '';
    for ($i=1; $i <= 99 ; $i++) $total .= $i.',';
    // la ruta normal de la API solo trae 20 personajes de la página 2 ==============
    $response = Http::get('https://rickandmortyapi.com/api/character/'.$total.'100');
    $data = $response->json();

    return view('landing', compact('data'));
  }

  public function InsertAllCharacters(Request $request)
  {
    $insertData = json_decode($request->allCharacters);

    try {
      for ($i=0; $i < 100 ; $i++) {
        $characters = CharactersModel::create([
          'name' => $insertData[$i]->name,
          'status' => $insertData[$i]->status,
          'species' => $insertData[$i]->species,
          'type' => $insertData[$i]->type,
          'gender' => $insertData[$i]->gender,
          'nameOrigin' => $insertData[$i]->origin->name,
          'url' => $insertData[$i]->origin->url,
          'image' => $insertData[$i]->image
        ]);
        $characters->save();
      }
      return redirect()->route('index')->with('status','success');
    } catch (\Throwable $th) {
      return redirect()->route('index')->with('status','fail');
    }
  }

  public function MyCharacters()
  {
    $myCharacters = DB::table('characters')->get();
    //dd($myCharacters);

    return view('myCharacters', compact('myCharacters'));
  }

  public function ShowCharacter(Request $request)
  {
    $show = DB::table('characters')
    ->where('id',$request->id)
    ->get();

    return view('showCharacter', compact('show'));
  }

  public function EditCharacter(Request $request)
  {
    $edit = CharactersModel::find($request->id);

    $edit->name = $request->Nombre;
    $edit->status = $request->Estado;
    $edit->species = $request->Especie;
    $edit->type = $request->Tipo;
    $edit->gender = $request->Genero;
    $edit->nameOrigin = $request->Origen;
    $edit->url = $request->Url;
    $edit->image = $request->Imagen;

    $edit->save();

    return redirect()->route('myCharacters')->with('status','success');
  }
}
