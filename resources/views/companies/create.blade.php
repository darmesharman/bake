<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Company') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="container">
            <form action="{{ route('companies.store') }}" method="POST">
                @csrf
                <div class="col-auto">
                    <label class="mb-2">Name</label>
                    <input type="text" name="name" class="form-control" id="staticEmail2" placeholder="Name" required value="{{ old('name') }}">
                    @error('name')
                        <p class="alert alert-danger">{{ $message }}</p>
                    @enderror

                </div>
                <div class="col-auto mt-3 mb-3">
                    <label class="mb-2">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" required value="{{ old('email') }}">
                    @error('email')
                        <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-auto">
                    <label class="mb-2">Contacts</label>
                        @foreach ($contacts as $contact)
                            <div class="form-check">
                                <input type="checkbox" class="" name="contacts[]" multiple value="{{ $contact->id }}">
                                <label>{{ $contact->email }}</label>
                            </div>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-success mt-3">Add</button>
            </form>
        </div>
    </div>
</x-app-layout>
