<?php

namespace App\Enums;

enum TicketStatusEnum:string
{
    case Active = 'Active';
    case Resolved = 'Resolved';
}
