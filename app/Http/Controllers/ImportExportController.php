<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Imports\UserImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportExportController extends Controller
{
    public function import(Request $request)
    {
        Excel::import(new UserImport, $request->file('file')->store('files'));
        return back();
    }
    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
