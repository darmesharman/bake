@extends('layouts.guest')
    @section('content')
        @foreach ($responses as $response)
            <img src="{{ $response->node->display_url }}" style="width: 20%; height: 20%;">
            <br>
            @if (!empty($response->node->edge_media_to_caption->edges))
                @foreach ($response->node->edge_media_to_caption->edges as $item)
                    <p>{{ $item->node->text }}</p>
                @endforeach
            @endif
            <?php
                $date = date_create();
                date_timestamp_set($date, $response->node->taken_at_timestamp);
                echo date_format($date, 'Y-m-d H:i:s')
            ?>
        @endforeach
    @endsection
