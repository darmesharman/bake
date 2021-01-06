<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contacts') }}
        </h2>
    </x-slot>

    <div class="container mt-3">
        <h6><a href="{{ route('contacts.create') }}">Create Contact</a></h6>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Last name</th>
                    <th scope="col">First name</th>
                    <th scope="col">email</th>
                    <th scope="col">Companies</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                <tr>
                    <th scope="row">{{ $contact->id }}</th>
                    <td>{{ $contact->last_name }}</td>
                    <td>{{ $contact->first_name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>
                        @foreach ($contact->companies as $company)
                            {{ $company->email }}
                            <br>
                        @endforeach
                    </td>
                    <td><a href="{{ route('contacts.show', $contact) }}" class="btn btn-primary">Show</a></td>
                    <td><a href="{{ route('contacts.edit', $contact) }}" class="btn btn-primary">Edit</a></td>
                    <td>
                        <form method="post" action="{{ route('contacts.destroy', $contact) }}">
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
