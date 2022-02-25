<?php

use App\Models\Activity;
use App\Models\Content;
use App\Models\Experience;
use App\Models\Queue;
use App\Models\User;

return [
    'user' => [
        'roles' => [
            User::SUPERADMIN,
            User::ADMIN,
            User::DOCTOR,
            User::RECEPTIONIST,
            User::PATIENT,
        ],
    ],
    'queue' => [
        'status' => [
            Queue::CHECKIN,
            Queue::CASHER,
            Queue::DONE,
        ],
    ],
];
