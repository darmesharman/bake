<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use Inertia\Inertia;
use App\Models\User;
use App\Models\Board;
use App\Models\Lead;
use Illuminate\Support\Facades\Log;
use App\Models\Dashboard_update;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;

// use Illuminate\Http\Response;

class MainController extends Controller
{
    public function index()
    {
        // $new = new PreExpedition;
        // $new->region_id = $region;
        // $new->ship_id = $ship;
        // $new->title = $title;
        // $new->days= $days;
        // $new->save();
        // return $new;

        // $new = new User();

        // $new->email = 'first@last2';
        // $new->password = 'aa18aa012';
        // $new->save();
        // if(Auth::attempt(['email' => $email, 'password' => $password]))
        // error.log('nice');
        // Auth::login($new, true);
        $data = Board::all();
        // Note::all();


        $data = Board::all();
        return Inertia::render('main', [
            'canLogin' => Route::has('login'),
            'nice1'=> 'very nice',
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'boards' => Board::with('leads')->get(),
            'last_update'=> DB::select(DB::raw('select updated_at from updates as s1 join (select MAX(id) as md from updates) as s2 on s2.md=s1.id')),
            // Dashboard_update::all('updated_at')->max('updated_at'),

                   // 'last_update'=> Dashboard_update::all('updated_at')->where('updated_at', DB::raw("(select max(updated_at) from updates)")),
                //    'last_update'=> DB::select('select MAX(updated_at) from updates')[],
                   // DB::table('orders')->where('id', \DB::raw("(select max(`id`) from orders)"))->get();
            'max_board_order'=> Board::all('order')->max('order')

        ]);
    }
    // update  boards data
    public function update_boards(Request $request, $updated_at)
    {
        // max_board_order

        // Log::info($updated_at);
        $events = Dashboard_update::where([
            ["updated_at", ">", $updated_at],
            ["event", "=", 0],
            ])->get();

        $arr = [];
        if (!empty($events)) {
            for ($idx = 0; $idx < count($events); $idx++) {
                $jfile = json_decode($events[$idx]["details"], true);
                $data['id'] = $jfile["id"];
                $data['title'] = $jfile["title"];
                if (!empty($jfile["order"])) {
                    $data['order'] = $jfile["order"];
                }
                array_push($arr, $data);
            }
            // else {
            //     $jfile = json_decode($events[0]["details"], true);
            //     $data['id'] = $jfile["id"];
            //     $data['title'] = $jfile["title"];
            //     if(!empty($jfile["order"]))
            //         $data['order'] = $jfile["order"];
            //     array_push($arr, $data);
            // }

            // $contents = [Dashboard_update::all('updated_at')->max('updated_at'), $arr];
            // $resp = Response::make($contents, 200);
            // $resp->header('Content-Type', 'text/json');
            // return $resp;
        }
        unset($data);
        $data0['00'] = $arr;

        $events = Dashboard_update::where([
            ["updated_at", ">", $updated_at],
            ["event", "=", 1],
            ])->get();
        $arr = [];//$events;
        if (!empty($events)) {
            for ($idx = 0; $idx < count($events); $idx++) {
                $jfile = json_decode($events[$idx]["details"], true);
                // $data['id'] = $events[$idx]["id"];
                $data['id'] = $jfile["id"];
                $data['board_id'] = $jfile["board_id"];
                $data['description'] = $jfile["description"];
                $data['order'] = $jfile["order"];
                array_push($arr, $data);
            }
        }
        unset($data);
        $data0["01"] = $arr;

        $contents = [Dashboard_update::all('updated_at')->max('updated_at'), $data0];
        $resp = Response::make($contents, 200);
        $resp->header('Content-Type', 'text/json');
        return $resp;

        // return Response::json($dt);
        //Response::json(Dashboard_update::all());
        // return $data->response();
        // return Illuminate\Http\Resources\Json\ResourceCollection::$data[0];
        // for ($idx = 0; $idx < $data.length; $idx++) {
            // if($data[idx][1]==0) {
                // return [idx][2];

                // return Response::json($data[idx][2]);

            // }
        // }
    }
    // create board
    public function create_board(Request $request, $title)
    {
        $board = new Board();
        $board->title = $title;
        $board->order = -99;//Board::all('order')->max('order') + 1;
        $board->save();

        return response()->json([
                'id' => $board->id,
                'title' => $board->title,
                'order' => $board->order,
                'created_at' => $board->created_at,
                'updated_at'=>$board->updated_at
            ], 200, ['Content-Type' => 'application/json']);
    }
    public function remove_board(Request $request, $boardid)
    {
        Board::where("id", "=", $boardid)->delete();
        return response()->json([], 200, ['Content-Type' => 'application/json']);
    }
    // create lead
    public function create_lead(Request $request, $boardid, $description)
    {
        $lead = new Lead();
        $lead->board_id = $boardid;
        $lead->description = $description;
        $lead->status_id = 1;
        $lead->sum = 1;
        $lead->company_id = 1;
        $lead->order = -99;
        $lead->save();

        return response()
            ->json(['id' => $lead->id]);
    }
    public function update_lead(Request $request, $leadid, $description)
    {
        $board = Lead::where("id", "=", $leadid)->first();
        $board->description = $description;
        $board->save();
        return response()
            ->json([], 200, ['Content-Type' => 'application/json']);
    }

    public function remove_lead(Request $request, $leadid)
    {
        Lead::where("id", "=", $leadid)->delete();
        return response()->json([], 200, ['Content-Type' => 'application/json']);
    }
    public function update_boards_title(Request $request, $boardid, $title)
    {
        $board = Board::where("id", "=", $boardid)->first();
        $board->title = $title;
        $board->save();
    }
    // update boards order
    public function update_boards_order(Request $request, $boardid, $boardid2, $leadid, $order)
    {
        $lead = Lead::where([
            ["id", "=", $leadid],
            // ["board_id", "=", $boardid ]
        ])->first();

        $lastid = Lead::all('id')->max('id');
        // $board = Lead::where("board_id", "=", $boardid2)->get();

        $lastchr = ord(substr($order, -1));
        if ($lastchr <= 122 && $lastchr >= 97) {
            $order = $order.chr($lastchr + 1);
        } else {
            $order = $order.'a';
        }

        // $lead1 = new Lead();
        $lead->board_id = $boardid2;

        // $lead1->status_id = 1;
        // $lead1->sum = 1;
        // $lead1->company_id = 1;

        // $lead1->description = $lead->description;
        // $lead1->order = $order;
        $lead->save();

        $flight = Lead::find(7);
        $flight->delete();
        $flight->save();
    }
    // update leads order
    public function update_leads_order($board_id)
    {
    }
}
//             'filters' => Request::all('search', 'role', 'trashed'),
//             'users' => Auth::user()//->account->users()
//                 ->orderBy('first_name')
//                 // ->filter(Request::only('search', 'role', 'trashed'))
//                 ->get()
//                 ->transform(function ($user) {
//                     return [
//                         'canLogin' => Route::has('login'),
//                         'nice1'=> 'very nice',
//                         'canRegister' => Route::has('register'),
//                         'laravelVersion' => Application::VERSION,
//                         'phpVersion' => PHP_VERSION,
//                         'board' => Board::all(),
//                         // 'id' => $user->id,
//                         // 'name' => $user->name,
//                         // 'email' => $user->email,
//                         // 'owner' => $user->owner,
//                         // 'photo' => $user->photoUrl(['w' => 40, 'h' => 40, 'fit' => 'crop']),
//                         // 'deleted_at' => $user->deleted_at,
//                     ];
//                 }),
//         ]);
//     }
// }
