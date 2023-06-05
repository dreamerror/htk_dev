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

    public function getBackground(string $page) {
        return DB::table('page_backgrounds')
            ->where('page', '=', $page)
            ->select(['id', 'src'])
            ->first();
    }

    public function getPageContent(string $pageName) {
        return DB::table('page_content')
            ->where('page', '=', $pageName)
            ->where('lang', '=', $this->getLang())
            ->select(['page_text', 'page_additional', 'page_description'])->first();
    }

    public function getPageFiles(string $pageName) {
        $column = 'text';
        if ($this->getLang() != 'ru') $column = 'cn_text as text';
        if ($pageName == 'tp') $column = 'text';
        return DB::table('page_files')
            ->where('page', '=', $pageName)
            ->select('id', $column, 'file')
            ->orderBy('id', 'desc')
            ->get();
    }

    public function index() {
        $bg = $this->getBackground('main');
        $data = DB::table('main_cards_content')
            ->where('lang', '=', $this->getLang())
            ->select(['title', 'img_src as src', 'description', 'route'])
            ->orderBy('id')
            ->get();
        $content = $this->getPageContent('main');
        return view('pages.index', [
            'cards' => $data,
            'bg' => $bg,
            'content' => $content,
            'auth' => $this->getAuth(),
        ]);
    }

    public function tempStorage() {
        $bg = $this->getBackground('svh');
        $auth = $this->getAuth();
        $data = $this->getPageContent('svh');
        $files = $this->getPageFiles('svh');
        return view('pages.svh', [
            'data' => $data,
            'auth' => $auth,
            'files' => $files,
            'bg' => $bg
        ]);
    }

    public function customs() {
        $bg = $this->getBackground('tp');
        $auth = $this->getAuth();
        $data = $this->getPageContent('tp');
        $files = $this->getPageFiles('tp');
        return view('pages.tp', [
            'data' => $data,
            'auth' => $auth,
            'bg' => $bg,
            'files' => $files
        ]);
    }

    public function transportIndex() {
        $bg = $this->getBackground('transportation');
        return view('pages.transportation.index', [
            'bg' => $bg
        ]);
    }

    public function cargo() {
        $bg = $this->getBackground('cargo');
        $auth = $this->getAuth();
        $data = $this->getPageContent('cargo_trans');
        return view('pages.transportation.cargo', [
            'data' => $data,
            'auth' => $auth,
            'bg' => $bg
        ]);
    }

    public function partners() {
        $bg = $this->getBackground('partners');
        $data = DB::table('partners')
            ->select(['id', 'partner_logo'])
            ->get();
        return view('pages.partners', [
            'data' => $data,
            'bg' => $bg
        ]);
    }

    public function passengers() {
        $bg = $this->getBackground('passenger');
        $auth = $this->getAuth();
        $data = $this->getPageContent('pass_trans');
        return view('pages.transportation.pass', [
            'auth' => $auth,
            'data' => $data,
            'bg' => $bg
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
        $bg = $this->getBackground('contacts');
        return view('pages.contacts', [
            'bg' => $bg
        ]);
    }

    public function infoList() {
        $bg = $this->getBackground('info');
        $column = 'page_title';
        if ($this->getLang() != 'ru') $column = 'cn_page_title as page_title';
        $data = DB::table('information_pages')
            ->select(['id', $column])
            ->orderBy('id', 'desc')
            ->get();
        $data = $this->getPageContent('info');
        return view('pages.info.all', [
            'items' => $data,
            'auth' => $this->getAuth(),
            'bg' => $bg,
            'content' => $data,
        ]);
    }

    public function infoPage(int $id) {
        $bg = $this->getBackground('info');
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
            'id' => $id,
            'bg' => $bg
        ]);
    }

    public function test() {
        return view('pages.test');
    }

    public function prices() {
        $bg = $this->getBackground('prices');
        $column = 'text';
        if ($this->getLang() != 'ru') $column = 'cn_text as text';
        $data = DB::table('prices_files')
            ->select([$column, 'file_route as file', 'id'])
            ->orderBy('id')
            ->get();
        $auth = $this->getAuth();
        return view('pages.prices', [
           'items' => $data,
            'bg' => $bg,
            'auth' => $auth,
        ]);
    }
}
