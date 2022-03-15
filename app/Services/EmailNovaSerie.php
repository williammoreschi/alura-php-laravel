<?php

namespace App\Services;

use App\Mail\NovaSerie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailNovaSerie
{
    public function enviarEmail(Request $request): void
    {
        $user = $request->user();

        $email = new NovaSerie(
            $request->nome,
            $request->qtd_temporadas,
            $request->ep_por_temporada
        );
        $email->subject = "Nova Série Adicionada";

        Mail::to($user)->send($email);
    }
}
