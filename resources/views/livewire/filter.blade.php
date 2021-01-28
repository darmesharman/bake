<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <form wire:submit.prevent="submit">
        <div class="form-group">
            <label for="archive_search">Поиск</label>
            <div class="inline">
                <input name="searchByName" type="text" id="archive_search" value="{{ Request::input('searchByName') }}" placeholder="Что вы ищите?">
                <button type="submit" class="btn icon square icon-search input" id="archive_search_submit"></button>
            </div>
        </div>

        <hr>

        <h5>Фильтры</h5>

        @livewire('category-select')

        @livewire('city-select')

        <button type="submit" class="btn btn-primary mxa">
            Отфильтровать
        </button>
    </form>

</div>
