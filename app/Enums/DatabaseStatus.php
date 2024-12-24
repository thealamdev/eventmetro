<?php

namespace App\Enums;

enum DatabaseStatus: int
{
    case PUBLISHED = 1;
    case DRAFT = 0;
}
