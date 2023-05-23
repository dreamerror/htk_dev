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

    }
}
