<?php

namespace Modules\Cms\Entities;

use App\Models\BaseModel;

class About extends BaseModel
{
    protected $table = 'abouts';

    protected $fillable = [
        'about',
        'mission',
        'vision',
        'goals',
    ];

    protected $hidden = [];

    protected $casts = [
        'about' => 'string',
        'mission' => 'string',
        'vision' => 'string',
        'goals' => 'string'
    ];
}
