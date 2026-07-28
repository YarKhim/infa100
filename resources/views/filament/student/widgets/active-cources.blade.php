{{--<x-filament-widgets::widget>--}}
{{--    <x-filament::section>--}}
{{--        <div>--}}
{{--            --}}{{--            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">--}}
{{--            <div class="flex justify-between items-center mb-4">--}}
{{--                <h3 class="text-lg font-medium">Активные курсы</h3>--}}
{{--                <span class="text-sm text-gray-500">Всего: {{ $activeCources->count() }}</span>--}}
{{--            </div>--}}

{{--            <div class="space-y-3">--}}

{{--                @foreach($activeCources as $cource)--}}
{{--                    <div class="flex justify-between items-center  dark:border-gray-700 pb-2"--}}
{{--                         onclick=--}}
{{--                             window.location.replace(`http://172.18.253.46:8088/student/cources/`+{{$cource->cource_id}})>--}}
{{--                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">--}}
{{--                            <h1 class="text-lg font-medium">{{ $cource->cource->title }}</h1>--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--            --}}{{--            </div>--}}
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
                <h3 class="text-lg font-medium">Ваши активные курсы</h3>
                <span class="text-sm text-gray-500">Всего: {{ $activeCources->count() }}</span>
            </div>

            <table class="course-table" style="width: 100%; border-collapse: collapse;">
                <tbody>
                @php
                    $chunks = $activeCources->chunk(4);
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
                                                src="{{env('APP_URL')}}storage/{{ $course->cource->files_paths
                                                 }}"
                                                alt="{{ $course->cource->title }}"
                                                class="absolute top-0 left-0 w-full h-full object-cover"
                                            >
                                        </div>
                                    </div>

                                    <!-- Контент -->
                                    <div class="p-2 text-center">
                                        <h2 class="text-xs font-medium text-gray-900 dark:text-white truncate h-1">
                                            {{ $course->cource->title }}
                                        </h2>
                                        <p class="font-medium">Активен с
                                            {{$course->created_at->format('Y-m-d')}},
                                            по {{ substr($course->cource->active_until, 0, 10)}}</p>
                                        <div class="flex items-center justify-center gap-1 mt-1">
                                            <button
                                                onclick="window.open
                                                    (`{{env('APP_URL')}}student/cources/{{$course->id
                                                     }}`, '_blank')
                                                     "
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


{{--<p class="font-medium">Активен с--}}
{{--    {{$cource->created_at->format('Y-m-d')}},--}}
{{--    по {{ substr($cource->cource->active_until, 0, 10)}}</p>--}}
