<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
