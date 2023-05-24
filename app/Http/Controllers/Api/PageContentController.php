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

        if (isset($data['description'])) {
            DB::table('page_content')->updateOrInsert([
                'page' => $data['page']
            ], [
                'page' => $data['page'],
                'page_description' => $data['description']
            ]);
        }
    }

    public function editInfo(Request $request) {
        $data = json_decode($request->getContent(), true);
        $id = $data['id'];
        if ($id == 0) {
            DB::table('information_pages')->insert([
                'page_title' => $data['title'],
                'page_content' => $data['content']
            ]);
        } else {
            if (isset($data['title'])) {
                DB::table('information_pages')
                    ->where('id', '=', $id)
                    ->update([
                        'page_title' => $data['title']
                    ]);
            }
            if (isset($data['content'])) {
                DB::table('information_pages')
                    ->where('id', '=', $id)
                    ->update([
                        'page_content' => $data['content']
                    ]);
            }
        }
        return redirect('/info/all');
    }

    public function infoFiles(Request $request) {
        /* TODO: Логика как в AdminApiController::editFiles, + как будто хочется её оттуда перенести
        и редактировать файлы непосредственно на самой странице, на которой они должны быть
        но под это нужен отдельный метод
        потому что таблицы будут разные*/
    }
}
