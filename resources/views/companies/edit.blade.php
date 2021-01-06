<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Company') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="container">
            <form action="{{ route('companies.update', $company) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="col-auto">
                    <label class="mb-2">Name</label>
                    <input type="text" name="name" class="form-control" id="staticEmail2" placeholder="Name" value="{{ $company->name }}" required>
                    @error('name')
                        <p class="mt-2 alert-danger">{{ $message }}</p>
                    @enderror

                </div>
                <div class="col-auto mt-3 mb-3">
                    <label class="mb-2">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $company->email }}" placeholder="Email" required>
                    @error('email')
                        <p class="mt-2 alert-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-auto">
                    <label class="mb-2">Contacts</label>
                    @foreach ($contacts as $contact)
                        <div class="form-check">
                            <input type="checkbox" class="" name="contacts[]" multiple value="{{ $contact->id }}"
                                @foreach ($contact->companies as $com)
                                    @if($com->id === $contact->id)
                                        checked
                                        @break
                                    @endif
                                @endforeach
                            >
                            <label>{{ $contact->email }}</label>
                        </div>
                    @endforeach
                    @error('contacts')
                        <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
                <button class="btn btn-primary mt-3">Update</button>
            </form>
        </div>
    </div>
</x-app-layout>
