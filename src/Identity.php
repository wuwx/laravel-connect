<?php

namespace Wuwx\LaravelConnect;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Identity extends Model
{
    protected $table = "connect_identities";

    protected $fillable = ['identifier', "provider"];

    protected $casts = [
        'data' => 'json',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
