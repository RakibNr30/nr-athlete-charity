<?php

namespace Modules\Cms\Entities;

use App\Models\BaseModel;

class Rice extends BaseModel
{
    protected $table = 'rices';

    protected $fillable = [
        'global_avg_price',
        'currency'
    ];

    protected $hidden = [];

    protected $casts = [
        'global_avg_price' => 'double',
        'currency' => 'string',
    ];
}