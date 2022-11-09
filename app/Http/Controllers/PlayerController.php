<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Position;
use Illuminate\Http\Request;
use App\DataTables\PlayerDataTable;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Player\StorePlayerRequest;
use App\Http\Requests\Player\UpdatePlayerRequest;
use App\Http\Traits\PlayerTrait;
use App\Services\PlayerService;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PlayerDataTable $dataTable)
    {
        $positions = Position::all();
        return $dataTable->render('backend.player.index', compact('positions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $positions = Position::all();
        return view('backend.player.create', compact('positions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlayerRequest $request, PlayerService $service)
    {
        $foto = $service->createFotoPlayer($request);
        Player::create($request->validated()+['foto_path' => $foto]);
        return redirect()->route('siteman.players.index')->with('toast_success', 'Player berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {
        return view('backend.player.show',compact('player'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function edit(Player $player)
    {
        $positions = Position::all();
        return view('backend.player.edit',compact('player', 'positions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePlayerRequest $request, Player $player, PlayerService $service)
    {
        $foto = $service->updateFoto($request, $player);
        $player->update($request->validated() + ['foto_path' => $foto]);
        return redirect()->back()->with('toast_success', 'Player berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $player)
    {
        Storage::delete($player->foto_path);
        $player->delete();
        return redirect()->route('siteman.players.index')->with('toast_success', 'Player berhasil dihapus!');
    }

    public function bulkDelete(Request $request, PlayerService $service)
    {
        return $service->bulkPlayerDelete($request);   
    }

    public function deletePlayerFoto(Player $player)
    {
        Storage::delete($player->foto_path);
        $player->forceFill(['foto_path' => null])->save();
        return response()->json(['status' => 1, 'msg' => 'Foto berhasil dihapus']);
    }

    public function uploadFoto(Request $request, PlayerService $service)
    {
        return $service->uploadFotoPlayer($request);
    }

    public function deleteFoto(PlayerService $service)
    {
        return $service->deleteFotoPlayer();
    }
}