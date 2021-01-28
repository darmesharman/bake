<div>
    <div class="form-group">
        <label for="subcategory">Подкатегория</label>
        <div class="select-wrapper">
            <select name="subKategoriID" class="dynamic-list required">
                <option value=""></option>
                @foreach($subCategories as $subCategory)
                    <option value="{{ $subCategory->id }}" {{ Request::input('subKategoriID') == $subCategory->id ? 'selected' : '' }}>
                        {{ $subCategory->name }}
                    </option>
                @endforeach
            </select>
            <ul class="select-dropdown"></ul>
        </div>
    </div>
</div>
