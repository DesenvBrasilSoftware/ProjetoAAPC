<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Validator;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function formataPrecoParaSalvar($valor) {
        // Remova espaços em branco em excesso
        $valor = trim($valor);
        // Remova os pontos que não estão entre dígitos
        $valor = preg_replace('/(?<=\d)\.(?=\d)/', '', $valor);
        // Substitua a vírgula por um ponto
        $valorFormatado = str_replace(',', '.', $valor);
        return (float)$valorFormatado;
    }

    protected function errorMessages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório.',
            'max' => 'O campo :attribute não pode ter mais de :max caracteres.',
            'date' => 'O campo :attribute deve ser uma data válida.',
            // Adicione outras mensagens de erro genéricas aqui
        ];
    }
}
