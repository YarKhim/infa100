{{--<x-filament-widgets::widget>--}}
{{--    <x-filament::section>--}}
{{--        <div>--}}
{{--            --}}{{--            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">--}}
{{--            <div class="flex justify-between items-center mb-4">--}}
{{--                <h3 class="text-lg font-medium">Все курсы</h3>--}}
{{--                <span class="text-sm text-gray-500">Всего: {{ $cources->count() }}</span>--}}
{{--            </div>--}}

{{--            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-1">--}}
{{--                @foreach($cources as $course)--}}
{{--                    <div--}}
{{--                        class="fi-card bg-white dark:bg-gray-800 rounded shadow-sm hover:shadow transition-all--}}
{{--                        duration-200 border dark:border-gray-700 overflow-hidden">--}}
{{--                        <!-- Изображение с отступами -->--}}
{{--                        <div class="p-2 sm:p-1.5 md:p-1">--}}
{{--                            <div--}}
{{--                                class="relative h-48 sm:h-24 md:h-20 lg:h-16 overflow-hidden bg-gray-100 dark:bg-gray-700 rounded-md">--}}
{{--                                <img--}}
{{--                                    src="http://172.18.253.46:8088/storage/{{ $course->files_paths }}"--}}
{{--                                    alt="{{ $course->title }}"--}}
{{--                                    class="w-full h-full object-cover">--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <!-- Контент -->--}}
{{--                        <div class="p-3 sm:p-1.5 text-center">--}}
{{--                            <h4 class="text-sm sm:text-[11px] lg:text-xs font-medium text-gray-900 dark:text-white truncate sm:line-clamp-2 sm:min-h-[20px]">--}}
{{--                                {{ $course->title }}--}}
{{--                            </h4>--}}
{{--                            <div class="flex items-center justify-center gap-1 mt-1">--}}
{{--                                <button--}}
{{--                                    onclick="window.location.replace(`http://172.18.253.46:8088/student/courses/{{ $course->id }}`)"--}}
{{--                                    class="fi-ac-btn-action fi-btn fi-size-md fi-color fi-color-primary fi-bg-color-400 hover:fi-bg-color-300 dark:fi-bg-color-600 dark:hover:fi-bg-color-500 fi-text-color-900 hover:fi-text-color-800 dark:fi-text-color-950 dark:hover:fi-text-color-950"--}}
{{--                                >--}}
{{--                                    Подробнее--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--            --}}{{--            </div>--}}
{{--        </div>--}}
{{--    </x-filament::section>--}}
{{--</x-filament-widgets::widget>--}}


{{--<x-filament-widgets::widget>--}}
{{--    <x-filament::section>--}}
{{--        <div>--}}
{{--            <div class="flex justify-between items-center mb-4">--}}
{{--                <h3 class="text-lg font-medium">Все курсы</h3>--}}
{{--                <span class="text-sm text-gray-500">Всего: {{ $cources->count() }}</span>--}}
{{--            </div>--}}

{{--            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(180px, 1fr)); gap: 12px;">--}}
{{--                @foreach($cources as $course)--}}
{{--                    <div--}}
{{--                        style="background: white; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); overflow: hidden; border: 1px solid #e5e7eb;"--}}
{{--                        class="dark:bg-gray-800 dark:border-gray-700 hover:shadow transition-all duration-200">--}}
{{--                        <!-- Изображение с отступами -->--}}
{{--                        <div style="padding: 8px;">--}}
{{--                            <div--}}
{{--                                style="position: relative; overflow: hidden; background: #f3f4f6; border-radius: 6px; padding-bottom: 56.25%;">--}}
{{--                                <img--}}
{{--                                    src="http://172.18.253.46:8088/storage/{{ $course->files_paths }}"--}}
{{--                                    alt="{{ $course->title }}"--}}
{{--                                    style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover;"--}}
{{--                                >--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <!-- Контент -->--}}
{{--                        <div style="padding: 12px 8px; text-align: center;">--}}
{{--                            <h4 style="font-size: 14px; font-weight: 500; color: #111827; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"--}}
{{--                                class="dark:text-white">--}}
{{--                                {{ $course->title }}--}}
{{--                            </h4>--}}
{{--                            <div--}}
{{--                                style="display: flex; align-items: center; justify-content: center; gap: 4px; margin-top: 4px;">--}}
{{--                                <button--}}
{{--                                    onclick="window.location.replace(`http://172.18.253.46:8088/student/courses/{{ $course->id }}`)"--}}
{{--                                    class="fi-ac-btn-action fi-btn fi-size-md fi-color fi-color-primary fi-bg-color-400 hover:fi-bg-color-300 dark:fi-bg-color-600 dark:hover:fi-bg-color-500 fi-text-color-900 hover:fi-text-color-800 dark:fi-text-color-950 dark:hover:fi-text-color-950"--}}
{{--                                >--}}
{{--                                    Подробнее--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </x-filament::section>--}}
{{--</x-filament-widgets::widget>--}}


{{--<x-filament-widgets::widget>--}}
{{--    <x-filament::section>--}}
{{--        <div>--}}
{{--            <div class="flex justify-between items-center mb-4">--}}
{{--                <h3 class="text-lg font-medium">Все курсы</h3>--}}
{{--                <span class="text-sm text-gray-500">Всего: {{ $cources->count() }}</span>--}}
{{--            </div>--}}

{{--            <table style="width: 100%; border-collapse: collapse;">--}}
{{--                <tbody>--}}
{{--                @php--}}
{{--                    $chunks = $cources->chunk(5);--}}
{{--                @endphp--}}
{{--                @foreach($chunks as $chunk)--}}
{{--                    <tr>--}}
{{--                        @foreach($chunk as $course)--}}
{{--                            <td style="width: 20%; padding: 6px; vertical-align: top;">--}}
{{--                                <div--}}
{{--                                    class="bg-white dark:bg-gray-800 rounded shadow-sm hover:shadow transition-all duration-200 border dark:border-gray-700 overflow-hidden">--}}
{{--                                    <!-- Изображение с отступами -->--}}
{{--                                    <div class="p-2">--}}
{{--                                        <div class="relative overflow-hidden bg-gray-100 dark:bg-gray-700 rounded-md"--}}
{{--                                             style="padding-bottom: 56.25%;">--}}
{{--                                            <img--}}
{{--                                                src="http://172.18.253.46:8088/storage/{{ $course->files_paths }}"--}}
{{--                                                alt="{{ $course->title }}"--}}
{{--                                                class="absolute top-0 left-0 w-full h-full object-cover"--}}
{{--                                            >--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <!-- Контент -->--}}
{{--                                    <div class="p-2 text-center">--}}
{{--                                        <h4 class="text-xs font-medium text-gray-900 dark:text-white truncate">--}}
{{--                                            {{ $course->title }}--}}
{{--                                        </h4>--}}
{{--                                        <div class="flex items-center justify-center gap-1 mt-1">--}}
{{--                                            <button--}}
{{--                                                onclick="window.location.replace(`http://172.18.253.46:8088/student/courses/{{ $course->id }}`)"--}}
{{--                                                class="fi-ac-btn-action fi-btn fi-size-md fi-color fi-color-primary fi-bg-color-400 hover:fi-bg-color-300 dark:fi-bg-color-600 dark:hover:fi-bg-color-500 fi-text-color-900 hover:fi-text-color-800 dark:fi-text-color-950 dark:hover:fi-text-color-950"--}}
{{--                                            >--}}
{{--                                                Подробнее--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                        @endforeach--}}
{{--                    </tr>--}}
{{--                @endforeach--}}
{{--                </tbody>--}}
{{--            </table>--}}
{{--        </div>--}}
{{--    </x-filament::section>--}}
{{--</x-filament-widgets::widget>--}}


{{--<x-filament-widgets::widget>--}}
{{--    <x-filament::section>--}}
{{--        <div>--}}
{{--            <div class="flex justify-between items-center mb-4">--}}
{{--                <h3 class="text-lg font-medium">Все курсы</h3>--}}
{{--                <span class="text-sm text-gray-500">Всего: {{ $cources->count() }}</span>--}}
{{--            </div>--}}

{{--            <table style="width: 100%; border-collapse: collapse;">--}}
{{--                <tbody>--}}
{{--                @php--}}
{{--                    $chunks = $cources->chunk(4);--}}
{{--                @endphp--}}
{{--                @foreach($chunks as $chunk)--}}
{{--                    <tr>--}}
{{--                        @foreach($chunk as $course)--}}
{{--                            <td style="width: 25%; padding: 6px; vertical-align: top;">--}}
{{--                                <div class="bg-white dark:bg-gray-800 rounded shadow-sm hover:shadow transition-all duration-200 border dark:border-gray-700 overflow-hidden">--}}
{{--                                    <!-- Изображение с отступами -->--}}
{{--                                    <div class="p-2">--}}
{{--                                        <div class="relative overflow-hidden bg-gray-100 dark:bg-gray-700 rounded-md" style="padding-bottom: 56.25%;">--}}
{{--                                            <img--}}
{{--                                                src="http://172.18.253.46:8088/storage/{{ $course->files_paths }}"--}}
{{--                                                alt="{{ $course->title }}"--}}
{{--                                                class="absolute top-0 left-0 w-full h-full object-cover"--}}
{{--                                            >--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <!-- Контент -->--}}
{{--                                    <div class="p-2 text-center">--}}
{{--                                        <h4 class="text-xs font-medium text-gray-900 dark:text-white truncate">--}}
{{--                                            {{ $course->title }}--}}
{{--                                        </h4>--}}
{{--                                        <div class="flex items-center justify-center gap-1 mt-1">--}}
{{--                                            <button--}}
{{--                                                onclick="window.location.replace(`http://172.18.253.46:8088/student/courses/{{ $course->id }}`)"--}}
{{--                                                class="fi-ac-btn-action fi-btn fi-size-md fi-color fi-color-primary fi-bg-color-400 hover:fi-bg-color-300 dark:fi-bg-color-600 dark:hover:fi-bg-color-500 fi-text-color-900 hover:fi-text-color-800 dark:fi-text-color-950 dark:hover:fi-text-color-950"--}}
{{--                                            >--}}
{{--                                                Подробнее--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                        @endforeach--}}
{{--                    </tr>--}}
{{--                @endforeach--}}
{{--                </tbody>--}}
{{--            </table>--}}
{{--        </div>--}}
{{--    </x-filament::section>--}}
{{--</x-filament-widgets::widget>--}}


<x-filament-widgets::widget>
    <x-filament::section>
        <div>
            <style>
                /* Мобильная версия - 1 карточка в строке */
                @media (max-width: 640px) {
                    .course-table td {
                        display: block;
                        width: 100% !important;
                        padding: 6px 0;
                    }

                    .course-table tr {
                        display: block;
                    }

                    .course-table tbody {
                        display: block;
                    }

                    .course-table {
                        display: block;
                    }
                }

                /* Планшет и десктоп - 4 карточки в строке */
                @media (min-width: 641px) {
                    .course-table {
                        width: 100%;
                        border-collapse: collapse;
                    }

                    .course-table td {
                        width: 25%;
                        padding: 6px;
                        vertical-align: top;
                        display: table-cell;
                    }

                    .course-table tr {
                        display: table-row;
                    }

                    .course-table tbody {
                        display: table-row-group;
                    }
                }
            </style>
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-medium">Все курсы</h3>
                <span class="text-sm text-gray-500">Всего: {{ $cources->count() }}</span>
            </div>

            <table class="course-table" style="width: 100%; border-collapse: collapse;">
                <tbody>
                @php
                    $chunks = $cources->chunk(4);
                @endphp
                @foreach($chunks as $chunk)
                    <tr>
                        @foreach($chunk as $course)
                            <td style="width: 25%; padding: 6px; vertical-align: top;">
                                <div
                                        class="fi-section-content bg-white dark:bg-gray-800 rounded shadow-sm hover:shadow
                                        transition-all duration-200 border dark:border-gray-700 overflow-hidden">
                                    <!-- Изображение с отступами -->
                                    <div class="p-2">
                                        <div class="relative overflow-hidden bg-gray-100 dark:bg-gray-700 rounded-md"
                                             style="padding-bottom: 56.25%;">
                                            <img
                                                    src="http://172.18.253.46:8088/storage/{{ $course->files_paths }}"
                                                    alt="{{ $course->title }}"
                                                    class="absolute top-0 left-0 w-full h-full object-cover"
                                            >
                                        </div>
                                    </div>

                                    <!-- Контент -->
                                    <div class="p-2 text-center">
                                        <h4 class="text-xs font-medium text-gray-900 dark:text-white truncate">
                                            {{ $course->title }}
                                        </h4>
                                        <div class="flex items-center justify-center gap-1 mt-1">
                                            <button
                                                    onclick="window.location.replace(`http://172.18.253.46:8088/student/cources/{{$course->id }}`)"
                                                    class="fi-ac-btn-action fi-btn fi-size-md fi-color fi-color-primary fi-bg-color-400 hover:fi-bg-color-300 dark:fi-bg-color-600 dark:hover:fi-bg-color-500 fi-text-color-900 hover:fi-text-color-800 dark:fi-text-color-950 dark:hover:fi-text-color-950"
                                            >
                                                Подробнее
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        @endforeach
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
