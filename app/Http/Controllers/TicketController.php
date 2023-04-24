<?php

namespace App\Http\Controllers;

use App\Http\Filters\TicketFilter;
use App\Http\Requests\IndexTicketRequest;
use App\Models\Ticket;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use Throwable;

class TicketController extends Controller
{
    /**
     * Getting a list of requests by the responsible person.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(IndexTicketRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(TicketFilter::class, ['queryParams' => array_filter($data)]);
        $tickets = Ticket::filter($filter)->orderBy($request->sort, $request->direction)->get();
        return response($tickets);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store the new request in storage.
     *
     * @param  \App\Http\Requests\StoreTicketRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTicketRequest $request)
    {
        $data = $request->validated();

        $ticket = new Ticket();
        $ticket->name = $request->name;
        $ticket->email = $request->email;
        $ticket->message = $request->message;

        try {
            $ticket->save();
        } catch (Throwable $e) {
            return response([
                'status' => 'error',
                'message' => 'Failed to save ticket to database.',
            ], 500);
        }

        return response(['status' => 'success', 'ticket' => $ticket], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTicketRequest  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
