<x-body>
    <x-slot name="title">
        Tickets
    </x-slot>
<div class="row">
    <div class="col-12">
        <div class="d-md-flex flex-md-row-reverse align-items-center justify-content-between">
            <a class="btn btn-primary mb-2 mb-md-0" href="/ticket/create" title="Add Ticket" target="_blank" rel="noopener">Add Ticket</a>
            <h2>Tickets</h2>
        </div>

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($tickets as $ticket)
                <tr>
                    <td><a href="{{ url('/ticket', $ticket->id) }}">{{ $ticket->title }}</a></td>
                    <td><a href="{{ url('/ticket/edit', $ticket->id) }}" class="btn btn-primary mt-3">Edit</a></td>
                    <td><a href="{{ url('/ticket/delete', $ticket->id) }}" class="btn btn-primary mt-3">Delete</a></td>
                </tr>
            @endforeach
            </tbody>

        </table>

        {!! $tickets->links() !!}
    </div>
</div>
</x-body>
