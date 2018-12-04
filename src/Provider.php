<?php

namespace Wuwx\LaravelConnect;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $table = "connect_providers";

    protected $fillable = ['enabled', 'name', 'icon', 'title', 'options'];

    protected $casts = [
        'options' => 'json',
    ];

    public function identities()
    {
        return $this->hasMany(Identity::class, 'provider', 'name');
    }
}
