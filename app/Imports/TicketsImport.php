<?php

namespace App\Imports;

use App\Models\Ticket;
use App\Repositories\TicketRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class TicketsImport implements ToCollection
{
    protected $ticketRepository;
    protected $userRepository;

    public function __construct(TicketRepository $ticketRepository, UserRepository $userRepository)
    {
        $this->ticketRepository = $ticketRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * @param  Collection  $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row)
        {
            $user = $this->userRepository->firstOrCreate([

            ]);


            $this->ticketRepository->create([
                'title' => $row['title'],
                'description' => $row['title'],
                'status' => $row['title'],
                'user_id' => $user->id,
            ]);
        }
    }
}
