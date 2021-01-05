<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contact #') . $contact->id }}
        </h2>
    </x-slot>

    <div class="container mt-3">
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $contact->last_name }} {{ $contact->first_name }}</h5>
                        <p class="card-text">{{ $contact->email }}</p>
                        <p>companies:</p>
                        <ul>
                            @foreach ($contact->companies as $company)
                                <li>{{ $company->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
