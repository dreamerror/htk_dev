<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageContentController extends Controller
{
    public function saveImage(Request $request) {
        $filename = $request->image->hashName();
        $url = "storage/".$request->image->store("/page_images", 'public');
        echo json_encode(["url" => $url]);
    }

    public function insertImage(Request $request) {
        echo json_encode(['alt' => "image"]);
    }

    public function deleteInfo(Request $request) {
        $id = $request->id;
        DB::table('information_pages')->where('id', '=', $id)->delete();
        DB::table('information_files')->where('page_id', '=', $id)->delete();
        return redirect('/info');
    }

    public function editContacts(Request $request) {
        $data = json_decode($request->getContent(), true);
        $lang = $data['lang'];
        $positions = ['htk', 'svh', 'tp', 'additional'];
        foreach ($positions as $pos) {
            if (isset($data["{$pos}_content"])) {
                DB::table('contacts')
                    ->where('position', '=', $pos)
                    ->where('lang', '=', $lang)
                    ->update([
                        'content' => $data["{$pos}_text"]
                    ]);
            }
            if (isset($data["{$pos}_title"])) {
                DB::table('contacts')
                    ->where('position', '=', $pos)
                    ->where('lang', '=', $lang)
                    ->update([
                        'title' => $data["{$pos}_title"]
                    ]);
            }
        };
        return redirect('/contacts');
    }

    public function editContent(Request $request) {
        $data = json_decode($request->getContent(), true);

        if (isset($data['text'])) {
            DB::table('page_content')->updateOrInsert([
                'page' => $data['page'],
                'lang' => $data['lang']
            ], [
                'page' => $data['page'],
                'page_text' => $data['text'],
            ]);
        }

        if (isset($data['additional'])) {
            DB::table('page_content')->updateOrInsert([
                'page' => $data['page'],
                'lang' => $data['lang']
            ], [
                'page' => $data['page'],
                'page_additional' => $data['additional']
            ]);
        }

        if (isset($data['description'])) {
            DB::table('page_content')->updateOrInsert([
                'page' => $data['page'],
                'lang' => $data['lang']
            ], [
                'page' => $data['page'],
                'page_description' => $data['description']
            ]);
        }
    }

    public function editInfo(Request $request) {
        $data = json_decode($request->getContent(), true);
        $id = $data['id'];
        if (isset($data['title'])) {
            DB::table('information_pages')
                ->updateOrInsert(['id' => $id,],
                [
                    'page_title' => $data['title'],
                    'cn_page_title' => $data['title'],
                ]);
        }
        if (isset($data['content'])) {
            DB::table('information_pages')
                ->updateOrInsert(['id' => $id,],
                [
                    'page_content' => $data['content'],
                ]);
        }

    }

    public function infoFiles(Request $request) {
        $data = $request->input();
        $page_id = $data['page_id'];
        $deleted = explode(',', $data["deleted"]);
        foreach ($deleted as $delID) {
            if (intval($delID) > 0) DB::table('information_files')->delete($delID);
        }
        foreach (array_keys($data) as $key) {
            if (str_starts_with($key, 'id')) {
                $fileID = $data[$key];
                $num = explode('_', $key)[1];
                $text = $data["text_$num"];
                $path = '';
                if (isset($request->all()["file_$num"])) {
                    $path = 'storage/' . $request->all()["file_$num"]->store('/files', 'public');
                }
                if ($path) {
                    if ($fileID > 0) {
                        DB::table('information_files')->where('id', '=', $fileID)
                            ->update([
                            'page_id' => $page_id,
                            'file' => $path,
                            'text' => $text,
                        ]);
                    } else {
                        DB::table('information_files')->insert([
                            'page_id' => $page_id,
                            'file' => $path,
                            'text' => $text,
                        ]);
                    }
                }
            }
        }

        return redirect()->back();
    }

    public function pagesFiles(Request $request) {
        $data = $request->input();
        $page_name = $data['page'];
        $deleted = explode(',', $data["deleted"]);
        foreach ($deleted as $delID) {
            if (intval($delID) > 0) DB::table('page_files')->delete($delID);
        }
        foreach (array_keys($data) as $key) {
            if (str_starts_with($key, 'id')) {
                $fileID = $data[$key];
                $num = explode('_', $key)[1];
                $text = $data["text_$num"];
                $path = '';
                if (isset($request->all()["file_$num"])) {
                    $path = 'storage/' . $request->all()["file_$num"]->store('/files', 'public');
                }
                if ($path) {
                    if ($fileID > 0) {
                        DB::table('page_files')->where('id', '=', $fileID)
                            ->update([
                                'page' => $page_name,
                                'file' => $path,
                                'text' => $text,
                            ]);
                    } else {
                        DB::table('page_files')->insert([
                            'page' => $page_name,
                            'file' => $path,
                            'text' => $text,
                        ]);
                    }
                }
            }
        }
        return redirect()->back();
    }

    public function priceFiles(Request $request) {
        $data = $request->input();
        $page_name = $data['page'];
        $deleted = explode(',', $data["deleted"]);
        foreach ($deleted as $delID) {
            if (intval($delID) > 0) DB::table('prices_files')->delete($delID);
        }
        foreach (array_keys($data) as $key) {
            if (str_starts_with($key, 'id')) {
                $fileID = $data[$key];
                $num = explode('_', $key)[1];
                $text = $data["text_$num"];
                $path = '';
                if (isset($request->all()["file_$num"])) {
                    $path = 'storage/' . $request->all()["file_$num"]->store('/files', 'public');
                }
                if ($path) {
                    if ($fileID > 0) {
                        DB::table('prices_files')->where('id', '=', $fileID)
                            ->update([
                                'file_route' => $path,
                                'text' => $text,
                            ]);
                    } else {
                        DB::table('page_files')->insert([
                            'file_route' => $path,
                            'text' => $text,
                        ]);
                    }
                }
            }
        }
        return redirect()->back();
    }
}
