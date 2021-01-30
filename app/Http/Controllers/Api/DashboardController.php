<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Board;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $boards = Board::with('leads')->get();
        $last_update = DB::select(DB::raw('select updated_at from updates as s1 join (select MAX(id) as md from updates) as s2 on s2.md=s1.id'));
        
        return response()->json(compact('boards', 'last_update'), 200, ['Content-Type' => 'application/json']);
    }

   
}
