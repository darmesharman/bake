<div>
    <p>{{ $user }}</p>

    <select name="teset" wire:model="category_select">
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
</div>
