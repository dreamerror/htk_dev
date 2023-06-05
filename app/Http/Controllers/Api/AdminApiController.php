<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class AdminApiController extends Controller
{
    public function editBackground(Request $request) {
        $page = $request->page;
        $path = '';
        if (isset($request->all()[$page])) {
            $path = '/storage/' . $request->all()[$page]->store('/bg', 'public');
        }
        if ($path) {
            DB::table('page_backgrounds')->where('page', '=', $page)->update([
                'src' => $path,
            ]);
        }
        return redirect('/admin/backgrounds');
    }

    public function editPartner(Request $request) {
        $id = $request->input()['id'];
        $path = '';
        if (isset($request->all()['image'])) {
            $path = '/storage/' . $request->all()['image']->store('/partners', 'public');
        }
        if ($path && $id > 0) {
            DB::table('partners')->where('id', '=', $id)->update([
                'partner_logo' => $path,
            ]);
        } elseif ($id < 0) {
            DB::table('partners')->insert([
                'partner_name' => $request->input()['title'],
                'partner_logo' => $path,
            ]);
        }
        return redirect('/admin/partners');
    }

    public function deletePartner(Request $request) {
        $id = $request->id;
        DB::table('partners')->delete($id);
        return redirect('/admin/partners');
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
                    'img_src' => $route
                ]);
        } else {
            DB::table('main_cards_content')
                ->where('id', '=', $data['id'])
                ->update([
                    'title' => $data['title'],
                    'description' => $data['description']
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
