<?php

namespace App\Enums;

enum Disk: string
{
    case LOCAL = 'local';
    case S3 = 's3';
};
