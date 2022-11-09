<?php 
namespace App\Services;

use App\Models\Player;
use App\Models\TemporaryFile;
use Illuminate\Support\Facades\Storage;


class PlayerService
{
    public function bulkPlayerDelete($request)
    {
        $bulkRole = $request->id;
        $user = Player::whereIn('id', $bulkRole);
        $status = $user->delete();
        if ($status) {
            return response()->json(['code' => 1, 'msg' => 'Player berhasil dihapus!']);
        } else {
            return response()->json(['code' => 0, 'msg' => 'Player gagal dihapus!']);
        }
    }
    
    public function uploadFotoPlayer($request)
    {
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $file = $foto->getClientOriginalName();
            $folder = uniqid('player', true);
            $foto->storeAs('player/tmp/' . $folder, $file);
            TemporaryFile::create([
                'folder' => $folder,
                'file' => $file
            ]);
            return $folder;
        } else {
            return '';
        }
    }
    
    public function createFotoPlayer($request)
    {
        $tmp = TemporaryFile::where('folder', $request->foto)->first();
        if ($tmp) {
            Storage::copy('player/tmp/' . $tmp->folder . '/' . $tmp->file, 'player/' . $tmp->file);
            $foto = 'player/' . $tmp->file;
            Storage::deleteDirectory('player/tmp/' . $tmp->folder);
            $tmp->delete();
        } else {
            $foto = null;
        }
        return $foto;
    }

    public function updateFoto($request, $player)
    {
        $oldFotoPlayer = $player->foto_path;
        $tmp = TemporaryFile::where('folder', $request->foto)->first();
        if ($tmp) {
            Storage::copy('player/tmp/' . $tmp->folder . '/' . $tmp->file, 'player/' . $tmp->file);
            $foto = 'player/' . $tmp->file;
            Storage::deleteDirectory('player/tmp/' . $tmp->folder);
            $tmp->delete();
        } else {
            if ($oldFotoPlayer) {
                $foto = $oldFotoPlayer;
            } else {
                $foto = null;
            }
        }
        return $foto;
    }

    public function deleteFotoPlayer()
    {
        $tmp = TemporaryFile::where('folder', request()->getContent())->first();
        if ($tmp) {
            Storage::deleteDirectory('player/tmp/' . $tmp->folder);
            $tmp->delete();
        }
        return response('');
    }
}