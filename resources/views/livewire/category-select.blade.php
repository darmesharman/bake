<div>
    <div class="form-group">

        <label for="category">Категория</label>
        <div class="select-wrapper">
            <select wire:model="category_select" name="kategoriID" class="dynamic-list required">
                <option value=""></option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">
<<<<<<< HEAD
=======

>>>>>>> a0dba9fa5649aa527c9385efc6bcb04359cda826
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            <ul class="select-dropdown">

            </ul>
        </div>
    </div>

    @livewire('sub-category-select')
</div>
