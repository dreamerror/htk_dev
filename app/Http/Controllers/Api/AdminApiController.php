<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class AdminApiController extends Controller
{
    public function editBackground(Request $request) {
        $pagesFileNames = [
            'main' => 'main-bg.jpg',
            'svh' => 'svh.png',
            'tp' => 'tp.jpg'
        ];
        $page = $request->page;
        $name = $pagesFileNames[$page];
        '/storage' . $request->all()[$page]->storeAs('/bg', $name, 'public');
        return redirect('/admin/backgrounds');
    }

    public function editDocument(Request $request) {
        $docFileNames = [
            'svh_svid' => 'svh_svid.png',
            'tp_prikaz' => 'tp_prikaz.png',
            'cargo_svid' => 'cargo_svid.jpg'
        ];
        $doc = $request->doc;
        $name = $docFileNames[$doc];
        '/storage' . $request->all()[$doc]->storeAs('', $name, 'public');
        return redirect('/admin/documents');
    }

    public function editCards(Request $request) {
        $data = $request->input();
        $route = '';
        if (isset($request->all()['image'])) {
            $route = '/storage/' . $request->all()['image']->store('/', 'public');
        }

        if ($route) {
            DB::table('main_cards_content')
                ->where('id', '=', $data['id'])
                ->update([
                    'title' => $data['title'],
                    'description' => $data['description'],
                    'img_src' => $route,
                    'lang' => $data['lang']
                ]);
        } else {
            DB::table('main_cards_content')
                ->where('id', '=', $data['id'])
                ->update([
                    'title' => $data['title'],
                    'description' => $data['description'],
                    'lang' => $data['lang']
                ]);
        }

        return redirect('/admin/cards');
    }

    public function editContacts(Request $request) {
        $data = $request->input();
        $position = $data['position'];
        $deleted = explode(',', $data["deleted"]);
        foreach (array_keys($data) as $key) {
            if (str_starts_with($key, 'id')) {
                $id = intval($data[$key]);
                if (!in_array($data[$key], $deleted)) {
                    $num = explode('_', $key)[1];
                    $text = $data["text_$num"];
                    $type = $data["type_$num"];
                    $lang = $data["lang_$num"];

                    if ($id > 0) {
                        DB::table('footer_content')->updateOrInsert([
                            'id' => $id,
                        ], [
                            'text' => $text,
                            'type' => $type,
                            'position' => $position,
                            'lang' => $lang
                        ]);
                    } else {
                        DB::table('footer_content')->insert([
                            'text' => $text,
                            'type' => $type,
                            'position' => $position,
                            'lang' => $lang
                        ]);
                    }
                } else { // delete
                    if ($id > 0) {
                        DB::table('footer_content')->where('id', '=', $id)->delete();
                    }
                }
            }
        }

        return redirect('/admin/contacts');
    }

    public function editFiles(Request $request) {
        $data = $request->input();
        $page = $data['page'];
        $deleted = explode(',', $data["deleted"]);
        foreach (array_keys($data) as $key) {
            if (str_starts_with($key, 'id')) {
                $id = intval($data[$key]);
                if (!in_array($data[$key], $deleted)) {
                    $num = explode('_', $key)[1];
                    $text = $data["text_$num"];
                    $path = '';
                    if (isset($request->all()["file_{$page}_$num"])) {
                        $path = 'storage/'.$request->all()["file_{$page}_$num"]->store('/files', 'public');
                    }
                    if ($id > 0 && $path) {
                        DB::table('page_files')->updateOrInsert([
                            'id' => $id,
                        ], [
                            'text' => $text,
                            'page' => $page,
                            'file' => $path
                        ]);
                    } else if ($id < 0 && $path) {
                        DB::table('page_files')->insert([
                            'text' => $text,
                            'page' => $page,
                            'file' => $path
                        ]);
                    } else if ($id > 0) {
                        DB::table('page_files')->updateOrInsert([
                            'id' => $id,
                        ], [
                            'text' => $text,
                            'page' => $page,
                        ]);
                    }
                } else { // delete
                    if ($id > 0) {
                        $filename = DB::table('page_files')->select('file')
                            ->where('id', '=', $id)->first();
                        File::delete($filename['file']);
                        DB::table('page_files')->where('id', '=', $id)->delete();
                    }
                }
            }
        }

        return redirect('/admin/files');
    }
}
