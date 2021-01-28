<div>
    <div class="form-group">

        <label for="category">Категория</label>
        <div class="select-wrapper">
            <select wire:model="category_select" name="kategoriID" class="dynamic-list required">
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
