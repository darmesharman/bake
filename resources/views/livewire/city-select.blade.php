<div>
    <div class="form-group">
        <label for="city">Город или область</label>
        <div class="select-wrapper">
            <select wire:model="city_select" name="sitiID" class="dynamic-list required">
                <option value=""></option>
                @foreach($cities as $city)
                    <option value="{{ $city->id }}" {{ Request::input('sitiID') == $city->id ? 'selected' : '' }}>
                        {{ $city->name }}
                    </option>
                @endforeach
            </select>
            <ul class="select-dropdown">
            </ul>
        </div>
    </div>

    @livewire('district-select', [$city])
</div>
