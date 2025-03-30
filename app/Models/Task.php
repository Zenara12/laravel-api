<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /** @use HasFactory<\Database\Factories\TaskFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'status',

    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function task():string{
        return $this->title.':'.$this->body;
    }
}
