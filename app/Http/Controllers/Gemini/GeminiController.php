<?php

namespace App\Http\Controllers\Gemini;

use App\Http\Controllers\Controller;
use App\Models\Campus\Campus;
use App\Models\Modalidades\Modalidades;
use Gemini\Laravel\Facades\Gemini;
use Illuminate\Http\Request;

class GeminiController extends Controller
{
    public function index(Request $request)
    {
        try {
            $result = Gemini::geminiPro()->generateContent($this->montaPrompt($request));

            $result = str_replace(['```html','```'],'',$result->text());

            return response()->json($result);
        } catch (\Exception $e) {
            return response()->json('Erro ao gerar texto com IA.');
        }
    }

    private function montaPrompt($request)
    {
        $modalidade = Modalidades::find($request->modalidade_id);
        $campus = Campus::find($request->campus_id);
        $prompt = "Escreva uma historia GRANDE  em html  PARA POR EM UM EDITOR DE RICH TEXT detalhada do " . $request->nome . " concedido em " . $request->ano . ".
        Destaque e a relevância da premiação. Mencione também a modalidade
        (" . $modalidade?->nome . ") e o campus (" . $campus?->sigla . '-' . $campus?->nome . ")
         onde a conquista foi obtida.
          UTILIZE MARCAÇÕES E TAGS HTML PARA ESTILIZAÇÃO
         informações adicionais:
         Historia do trofeu: $request->historia
         Colocacao:$request->colocacao
         Observaçoes:$request->obs
         ";
        return $prompt;
    }

}
