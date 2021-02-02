<div>
    <div class="form-group">
        <label for="district">Регион или район</label>
        <div class="select-wrapper">
            <select wire:model="district_select" name="distID" class="dynamic-list required">
                <option value=""></option>
                @foreach($districts as $district)
                    <option value="{{ $district->id }}">
                        {{ $district->name }}
                    </option>
                @endforeach
            </select>
            <ul class="select-dropdown"></ul>
        </div>
    </div>

    @livewire('micro-district-select')
</div>
