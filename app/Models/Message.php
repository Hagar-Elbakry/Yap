<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Message extends Model
{
    public $fillable = [
        'sender_id',
        'receiver_id',
        'message',
        'file_name',
        'file_original_name',
        'file_path',
        'is_read',
    ];

    public function sender() {
        return $this->belongsTo(User::class, 'sender_id', 'id');
    }
    public function receiver() {
        return $this->belongsTo(User::class, 'receiver_id', 'id');
    }

    public static function boot() {
        parent::boot();
        static::creating(function ($model) {
            $model->created_at = Carbon::now();
        });
    }
}
