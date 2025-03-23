@props(['columns' => [], 'values' => []])

<div class="overflow-x-auto">
    <table class="min-w-full divide-y-2 divide-gray-200">
        <thead class="ltr:text-left rtl:text-right">
            <tr class="*:font-medium *:text-gray-900">
                @foreach ($columns as $column)
                    <th class="px-3 py-2 whitespace-nowrap">
                        {{ $column }}
                    </th>
                @endforeach
            </tr>
        </thead>

        <tbody class="divide-y divide-gray-200">
            @foreach ($values as $row)
                <tr class="*:text-gray-900 *:first:font-medium">
                    @foreach ($row as $value)
                        <td class="px-3 py-2 whitespace-nowrap">
                            {{ $value }}
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
