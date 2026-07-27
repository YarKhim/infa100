<x-filament-widgets::widget>
    <x-filament::section>
        <div>
            {{--            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">--}}
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-medium">Активные курсы</h3>
                <span class="text-sm text-gray-500">Всего: {{ $activeCources->count() }}</span>
            </div>

            <div class="space-y-3">

                @foreach($activeCources as $cource)
                    <div class="flex justify-between items-center  dark:border-gray-700 pb-2"
                         onclick=
                             window.location.replace(`http://172.18.253.46:8088/student/cources/`+{{$cource->cource_id}})>
                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                            <h1 class="text-lg font-medium">{{ $cource->cource->title }}</h1>
                            <p class="font-medium">Активен с
                                {{$cource->created_at->format('Y-m-d')}},
                                по {{ substr($cource->cource->active_until, 0, 10)}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            {{--            </div>--}}
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
