<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class DashBoardController extends Controller
{
    public function index()
    {
        $studios = DB::table('studios')->get();

        return view('dashboard.index', ['studios' => $studios]);
    }

    public function index2()
    {
        $studios = DB::table('studios')->get();

        return view('dashboard.index2', ['studios' => $studios]);
    }
}
