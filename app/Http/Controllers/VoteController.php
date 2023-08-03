<?php

namespace App\Http\Controllers;

use App\Http\Requests\VoteRequest;
use App\Models\Vote;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {

        if (isset($_GET["id"])) {
            $votoId = $_GET["id"];
            $votos = Vote::find($votoId);
        } else {
            $votos = Vote::all();
        }

        return $votos;

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VoteRequest $request) {

        Vote::create($request->all());

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VoteRequest $request, Vote $usuario) {

        Vote::findOrFail($request->id)->update($request->all());

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vote $usuario) {

        Vote::findOrFail($usuario->id)->delete();

    }
}
