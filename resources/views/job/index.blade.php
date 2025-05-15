<x-layout>
    <x-breadcrumbs class="mb-4"
        :links="['Jobs' => route('jobs.index')]"/>

    <x-card class="mb-4 text-sm">
        <form action="{{ route('jobs.index') }}" method="GET">
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <div class="mb-1 font-semibold">Search</div>
                    <x-text-input name="search" value="{{ request('search') }}" placeholder="Search for any text"/>
                </div>
                <div>
                    <div class="mb-1 font-semibold">Salary</div>
                    <div class="flex space-x-2">
                        <x-text-input name="min_salary" value="{{ request('min_salary') }}" placeholder="From"/>
                        <x-text-input name="max_salary" value="{{ request('max_salary') }}" placeholder="To"/>
                    </div>
                </div>
                <div>
                    <div class="mb-1 font-semibold">Experience</div>
                    <label for="experience_" class="mb-1 flex items-center">
                        <input type="radio" id="experience_" name="experience" value=""
                            @checked(!request(''))>
                        <span class="ml-2">All</span>
                    </label>
                    @foreach(\App\Models\Job::$experience as $experience)
                        <label for="experience_{{ $experience }}" class="mb-1 flex items-center">
                            <input type="radio" id="experience_{{ $experience }}" name="experience" value="{{ $experience }}"
                                @checked(request('experience') === $experience)/>
                            <span class="ml-2">{{ Str::ucfirst($experience) }}</span>
                        </label>
                    @endforeach
                </div>
                <div>
                    <div class="mb-1 font-semibold">Category</div>
                </div>
            </div>
            <button class="w-full">Filter</button>
        </form>
    </x-card>

    @foreach ($jobs as $job)
        <x-job-card class="mb-4" :$job>
            <div>
                <x-link-button :href="route('jobs.show', $job)">
                    Show
                </x-link-button>
            </div>
        </x-job-card>
    @endforeach
</x-layout>
