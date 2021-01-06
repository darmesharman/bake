<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Comapny') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <a class="btn btn-success m-2" href="{{ route('companies.create') }}">Create</a>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Contacts</th>
                        <th scope="col">Read</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($companies as $company)
                            <tr>
                                <th scope="row">{{ $company->id }}</th>
                                <td>{{ $company->name }}</td>
                                <td>{{ $company->email }}</td>
                                <td>
                                    @foreach ($company->contacts as $contact)
                                        {{ $contact->email }}
                                        <br>
                                    @endforeach
                                </td>
                                <td><a class="btn btn-secondary " href="{{ route('companies.show', $company) }}">Read</a></td>

                                <td><a class="btn btn-primary" href="{{ route('companies.edit', $company) }}">Edit</a></td>
                                <form action="{{ route('companies.destroy', $company) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <td><button class="btn btn-danger">Delete</button></td>
                                </form>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</x-app-layout>
