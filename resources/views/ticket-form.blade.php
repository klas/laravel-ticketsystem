<x-body>
    <x-slot name="title">
        Ticket Edit/Create
    </x-slot>

<div>
    <h2>Ticket Edit/Create</h2>
</div>
<div class="card">
    <div class="card-body">
        <form name="ticket-form" id="ticket-form" method="post" action="{{ url('/ticket/store', [$ticket->id]) }}">
            @csrf

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" class="@error('title') is-invalid @enderror form-control"
                       value="{{ old('title', $ticket->title) }}">
                @error('title')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="@error('title') is-invalid @enderror form-control"
                >{{ old('description', $ticket->description) }}</textarea>
                @error('description')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            @bind($ticket)
            <div class="form-group">
                <label for="user_id">Created By</label>
                <x-form-select name="user_id" :options="$users" value="{{ old('user_id', $ticket->user_id) }}" />
                @error('user_id')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            @endbind
            <div class="form-group">
                <label for="status">Status</label>
                <input type="text" id="status" name="status" class="@error('title') is-invalid @enderror form-control"
                       value="{{ old('status', $ticket->status) }}">
                @error('status')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
</div>

</x-body>
