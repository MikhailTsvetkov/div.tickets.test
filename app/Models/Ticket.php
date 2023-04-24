<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use App\Enums\TicketStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    use Filterable;

    protected $casts = [
        'status' => TicketStatusEnum::class,
    ];

    public function getTableColumns(): array
    {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }
}
