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
}
