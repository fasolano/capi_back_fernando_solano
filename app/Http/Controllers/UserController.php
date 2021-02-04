<?php


namespace App\Http\Controllers;


use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller {

    public function getUsers(Request $request){
        $users = DB::table('users')
            ->join('user_domicilio', 'id','=','user_id')
            ->select('name','fecha_nacimiento','user_domicilio.*')
            ->get();

        $usersFormated = array();
        foreach ($users as $key => $user) {
            $usersFormated[$key] = new \stdClass();
            $usersFormated[$key]->nombre = $user->name;
            $usersFormated[$key]->fechaNacimiento = $user->fecha_nacimiento;
            list($ano,$mes,$dia) = explode("-",$user->fecha_nacimiento);
            $ano_diferencia  = date("Y") - $ano;
            $mes_diferencia = date("m") - $mes;
            $dia_diferencia   = date("d") - $dia;
            if ($dia_diferencia < 0 || $mes_diferencia < 0){
                $ano_diferencia--;
            }
            $usersFormated[$key]->edad = $ano_diferencia;
            $usersFormated[$key]->domicilio = $user->domicilio." ".$user->numero_exterior.", ".$user->colonia.", ".$user->cp." ".$user->ciudad;
        }

        return json_encode($usersFormated);
    }

}
