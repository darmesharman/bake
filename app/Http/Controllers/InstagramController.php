<?php

namespace App\Http\Controllers;

use App\Models\Instagram;
use Carbon\Carbon;
use Carbon\CarbonTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class InstagramController extends Controller
{
    public function index()
    {
        $response = Instagram::find(1)->response;

        $response = json_decode($response);

        $response = $response->data->user->edge_owner_to_timeline_media->edges;

        $image = $response[6]->node->display_url;

        $text = $response[6]->node->edge_media_to_caption->edges[0]->node->text;

        // dd(Carbon::createFromFormat('Y-m-d H:i:s', $response[6]->node->taken_at_timestamp))->format('Y-m-d'));
        $time = Carbon::createFromTimestamp($response[6]->node->taken_at_timestamp)->timezone('+06:00')->toDateTimeString();

        dd($image, $text, $time);
    }
}
