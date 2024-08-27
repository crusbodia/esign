<?php

namespace App\Domains\Signature\Enums;
enum Status: int
{
    case PENDING = 0;
    case APPROVED = 1;

    case CANCELLED = 2;
}
