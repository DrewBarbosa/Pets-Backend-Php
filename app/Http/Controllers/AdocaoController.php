<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adocao;

class AdocaoController extends Controller
{
    /**
     * Cria um novo registo de adoção
     *
     * @param Request $request
     * @return Adocao
     */
    
    public function store(Request $request)
    {
      $request->validate([
          "email" => ['required', 'email'],
          "valor" => ['required', 'numeric', 'between:10,100'],
          "pet_id" => ['required', 'int', 'exists:pets,id']
      ]);

      $dadosDaAdocao = $request->all();

      return Adocao::create($dadosDaAdocao);
    }
}
