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
    }

    public function infoFiles(Request $request) {
        $data = $request->input();
        $page_id = $data['page_id'];
        $deleted = explode(',', $data["deleted"]);
        foreach (array_keys($data) as $key) {
            if (str_starts_with($key, 'id')) {
                $fileID = $data[$key];
                if (in_array($fileID, $deleted)) {
                    if ($fileID > 0) {
                        DB::table('information_files')->delete($fileID);
                    }
                } else {
                    $num = explode('_', $key)[1];
                    $text = $data["text_$num"];
                    $path = '';
                    if (isset($request->all()["file_$num"])) {
                        $path = 'storage/' . $request->all()["file_$num"]->store('/files', 'public');
                    }
                    if ($path) {
                        DB::table('information_files')->updateOrInsert([
                            'id' => $fileID,
                        ], [
                            'page_id' => $page_id,
                            'file' => $path,
                            'text' => $text,
                        ]);
                    }
                }
            }
        }
    }
}
