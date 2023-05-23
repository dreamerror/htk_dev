<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index() {
        return view('pages.admin.index');
    }

    public function backgrounds() {
        return view('pages.admin.backgrounds');
    }

    public function documents() {
        return view('pages.admin.documents');
    }

    public function contacts() {
        $data = DB::table('footer_content')->select(['id', 'position', 'type', 'text'])->get();
        return view('pages.admin.contacts', [
            'data' => $data
        ]);
    }
}
