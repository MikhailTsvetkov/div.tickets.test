<?php


namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

class TicketFilter extends AbstractFilter
{
    public const STATUS = 'status';
    public const CREATED_AT = 'created_at';
    public const UPDATED_AT = 'updated_at';
    public const OFFSET = 'offset';
    public const LIMIT = 'limit';


    protected function getCallbacks(): array
    {
        return [
            self::STATUS => [$this, 'status'],
            self::CREATED_AT => [$this, 'created_at'],
            self::UPDATED_AT => [$this, 'updated_at'],
            self::OFFSET => [$this, 'offset'],
            self::LIMIT => [$this, 'limit'],
        ];
    }

    public function status(Builder $builder, $value)
    {
        $builder->where('status', $value);
    }

    public function created_at(Builder $builder, $value)
    {
        $builder->where('created_at', 'like', "{$value}%");
    }

    public function updated_at(Builder $builder, $value)
    {
        $builder->where('updated_at', 'like', "{$value}%");
    }

    public function offset(Builder $builder, $value)
    {
        $builder->offset($value);
    }

    public function limit(Builder $builder, $value)
    {
        $builder->limit($value);
    }
}

