<?php

return [
    'client_id' => env('CT_STRAVA_CLIENT_ID', ''),
    'client_secret' => env('CT_STRAVA_SECRET_ID', ''),
    'redirect_uri' => env('APP_URL', '') . '/auth/strava/callback',
];
