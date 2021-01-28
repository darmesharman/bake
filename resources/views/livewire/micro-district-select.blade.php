<div>
    <div class="form-group">
        <label for="microdistrict">Микрорайон</label>
        <div class="select-wrapper">
            <select name="mDistId" class="dynamic-list required">
                <option value=""></option>
                @foreach($micro_districts as $micro_district)
                    <option value="{{ $micro_district->id }}" {{ Request::input('mDistId') == $micro_district->id ? 'selected' : '' }}>
                        {{ $micro_district->name }}
                    </option>
                @endforeach
            </select>
            <ul class="select-dropdown"></ul>
        </div>
    </div>
</div>
