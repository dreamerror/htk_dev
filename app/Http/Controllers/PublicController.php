<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PublicController extends Controller
{
    public function getAuth(): int
    {
        if (Session::get('user')) {
            return 1;
        }
        return 0;
    }

    public function getPageContent(string $pageName) {
        return DB::table('page_content')->where('page', '=', $pageName)
            ->select(['page_text', 'page_additional', 'page_description'])->first();
    }

    public function getPageFiles(string $pageName) {
        return DB::table('page_files')
            ->where('page', '=', $pageName)
            ->select('id', 'text', 'file')
            ->orderBy('id', 'desc')
            ->get();
    }

    public function index() {
        $data = DB::select("select title, img_src src, description, route from main_cards_content order by id;");
        return view('pages.index', [
            'cards' => $data,
        ]);
    }

    public function tempStorage() {
        $auth = $this->getAuth();
        $data = $this->getPageContent('svh');
        $files = $this->getPageFiles('svh');
        return view('pages.svh', [
            'data' => $data,
            'auth' => $auth,
            'files' => $files
        ]);
    }

    public function customs() {
        $auth = $this->getAuth();
        $data = $this->getPageContent('tp');
        return view('pages.tp', [
            'data' => $data,
            'auth' => $auth,
        ]);
    }

    public function transportIndex() {
        return view('pages.transportation.index');
    }

    public function cargo() {
        $auth = $this->getAuth();
        $data = $this->getPageContent('cargo_trans');
        return view('pages.transportation.cargo', [
            'data' => $data,
            'auth' => $auth,
        ]);
    }

    public function partners() {
        $data = DB::table('partners')
            ->select(['id', 'partner_logo'])
            ->get();
        return view('pages.partners', [
            'data' => $data
        ]);
    }

    public function passengers() {
        $auth = $this->getAuth();
        $data = $this->getPageContent('pass_trans');
        return view('pages.transportation.pass', [
            'auth' => $auth,
            'data' => $data,
        ]);
    }

    public function transit() {
        $auth = $this->getAuth();
        $data = $this->getPageContent('transit_trans');
        return view('pages.transportation.transit', [
            'auth' => $auth,
            'data' => $data
        ]);
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
        $auth = $this->getAuth();
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
