<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiteController extends Controller {
    public function index() {
        return view('site.index');
    }

    public function show() {
        $items = Shop::query()->select()->paginate();

        return view('site.show', ['items' => $items]);
    }

    public function parseImport(Request $request) {
        if ($request->isMethod('post') && $request->file('csv_file')) {
            $file = $request->file('csv_file');

            Storage::putFileAs('public/csv', $file, 'test.csv');
        }

        $file = dirname(__DIR__, 3) . '/storage/app/public/csv/test.csv';

        $data = $this->csvToArray($file);

        for ($i = 0; $i < count($data); $i ++) {
            $item = new Shop($data[$i]);
            $item->save();
        }

        return view('site.index', ['message' => 'Import successfully!']);
    }

    function csvToArray($filename = '', $delimiter = ';') {
        if (!file_exists($filename) || !is_readable($filename)) {
            return false;
        }

        $header = null;
        $data = [];
        if (($handle = fopen($filename, 'r')) !== false) {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false) {
                if (!$header) {
                    $header = [
                        'code',
                        'title',
                        'level1',
                        'level2',
                        'level3',
                        'price',
                        'price_sp',
                        'count',
                        'properties',
                        'joint_purchases',
                        'unit',
                        'picture',
                        'show_on_home',
                        'description',
                    ];
                } else {
                    if (count($header) !== count($row)) {
                        continue;
                    }

                    $data[] = array_combine($header, $row);
                }
            }

            fclose($handle);
        }

        return $data;
    }
}