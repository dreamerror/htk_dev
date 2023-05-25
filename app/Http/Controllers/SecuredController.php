<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SecuredController extends Controller
{
    public function authenticatedView(string $view, array $data = []) {
        if (Session::get('user')) {
            return view($view, $data);
        }
        return redirect('login');
    }

    public function addInfo() {
        $id = DB::table('information_pages')
            ->select(DB::raw('coalesce(max(id)+1, 1) id'))
            ->first();
        return $this->authenticatedView('pages.info.add', [
            'id' => $id->id,
        ]);
    }

    public function editInfo(int $id) {
        $data = DB::table('information_pages')
            ->where('id', '=', $id)
            ->select(['page_title', 'page_content'])
            ->first();
        $files = DB::table('information_files')
            ->where('page_id', '=', $id)
            ->select(['id', 'file'])
            ->get();
        return $this->authenticatedView('pages.info.edit', [
            'data' => $data,
            'files' => $files,
            'id' => $id
        ]);
    }
}
