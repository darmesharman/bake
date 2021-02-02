<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Board;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



        // $last_update = DB::select(DB::raw('select updated_at from updates as s1 join (select MAX(id) as md from updates) as s2 on s2.md=s1.id'));
        $last_update = DB::select(DB::raw('select MAX(updated_at) as updated_at from updates'))
            [0]->updated_at;

        $boards = Board::with('leads')->get();
        
        $token = session()->all()["_token"];
        $token = substr($token, 0, 9);
        
        // dd($token, $last_update);
        
        Redis::hmset('user_tokens',[$token => $last_update ]);
        


        // Redis::hmset('user_tokens', [$token => $last_update ] );

        // Redis::publish('updates', json_encode([
            // ['id' => 0, 'name' => 'Adam Wathan']
        // ]));

        // dd(Redis::hgetall('user_tokens'));
        
        // dd($token, $last_update);
        // dd(last_update);
        return response()->json(compact('boards', 'token', 'last_update'), 200, ['Content-Type' => 'application/json']);
    }

   
}
