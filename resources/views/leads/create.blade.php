<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Lead') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="container">
            <form action="{{ route('leads.store') }}" method="POST">
                @csrf

                <div class="col-auto">
                    <label class="mb-2">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}" required>
                    @error('name')
                        <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-auto">
                    <label class="mb-2">Status</label>
                    <select name="status" id="status" class="form-control">
                        @foreach ($statuses as $status)
                            <option value="{{ $status->id }}" {{ old('status') === $status->id ? 'selected' : '' }}>{{ $status->name }}</option>
                        @endforeach
                    </select>
                    @error('status')
                        <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-auto">
                    <label class="mb-2">Sum</label>
                    <input type="text" name="sum" class="form-control" placeholder="Sum" value="{{ old('sum') }}" required>
                    @error('sum')
                        <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div id="contact" class="border rounded border-3 mt-5 p-3">

                    <div class="col-auto">
                        <label class="mb-2">Contact</label>

                        @foreach ($contacts as $contact)
                            <div class="form-check">
                                <input type="checkbox" name="contacts[]" id="{{ $contact->id }}" class="form-check-input" value="{{ $contact->id }}"
                                    {{ (old('contacts') and in_array($contact->id, old('contacts'))) ? 'checked' : '' }}>
                                <label for="{{ $contact->id }}" class="form-check-label">{{ $contact->first_name }}</label>
                            </div>
                        @endforeach
                        @error('contacts')
                            <p class="alert alert-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <hr>

                    {{-- <div class="mb-3">
                        <label for="last_name" class="form-label">First name</label>
                        <input type="text" class="form-control" name="last_name" id="last_name" aria-describedby="emailHelp">
                        @error('first_name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="first_name" class="form-label">Last name</label>
                        <input type="text" class="form-control" name="first_name" id="first_name" aria-describedby="emailHelp">
                        @error('last_name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
                        @error('contact_email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div> --}}
                </div>

                <div id="company" class="border rounded border-3 mt-5 p-3">
                    <div class="col-auto">
                        <label class="mb-2">Company</label>
                        <select name="company" id="company" class="form-control">
                            <option value="">None</option>
                            @foreach ($companies as $company)
                                <option value="{{ $company->id }}" {{ old('company') === $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                            @endforeach
                        </select>
                        @error('company')
                            <p class="alert alert-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <button class="btn btn-success mt-3">Add</button>
            </form>
        </div>
    </div>
</x-app-layout>
