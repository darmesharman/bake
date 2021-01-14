<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Contact') }}
        </h2>
    </x-slot>

    <div class="container mt-3">
        <form method="POST" action="{{ route('contacts.store') }}">
            @csrf

            <div class="mb-3">
                <label for="last_name" class="form-label">Last name</label>
                <input type="text" class="form-control" name="last_name" id="last_name" aria-describedby="emailHelp" value="{{ old('last_name') }}">
                @error('last_name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="first_name" class="form-label">First name</label>
                <input type="text" class="form-control" name="first_name" id="first_name" aria-describedby="emailHelp" value="{{ old('first_name') }}">
                @error('first_name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" value="{{ old('email') }}">
                @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>


            <div id="companies" class="border rounded border-3 p-3">
                <h6>Companies:</h6>

                <div class="col-auto" id="companies">
                    @foreach ($companies as $company)
                        <div class="form-check">
                            <input type="checkbox" name="companies[]" id="{{ $company->id }}" class="form-check-input" value="{{ $company->id }}"
                                {{ (old('companies') and in_array($company->id, old('companies'))) ? 'checked' : '' }}>
                            <label for="{{ $company->id }}" class="form-check-label">{{ $company->email }}</label>
                        </div>
                    @endforeach
                </div>
                @error('companies')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>


            <button type="submit" class="btn btn-primary">Create Contact</button>
        </form>
    </div>
</x-app-layout>
