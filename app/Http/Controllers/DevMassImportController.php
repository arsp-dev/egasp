<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\DevIsolatesImport;
use Maatwebsite\Excel\Facades\Excel;

class DevMassImportController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        Excel::import(new DevIsolatesImport, $request->isolate_file);

        return redirect()->back()->with('alert-success', 'File uploaded successfully');
    }
}
