<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function Home(Request $request)
    {
        if ($request->hasCookie('idAccount')) {
            $dataAccount = Account::where("ID_account", "=", $request->cookie("idAccount"))->first();
            if ($dataAccount->role == "Admin") {
                $accountALL = null;

                if ($request->has('KB')) {
                    $input = $request->input('KB');
                    $beritaALL = Berita::where('title', 'like', "%$input%")->get();
                } else {
                    $beritaALL = Berita::all();
                }

                if ($request->has('KA')) {
                    $input = $request->input('KA');
                    $accountALL = Account::where('username', 'like', "%$input%")->get();
                } else {
                    $accountALL = Account::all();
                }

                return view("HomeAdmin", ['accountALL' => $accountALL, 'beritaALL' => $beritaALL, 'dataAccount' => $dataAccount]);
            } elseif ($dataAccount->role == 'Penulis') {
                $beritaAccount = Berita::where('ID_account', '=', $dataAccount->ID_account)->get();
                return view('HomeWriter', ['dataAccount' => $dataAccount, 'beritaAccount' => $beritaAccount]);
            } else {
                $beritaRandom = Berita::inRandomOrder(5)->get();
                $beritaTerbaru = Berita::orderBy('tanggal', 'asc')->get();
                $beritaTerkini = Berita::orderBy('like', 'asc')->get();
                return view('Home', [
                    'beritaRandom' => $beritaRandom,
                    'beritaTerbaru' => $beritaTerbaru,
                    'beritaTerkini' => $beritaTerkini,
                ]);
            }
        } else {
            $beritaRandom = Berita::inRandomOrder(10)->get();
            $beritaTerbaru = Berita::orderBy('tanggal', 'asc')->get();
            $beritaTerkini = Berita::inRandomOrder(7)->get();
            return view('Home', [
                'beritaRandom' => $beritaRandom,
                'beritaTerbaru' => $beritaTerbaru,
                'beritaTerkini' => $beritaTerkini,
            ]);
        }
    }

    public function National(Request $request) {
        $PBeritaTerkini = Berita::orderBy('like', 'asc')->where('ID_kategori', '=', 1)->limit(5)->get();
        $PBeritaTerbaru = Berita::orderBy('tanggal', 'asc')->where('ID_kategori', '=', 1)->limit(5)->get();
        $CBeritaTerkini = Berita::orderBy('like', 'asc')->where('ID_kategori', '=', 2)->limit(5)->get();
        $CBeritaTerbaru = Berita::orderBy('tanggal', 'asc')->where('ID_kategori', '=', 2)->limit(5)->get();
        return view('National', [
            'PBeritaTerkini'=>$PBeritaTerkini,
            'PBeritaTerbaru'=>$PBeritaTerbaru,
            'CBeritaTerkini'=> $CBeritaTerkini,
            'CBeritaTerbaru'=> $CBeritaTerbaru,
        ]);
    }

    public function Edit(Request $request, $idBerita)
    {
        if ($request->hasCookie('idAccount')) {
            $dataAccount = Account::find($request->cookie('idAccount'));
            if ($dataAccount->role == 'Pembaca') {
                return redirect('/');
            } else {
                $berita = Berita::where("ID_berita", "=", $idBerita)->first();
                $kategoris = Kategori::all();
                return view("writingSection", [
                    'berita' => $berita,
                    'kategoris' => $kategoris,
                ]);
            }
        } else {
            return redirect('/');
        }
    }

    public function Login(Request $request)
    {
        return view('Login');
    }

    public function Upload(Request $request)
    {
        if ($request->hasCookie('idAccount')) {
            $dataAccount = Account::find($request->cookie('idAccount'));
            if ($dataAccount->role == 'Pembaca') {
                return redirect('/');
            } else {
                $kategori = Kategori::all();
                return view('WritingSection', ['kategoris' => $kategori, 'berita' => null]);
            }
        } elseif (!$request->hasCookie('idAccount')) {
            return redirect('/');
        }
    }

    public function Profile(Request $request)
    {
        if ($request->hasCookie('idAccount')) {
            $dataAccount = Account::find($request->cookie('idAccount'));
            return view('Profile', ['dataAccount' => $dataAccount]);
        } else {
            return redirect('/Login');
        }
    }

    public function ProfileEdit(Request $request)
    {
        $dataAccount = Account::find($request->cookie('idAccount'));
        return view('ProfileEdit', ['dataAccount' => $dataAccount]);
    }

    public function DetailBerita(Request $request, $idBerita)
    {
        $dataBerita = Berita::find($idBerita);
        $beritaRandom = Berita::inRandomOrder(5)->get();
        if ($request->hasCookie('idAccount')) {
            $dataAccount = Account::find($request->cookie('idAccount'));
            if ($dataAccount->role == 'Admin' || $dataAccount->role == 'Penulis') {
                return view('ReadingPageAW', [
                    'dataBerita' => $dataBerita,
                    'dataBeritaRandom' => $beritaRandom,
                ]);
            } else {
                return view('ReadingPage', [
                    'dataBerita' => $dataBerita,
                    'dataBeritaRandom' => $beritaRandom,
                ]);
            }
        } else {
            return view('ReadingPage', [
                'dataBerita' => $dataBerita,
                'dataBeritaRandom' => $beritaRandom,
            ]);
        }

    }
}
