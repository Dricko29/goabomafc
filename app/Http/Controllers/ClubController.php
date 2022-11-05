<?php

namespace App\Http\Controllers;

use App\Http\Requests\Club\UpdateClubRequest;
use App\Models\Club;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $club = Club::first();
        return view('backend.club.index',compact('club'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function show(Club $club)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function edit(Club $club)
    {
        return view('backend.club.edit',compact('club'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Club\UpdateClubRequest  $request
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClubRequest $request, Club $club)
    {
        $club->update($request->validated());
        return redirect()->back()->with('toast_success', 'Club berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function destroy(Club $club)
    {
        //
    }

    public function updateBackground(Request $request, $id)
    {
        $club = Club::find($id)->first();
        $validator = Validator::make($request->all(), [
            'background' => 'required|image|max:2048|mimes:png,jpg',
        ]);

        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $oldBackground = Club::find($club->id)->getAttributes()['background'];
            if ($oldBackground != '') {
                Storage::delete($oldBackground);
            }

            $background = $request->file('background')->store('club/images/background');
            $query = $club->update([
                'background' => $background,
            ]);
            if (!$query) {
                return response()->json(['status' => 0, 'msg' => 'ada sesuatu yang salah']);
            } else {

                return response()->json(['status' => 1, 'msg' => 'background berhasil diubah']);
            }
        }
    }
    public function updateLogo(Request $request, $id)
    {
        $club = Club::find($id)->first();
        $validator = Validator::make($request->all(), [
            'logo' => 'required|image|max:2048|mimes:png,jpg',
        ]);

        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $oldLogo = Club::find($club->id)->getAttributes()['logo'];
            if ($oldLogo != '') {
                Storage::delete($oldLogo);
            }

            $logo = $request->file('logo')->store('club/images/logo');
            $query = $club->update([
                'logo' => $logo,
            ]);
            if (!$query) {
                return response()->json(['status' => 0, 'msg' => 'ada sesuatu yang salah']);
            } else {

                return response()->json(['status' => 1, 'msg' => 'logo berhasil diubah']);
            }
        }
    }
}