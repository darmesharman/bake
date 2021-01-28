<div>
    <div class="form-group">
        <label for="category">Категория</label>
        <div class="select-wrapper">
            <select wire:model.debounce.10ms="category_select" name="kategoriID" class="dynamic-list required">
                <option value=""></option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            <ul class="select-dropdown">

            </ul>
        </div>
    </div>

    @livewire('sub-category-select', [$category])
</div>
