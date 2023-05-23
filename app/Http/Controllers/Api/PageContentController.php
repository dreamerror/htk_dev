<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageContentController extends Controller
{
    public function editContent(Request $request) {
        $data = json_decode($request->getContent(), true);

        if (isset($data['text'])) {
            DB::table('page_content')->updateOrInsert([
                'page' => $data['page']
            ], [
                'page' => $data['page'],
                'page_text' => $data['text']
            ]);
        }

        if (isset($data['additional'])) {
            DB::table('page_content')->updateOrInsert([
                'page' => $data['page']
            ], [
                'page' => $data['page'],
                'page_additional' => $data['additional']
            ]);
        }

    }
}
