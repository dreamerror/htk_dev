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
        return view('pages.svh');
    }

    public function customs() {
        return view('pages.tp');
    }

    public function cargo() {
        return view('pages.transportation.cargo');
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
}
