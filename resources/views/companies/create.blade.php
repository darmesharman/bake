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
                    <input type="text" name="name" class="form-control" id="staticEmail2" placeholder="Name" required>
                    @error('name')
                        <p class="alert alert-danger">{{ $message }}</p>
                    @enderror

                </div>
                <div class="col-auto mt-3 mb-3">
                    <label class="mb-2">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                    @error('email')
                        <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
                <button class="btn btn-success">Add</button>
            </form>
        </div>
    </div>
</x-app-layout>
