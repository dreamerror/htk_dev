<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
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

    public function getLang() {
        return Cookie::get('lang', 'ru');
    }

    public function getPageContent(string $pageName) {
        if ($pageName != 'tp') {
            return DB::table('page_content')
                ->where('page', '=', $pageName)
                ->where('lang', '=', $this->getLang())
                ->select(['page_text', 'page_additional', 'page_description'])->first();
        } else {
            return DB::table('page_content')
                ->where('page', '=', $pageName)
                ->where('lang', '=', 'ru')
                ->select(['page_text', 'page_additional', 'page_description'])->first();
        }
    }

    public function getPageFiles(string $pageName) {
        $column = 'text';
        if ($this->getLang() != 'ru') $column = 'cn_text as text';
        return DB::table('page_files')
            ->where('page', '=', $pageName)
            ->select('id', $column, 'file')
            ->orderBy('id', 'desc')
            ->get();
    }

    public function index() {
        $data = DB::table('main_cards_content')
            ->where('lang', '=', $this->getLang())
            ->select(['title', 'img_src as src', 'description', 'route'])
            ->orderBy('id')
            ->get();
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
        $column = 'page_title';
        if ($this->getLang() != 'ru') $column = 'cn_page_title as page_title';
        $data = DB::table('information_pages')
            ->select(['id', $column])
            ->orderBy('id', 'desc')
            ->get();
        return view('pages.info.all', [
            'items' => $data,
            'auth' => $this->getAuth(),
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
        $column = 'text';
        if ($this->getLang() != 'ru') $column = 'cn_text as text';
        $data = DB::table('prices_files')
            ->select([$column, 'file_route as file', 'id'])
            ->orderBy('id')
            ->get();
        return view('pages.prices', [
           'items' => $data
        ]);
    }
}
