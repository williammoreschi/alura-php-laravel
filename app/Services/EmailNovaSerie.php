<?php

namespace App\Services;

use App\Mail\NovaSerie;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailNovaSerie
{
    public function enviarEmail(Request $request): void
    {
        $users = User::all();

        foreach ($users as $user) {
            /**
             * É necessário criar um template para cada usuário, caso contrario
             * apartir do segundo seria colocado nome do anterior 
             * ex: (fuluno1,fulano2) (fuluno1,fulano2,fulano3)...
            */
            $email = new NovaSerie(
                $request->nome,
                $request->qtd_temporadas,
                $request->ep_por_temporada
            );
            $email->subject = "Nova Série Adicionada";
    
            Mail::to($user)->send($email);
        }
    }
}
