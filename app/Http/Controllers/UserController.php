<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    private $useNombre = "";
    private $useApellido = "";
    private $useNumDocumento = "";
    private $useMesa = "";
    private $useRol = "Votante";

    /**
     * Display a listing of the resource.
     */
    public function index() {

        if (isset($_GET["id"])) {
            $usuarioId = $_GET["id"];
            $usuarios = User::find($usuarioId);
        } else {
            $usuarios = User::all();
        }

        return $usuarios;

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request) {

        $_respuestas = new respuestas;
        $usuario = new User();
        $datos = json_decode($request->getContent());

        if (!isset($datos->useNombre) || !isset($datos->useApellido) || !isset($datos->useNumDocumento) || !isset($datos->useMesa)) {
            return $_respuestas->error_400();
        } else {
            $this->useNombre = $datos->useNombre;
            $this->useApellido = $datos->useApellido;
            $this->useNumDocumento = $datos->useNumDocumento;
            $this->useMesa = $datos->useMesa;
            $usuario->useNombre = $this->useNombre;
            $usuario->useApellido = $this->useApellido;
            $usuario->useNumDocumento = $this->useNumDocumento;
            $usuario->useMesa = $this->useMesa;
            $usuario->useRol = $this->useRol;
            $usuario->save();

            $respu = $usuario;
            if ($respu["id"]) {
                $resp = $respu["id"];
            } else {
                $resp = 0;
            }

            if ($resp != null) {
                $resp = $resp;
            } else {
                $resp = 0;
            }

            if ($resp != null) {
                $respuesta = $_respuestas->response;
                $respuesta["result"] = array(
                    "id" => $resp
                );
                return $respuesta;
            } else {
                return $_respuestas->error_500();
            }
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $usuario) {

        User::findOrFail($request->id)->update($request->all());

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $usuario) {

        User::findOrFail($usuario->id)->delete();

    }
}
