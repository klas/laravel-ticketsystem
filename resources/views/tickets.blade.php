<x-body>
    <x-slot name="title">
        Tickets
    </x-slot>
<div class="row">
    <div class="col-12">
        <h2>Tickets</h2>

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Title</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tickets as $ticket)
                <tr>
                    <td><a href="{{ url('/ticket', $ticket->id) }}">{{ $ticket->title }}</a></td>
                </tr>
            @endforeach
            </tbody>

        </table>
        <a href="/create" class="btn btn-primary mt-3">Add Ticket</a>
    </div>
</div>
</x-body>
