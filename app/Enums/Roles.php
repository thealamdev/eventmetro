<?php

namespace App\Enums;

enum Roles: string
{
    case SUPERADMIN = 'super-admin';
    case ADMIN      = 'admin';
    case ATTENDEE   = 'attendee';
    case ORGANIZER  = 'organizer';
};
