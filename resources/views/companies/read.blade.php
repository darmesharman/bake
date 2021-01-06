<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('About Company') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="container">
                <div class="col-auto">
                    <label class="mb-2">Name</label>
                    <input type="text" name="name" class="input-group-text" id="staticEmail2" placeholder="Name" value="{{ $company->name }}" disabled>
                    @error('name')
                        <p class="alert alert-danger">{{ $message }}</p>
                    @enderror

                </div>
                <div class="col-auto mt-3 mb-3">
                    <label class="mb-2">Email</label>
                    <input type="email" name="email" class="input-group-text" value="{{ $company->email }}" placeholder="Email" disabled>
                    @error('email')
                        <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
                <a class="btn btn-secondary mt-3" href="{{ route('companies.index') }}">Back</a>
        </div>
    </div>
</x-app-layout>
