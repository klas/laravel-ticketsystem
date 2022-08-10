<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Repositories\TicketRepository;
use App\Repositories\UserRepository;
use App\Models\Ticket;
use Illuminate\Http\Request;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TicketController extends Controller
{
    protected $ticketRepository;
    protected $userRepository;

    public function __construct(TicketRepository $ticketRepository, UserRepository $userRepository)
    {
        $this->ticketRepository = $ticketRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('tickets', [
            'tickets' => $this->ticketRepository->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('ticket-form', [
            'ticket' => new Ticket(),
            'users' => $this->userRepository->all(['id', 'name'])->mapWithKeys(function ($item, $key) {
                return [$item['id'] => $item['name']];
            })
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTicketRequest  $request
     */
    public function store(StoreTicketRequest $request, Ticket $ticket)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],
            'status' => ['required', 'numeric', 'integer'],
            'user_id' => ['required', 'numeric', 'integer'],
        ]);

        if ((int)$ticket->id > 0)
        {
            $this->ticketRepository->updateById((int)$ticket->id, $validatedData);
        }
        else{
            $this->ticketRepository->create($validatedData);
        }


        return redirect('/')->with('status', 'Ticket Has Been inserted/updated');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\View\View
     */
    public function show(Ticket $ticket)
    {
        return view('ticket', [
            'ticket' => $ticket
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\View\View
     */
    public function edit(Ticket $ticket)
    {
        return view('ticket-form', [
            'ticket' => $ticket,
            'users' => $this->userRepository->all(['id', 'name'])->mapWithKeys(function ($item, $key) {
                return [$item['id'] => $item['name']];
            })
        ]);
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
     * @param  Request  $request
     * @param  Ticket  $ticket
     */
    public function destroy(Request $request, Ticket $ticket)
    {
        $this->ticketRepository->deleteById($ticket->id);

        return redirect('/')->with('status', 'Ticket has been deleted');
    }
}
