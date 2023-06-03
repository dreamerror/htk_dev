<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function authenticatedView(string $view, array $data = []) {
        if (Session::get('user')) {
            return view($view, $data);
        }
        return redirect('login');
    }

    public function index() {
        return $this->authenticatedView('pages.admin.index');
    }

    public function backgrounds() {
        return $this->authenticatedView('pages.admin.backgrounds');
    }

    public function documents() {
        return $this->authenticatedView('pages.admin.documents');
    }

    public function contacts() {
        $data = DB::table('footer_content')->select(['id', 'position', 'type', 'text', 'lang'])->get();
        return $this->authenticatedView('pages.admin.contacts', ['data' => $data]);
    }

    public function files() {
        $data = DB::table('page_files')->select(['id', 'page', 'text', 'file'])->get();
        return $this->authenticatedView('pages.admin.files', ['data' => $data]);
    }
}
