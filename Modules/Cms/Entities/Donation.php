<?php

namespace Modules\Cms\Entities;

use App\Models\BaseModel;

class Donation extends BaseModel
{
    protected $table = 'donations';

    protected $fillable = [
        'donate_amount',
        'rice_donate_amount',
        'donner_id',
        'activity_id',
        'case_id',
        'token',
        'payer_id',
    ];

    protected $hidden = [];

    protected $casts = [
        'donate_amount' => 'double',
        'rice_donate_amount' => 'double',
        'donner_id' => 'integer',
        'activity_id' => 'string',
        'case_id' => 'integer',
        'token' => 'string',
        'payer_id' => 'string',
    ];
}