<div wire:poll.10s="refreshCars">
    <x-title class="mb-4">
        Актуальная очередь автомобилей
        <strong class="text-indigo-600">
            Верхнего Ларса
        </strong>
    </x-title>

    <x-table :columns="['#', 'Страна', 'Номер', 'Модель', 'Дата регистрации']" :values="$cars" />
</div>
