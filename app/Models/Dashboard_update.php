<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
    
class Dashboard_update extends Model
{
    use HasFactory;
    protected $table = 'updates';

    protected $fillable = [
        'id', 'event', 'details', 'created_at', 'updated_at'
    ];

    // protected $casts = [
    //     'details' => 'array',
    // ];
    // $user = User::find(1);
    // $options = $user->options;
    // $options['key'] = 'value';
    // $user->options = $options;
}
