<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lead #') . $lead->id }}
        </h2>
    </x-slot>

    <div class="container mt-3">
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $lead->name }}</h5>
                        <p class="card-text">{{ $lead->status->name }}</p>
                        <p class="card-text">{{ $lead->sum }}</p>
                        <p class="card-text">Company: {{ $lead->company ? $lead->company->name : '' }}</p>
                        <h6>Contacts: </h6>
                        <ol>
                            @foreach ($lead->contacts as $contact)
                                <li>{{ $contact->id }}. {{ $contact->first_name }}</li>
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
