<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublicController extends Controller
{
    public function index() {
        $data = DB::select("select title, img_src src, description, route from main_cards_content order by id;");
        return view('pages.index', [
            'cards' => $data
        ]);
    }

    public function tempStorage() {
        $data = DB::table('page_content')->where('page', '=', 'svh')
            ->select(['page_text', 'page_additional', 'page_description'])->first();
        $data = json_decode(json_encode($data), true);
        return view('pages.svh', [
            'data' => $data
        ]);
    }

    public function customs() {
        $data = DB::table('page_content')->where('page', '=', 'tp')
            ->select(['page_text', 'page_additional', 'page_description'])->first();
        $data = json_decode(json_encode($data), true);
        return view('pages.tp', [
            'data' => $data
        ]);
    }

    public function cargo() {
        $data = DB::table('page_content')->where('page', '=', 'cargo_trans')
            ->select(['page_text', 'page_additional', 'page_description'])->first();
        $data = json_decode(json_encode($data), true);
        return view('pages.transportation.cargo', [
            'data' => $data
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
