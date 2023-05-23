<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function editContacts(Request $request) {
        $data = $request->input();
        $position = $data['position'];
        $deleted = explode(',', $data["deleted"]);
        foreach (array_keys($data) as $key) {
            if (str_starts_with($key, 'id')) {
                if (!in_array($data[$key], $deleted)) {
                    $num = explode('_', $key)[1];
                    $id = intval($data[$key]);
                    $text = $data["text_$num"];
                    $type = $data["type_$num"];

                    if ($id > 0) {
                        DB::table('footer_content')->updateOrInsert([
                            'id' => $id,
                        ], [
                            'text' => $text,
                            'type' => $type,
                            'position' => $position
                        ]);
                    } else {
                        DB::table('footer_content')->insert([
                            'text' => $text,
                            'type' => $type,
                            'position' => $position
                        ]);
                    }
                }
            }
        }

        return redirect('/admin/contacts');
    }
}
