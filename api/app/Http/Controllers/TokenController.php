<?

namespace App\Http\Controllers;

use App\User;
use DateTimeImmutable;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TokenController extends Controller
{
    public function gerarToken(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $usuario = User::where('email', $request->email)->first();

        if (is_null($usuario) || !Hash::check($request->password, $usuario->password)) {
            return response()->json(['mensagem'=>'Dados Inválidos'], 401);
        }
        
        $issuedAt = new DateTimeImmutable();
        $expire = $issuedAt->modify('+1 minutes')->getTimestamp();

        $payload = [
            'sub' => $usuario->id,
            'iss' => $request->getHost(),
            'iat' => $issuedAt->getTimestamp(),
            'exp' => $expire,
            'email' => $usuario->email,
        ];
        $token = JWT::encode($payload, env('JWT_KEY'), 'HS256');
        return [
            'acess_token' => $token
        ];
    }
}
