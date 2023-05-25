<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PublicController extends Controller
{
    public function index() {
        $data = DB::select("select title, img_src src, description, route from main_cards_content order by id;");
        return view('pages.index', [
            'cards' => $data,
        ]);
    }

    public function tempStorage() {
        $auth = 0;
        if (Session::get('user')) {
            $auth = 1;
        }
        $data = DB::table('page_content')->where('page', '=', 'svh')
            ->select(['page_text', 'page_additional', 'page_description'])->first();
        $files = DB::table('page_files')->where('page', '=', 'svh')
            ->select('id', 'text', 'file')->get();
        return view('pages.svh', [
            'data' => $data,
            'auth' => $auth,
            'files' => $files
        ]);
    }

    public function customs() {
        $auth = 0;
        if (Session::get('user')) {
            $auth = 1;
        }
        $data = DB::table('page_content')->where('page', '=', 'tp')
            ->select(['page_text', 'page_additional', 'page_description'])->first();
        $data = json_decode(json_encode($data), true);
        return view('pages.tp', [
            'data' => $data,
            'auth' => $auth,
        ]);
    }

    public function cargo() {
        $auth = 0;
        if (Session::get('user')) {
            $auth = 1;
        }
        $data = DB::table('page_content')->where('page', '=', 'cargo_trans')
            ->select(['page_text', 'page_additional', 'page_description'])->first();
        $data = json_decode(json_encode($data), true);
        return view('pages.transportation.cargo', [
            'data' => $data,
            'auth' => $auth,
        ]);
    }

    public function passengers() {
        return view('pages.transportation.pass');
    }

    public function transit() {
        return view('pages.transportation.transit');
    }

    public function contacts() {
        return view('pages.contacts');
    }

    public function infoList() {
        $data = DB::table('information_pages')
            ->select('id', 'page_title')
            ->get();
        return view('pages.info.all', [
            'items' => $data
        ]);
    }

    public function infoPage(int $id) {
        $auth = 0;
        if (Session::get('user')) {
            $auth = 1;
        }
        $data = DB::table('information_pages')
            ->where('id', '=', $id)
            ->select(['page_title', 'page_content'])
            ->first();
        $files = DB::table('information_files')
            ->where('page_id', '=', $id)
            ->select(['id', 'file', 'text'])
            ->get();
        return view('pages.info.edit', [
            'data' => $data,
            'files' => $files,
            'auth' => $auth,
            'id' => $id
        ]);
    }

    public function test() {
        return view('pages.test');
    }

    public function prices() {
        $data = DB::select("select text, file_route file from prices_files order by id");
        return view('pages.prices', [
           'items' => $data
        ]);
    }
}
