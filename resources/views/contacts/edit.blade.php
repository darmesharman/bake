<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contacts') }}
        </h2>
    </x-slot>

    <div class="container mt-3">
        <form method="post" action="{{ route('contacts.update', $contact) }}">
            @csrf
            @method('put')

            <div class="mb-3">
                <label for="last_name" class="form-label">Last name</label>
                <input type="text" class="form-control" name="last_name" id="last_name" aria-describedby="emailHelp" value="{{ $contact->last_name }}">
                @error('last_name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="first_name" class="form-label">First name</label>
                <input type="text" class="form-control" name="first_name" id="first_name" aria-describedby="emailHelp" value="{{ $contact->first_name }}">
                @error('first_name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" value="{{ $contact->email }}">
                @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Create Contact</button>
        </form>
    </div>
</x-app-layout>
