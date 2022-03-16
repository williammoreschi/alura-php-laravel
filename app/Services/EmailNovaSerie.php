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

        foreach ($users as $key => $user) {
            $multiplicador = $key+1;
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
    
            //Mail::to($user)->send($email); // envia o email direto;
            //Mail::to($user)->queue($email); // manda para fila;
            
            // manda para fila também, mas usa um delay de 10 em 10 entre cada tentativa;
            $when = now()->addSeconds($multiplicador*10);
            Mail::to($user)->later($when, $email);
        }
    }
}
