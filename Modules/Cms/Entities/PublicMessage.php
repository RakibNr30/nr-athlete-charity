<?php

namespace Modules\Cms\Entities;

use App\Models\BaseModel;

class PublicMessage extends BaseModel
{
    protected $table = 'public_messages';

    protected $fillable = [
        'name',
		'email',
		'address',
		'message',
    ];

    protected $hidden = [];

    protected $casts = [
        'name' => 'string',
		'email' => 'string',
		'address' => 'string',
		'message' => 'string',
    ];

    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->diffForHumans();
    }
}
