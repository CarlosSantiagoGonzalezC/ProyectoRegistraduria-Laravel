<?php

namespace App\Http\Controllers;

use App\Http\Requests\CandidateRequest;
use App\Models\Candidate;
use Illuminate\Http\Request;

class CandidateController extends Controller
{

    private $canNombre = "";
    private $canApellido = "";
    private $canPartidoPolitico = "";

    /**
     * Display a listing of the resource.
     */
    public function index() {

        if (isset($_GET["id"])) {
            $candidatoId = $_GET["id"];
            $candidatos = Candidate::find($candidatoId);
        } else {
            $candidatos = Candidate::all();
        }

        return $candidatos;

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CandidateRequest $request) {

        $_respuestas = new respuestas;
        $candidato = new Candidate();
        $datos = json_decode($request->getContent());

        if (!isset($datos->canNombre) || !isset($datos->canApellido) || !isset($datos->canPartidoPolitico)) {
            return $_respuestas->error_400();
        } else {
            $this->canNombre = $datos->canNombre;
            $this->canApellido = $datos->canApellido;
            $this->canPartidoPolitico = $datos->canPartidoPolitico;
            $candidato->canNombre = $this->canNombre;
            $candidato->canApellido = $this->canApellido;
            $candidato->canPartidoPolitico = $this->canPartidoPolitico;
            $candidato->save();

            $respu = $candidato;
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
    public function update(CandidateRequest $request, Candidate $candidato) {

        Candidate::findOrFail($request->id)->update($request->all());

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candidate $candidato) {

        Candidate::findOrFail($candidato->id)->delete();

    }
}
