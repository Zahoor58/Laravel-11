<x-layout>
    <x-slot:heading>
     Job Listing
    </x-slot:heading>
    <ul>
        <div class="space-y-4">
            @foreach($jobs as $job)
                <li>
                    <a href="/jobs/{{ $job['id'] }}" class="block px-4 py-6 border border-gray- rounded-lg">
                        <div class="font-bold text-blue-500">{{ $job->employer->name }}</div>
                        <div>
                           <strong>{{$job['title']}}</strong> : Pyas {{$job['salary']}} per year
                        </div>
                    </a>
                </li>
            @endforeach
        </div>
  </ul>
</x-layout>