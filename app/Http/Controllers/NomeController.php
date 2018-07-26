<?php

namespace App\Http\Controllers;

use App\Nome;
use Illuminate\Http\Request;

class NomeController extends Controller
{
    public function storeNome(Request $request){
      if($request->nome){
        $nome = new Nome();
        $nome->nome = $request->nome;
        $nome->save();

        return "Sucesso!";
      }else {
        return "Passe um nome como parâmetro!";
      }
    }
}
