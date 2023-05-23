<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
