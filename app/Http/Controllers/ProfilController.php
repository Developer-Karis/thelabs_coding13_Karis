<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\User;
use App\Models\MailContact;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.profil.profil');
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
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function show(Profil $profil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function edit(Profil $profil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profil $profil, $id)
    {
        $updateProfil = User::find($id);
        $updateProfil->photo = $request->file('changePhoto')->hashName();
        $updateProfil->name = $request->changeNom;
        $updateProfil->email = $request->changeEmail;
        $updateProfil->save();
        $request->file('changePhoto')->storePublicly('img/avatar/', 'public');  
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profil $profil)
    {
        //
    }

    public function password(Profil $profil) 
    {
        return view('admin.profil.password');
    }

    public function changePassword(Profil $profil, Request $request, $id) 
    {
        $updatePassword = User::find($id);
        if ($updatePassword->password !== $request->password) {
            $updatePassword->password = Hash::make($request->password);
        }

        $updatePassword->save();
        return redirect()->route("login");
    }

    public function mail(Profil $profil) 
    {
        $formulaireContact = MailContact::orderBy('id', 'DESC')->take(1)->get();
        return view('admin.profil.mail', compact('formulaireContact'));
    }
}
