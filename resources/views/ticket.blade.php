<x-body>
    <x-slot name="title">
        Ticket {{ $ticket->title }}
    </x-slot>

    <div class="row">
        <div class="col-12">
            <h2>{{ $ticket->title }}</h2>
        </div>
        <div class="col-12">
            {{ $ticket->description }}
        </div>
    </div>

</x-body>
