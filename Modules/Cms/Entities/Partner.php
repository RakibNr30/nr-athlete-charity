<?php

namespace Modules\Cms\Entities;

use App\Models\BaseModel;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Partner extends BaseModel implements hasMedia
{
    use hasMediaTrait;

    protected $table = 'partners';

    protected $fillable = [
        'name',
		'address'
    ];

    protected $hidden = [];

    protected $appends = ['logo'];

    protected $casts = [
        'name' => 'string',
		'address' => 'string',
    ];

    // get logo attribute
    public function getLogoAttribute()
    {
        $media = $this->getMedia(config('core.media_collection.partner.logo'));
        if (isset($media[0])) {
            return json_decode(json_encode([
                'file_name' => $media[0]->file_name,
                'file_url' => $media[0]->getUrl()
            ]));
        }
        return null;
    }

    public function uploadFiles()
    {
        // check for logo
        if (request()->hasFile('logo')) {
            // remove old file from collection
            if ($this->hasMedia(config('core.media_collection.partner.logo'))) {
                $this->clearMediaCollection(config('core.media_collection.partner.logo'));
            }
            // upload new file to collection
            $this->addMediaFromRequest('logo')
                ->toMediaCollection(config('core.media_collection.partner.logo'));
        }
    }
}
