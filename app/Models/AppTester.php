<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppTester extends Model
{
    protected $fillable = [
        'name',
        'email',
        'app_id',
        'is_mail_sent',
        'mail_sent_at'
    ];

    protected $casts = [
        'is_mail_sent' => 'boolean',
        'mail_sent_at' => 'datetime'
    ];

    public function app()
    {
        return $this->belongsTo(AppShowcase::class, 'app_id');
    }
}
