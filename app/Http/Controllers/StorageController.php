<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;

class StorageController extends Controller
{
    function copyInvoice(){
        // $src = storage_path('app/public/logo.png');
        // $dest = storage_path('app/public/logo2.png');
        // $src = Storage::path('files/inv.pdf');
        // $dest = Storage::path('files/inv-new.pdf');
        // copy($src, $dest);

        // $data = Storage::get('files/inv.pdf');
        // Storage::put('files/inv-new-xyz.pdf', $data);

        $data = Storage::disk('public')->get('files/data.pdf');
        Storage::disk('public')->put('files/data-new.pdf', $data);
        return 'Invoice Copied';
    }
}
