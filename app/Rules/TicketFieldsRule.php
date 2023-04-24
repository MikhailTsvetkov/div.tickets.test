<?php

namespace App\Rules;

use App\Models\Ticket;
use Illuminate\Contracts\Validation\InvokableRule;

class TicketFieldsRule implements InvokableRule
{
    /**
     * Run the validation rule.
     * Make sure the column specified in the sort parameter exists in the table.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail)
    {
        $ticket = new Ticket;
        $data = $ticket->getTableColumns();
        if (! in_array($value, $data)) {
            $fail('The :attribute attribute must contain the name of an existing column.');
        }
    }
}
