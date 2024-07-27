<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GeneController extends Controller
{
    public function index(){
        $genes = DB::table('genes')->get();
        return view('admin.genes.index',compact('genes'));
    }
}
