<x-layout>

    <div class="py-8 max-w-4x1 mx-auto">
        <div class="flex justify-between">
            <a href="/" class="flex items-center gap-x-1 text-sm font-medium rounded-[10px] px-3 py-1 hover:bg-gray-200/8">
                <x-icons.back class="w-[18px]"/>
                Back Home
            </a>

            <div class="space-x-3 flex">
                <button class="py-1 px-3 rounded-[10px] flex gap-x-1 items-center hover:bg-gray-200/8">
                    <x-icons.edit-icon class="w-[20px]" />
                    Edit Idea
                </button>
                <form method="POST" action="{{ route('idea.destroy', $idea) }}">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-800 py-1 px-3 rounded-[10px] hover:bg-red-900 hover:text-gray-200">
                        Delete
                    </button>
                </form>
            </div>
        </div>

        <h1 class="font-semibold text-[32px] mt-2">{{ $idea->title}}</h1>
            <div class="mt-2 flex gap-x-3 items-center mx-6">
                <x-status status="{{$idea->status}}">
                    {{ $idea->status }}
                </x-status>
                <div class="text-muted-foreground text-sm">{{ $idea->created_at->diffForHumans() }} </div>
            </div>
            <x-card class="mt-4 mx-6">
                @if($idea->description == null)
                    <span class="text-muted-foreground">No desciption yet... </span>
                @endif
                    <span class="text-foreground max-w-none cursor-pointer"> {{$idea->description}} </span>
            </x-card>
    </div>

    <div>
        <h3 class="font-bold text-xl mt-6">Links</h3>


        <div class="mx-5 mt-3 font-medium flex gap-x-2 items-center space-y-2">
            @foreach ($idea->links as $link)
                <x-card href=" {{$link}} " class="flex gap-x-2 text-green-800 "> <x-icons.external class="w-[20px]"/> {{$link}} </x-card>

            @endforeach
        </div>
    </div>

</x-layout>
