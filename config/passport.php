<?php
return [
    'default' =>
        [
            'grant_type'        =>      env('PASSPORT_GRANT_TYPE'),
            'client_id'         =>      env('PASSPORT_CLIENT_ID'),
            'client_secret'     =>      env('PASSPORT_SECRET'),
            'scope'             =>      env('PASSPORT_SCOPE', '')
        ]
];