<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Leads') }}
        </h2>
    </x-slot>

    <div class="container mt-3">
        <h6><a href="{{ route('leads.create') }}">Create Lead</a></h6>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Sum</th>
                    <th scope="col">Contacts</th>
                    <th scope="col">Company</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($leads as $lead)
                <tr>
                    <th scope="row">{{ $lead->id }}</th>
                    <td>{{ $lead->name }}</td>
                    <td>{{ $lead->status->name }}</td>
                    <td>{{ $lead->sum }}</td>
                    <td>
                        <ol>
                            @foreach ($lead->contacts as $contact)
                                <li>{{ $contact->id }}. {{ $contact->first_name }}</li>
                            @endforeach
                        </ol>
                    </td>
                    <td> {{ $lead->company ? $lead->company->name : ''}} </td>
                    <td><a href="{{ route('leads.show', $lead) }}" class="btn btn-primary">Show</a></td>
                    <td><a href="{{ route('leads.edit', $lead) }}" class="btn btn-primary">Edit</a></td>
                    <td>
                        <form method="post" action="{{ route('leads.destroy', $lead) }}">
                            @csrf
                            @method('delete')

                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
