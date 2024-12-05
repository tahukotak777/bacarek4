<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $validator = Validator::make([
            "username" => $request->username,
            'password' => $request->password,
        ], [
            'username' => 'required',
            'password' => 'required|min:8|max:20'
        ], [
            'username' => 'Nama atau Password anda salah'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('massage', 'Nama atau Password anda salah:');
        }

        $id = Account::where("username", "=", $request->username)->where('password', '=', $request->password)->get("ID_account")->first();

        if (Account::where("username", "=", $request->username)->where('password', '=', $request->password)->exists()) {
            return redirect('/')->withCookie('idAccount', $id->ID_account);
        } else {
            return redirect()->back()->with('massage', 'Nama atau password anda salah');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make([
            "username" => $request->username,
            "password" => $request->password,
            "jenis_kelamin" => $request->jenis_kelamin,
        ], [
            "username" => "required",
            "password" => "required|min:8|max:20",
            "jenis_kelamin" => "required",
        ], [
            "username" => 'Nama harus terisi',
            'password' => 'Password harus terisi, minimal 8 karakter hingga 20 karakter'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        ;

        $post = account::create([
            'username' => $request->username,
            'password' => $request->password,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);
        return redirect('/Login')->with(['berhasil', 'berhasil']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Account $account)
    {
        $data = Account::find($request->cookie('idAccount'));
        $data->username = $request->username;
        $data->password = $request->password;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->update();
        return redirect('/Profile');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account)
    {
        //
    }

    //fnction buatan sendiri
    public function BeriHak(Account $account, $idAccount)
    {
        $data = Account::find($idAccount);
        $data->role = 'Penulis';
        $data->update();
        return redirect()->back()->with('success', 'Berhasil memberikan hak akses kepada ' . $data->username);
    }
    public function CabutHak(Account $account, $idAccount)
    {
        $data = Account::find($idAccount);
        $data->role = 'Pembaca';
        $data->update();
        return redirect()->back()->with('success', 'Berhasil mencabut hak akses kepada ' . $data->username);
    }
    public function Logout () {
        Cookie::queue(Cookie::forget('idAccount'));
        return redirect('/');
    }
}
