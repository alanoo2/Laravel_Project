@props([
    'name', 'label' => false, 'type' => 'text', 'value' => null
])

<div {{ $attributes }} class="mt-5 relative px-10" >
    @if ( $label )
        <label for={{$name}}
        class="mx-2 absolute right-15 top-3">
            {{$label}}
        </label>
    @endif

    @if ( $type === 'textarea')
        <textarea
            name="{{ $name }}"
            class = "w-full h-60 border border-2 border-gray-900 color-black-800 rounded-lg focus:border-pink-600"
            id="{{ $name }}"
            {{ $attributes }}
        > {{ old($name, $value) }} </textarea>
    @else
        <input class="w-full bg-black-900 border-2 border-gray-900 focus:border-pink-600 rounded"
            type={{$type}}
            name={{$name}}
            id={{$name}}
            {{ $attributes }}
            value=" {{ old($name, $value) }} "
        >
    @endif

    @error($name)
        <p class="text-[12px] text-red-900">{{$message}}</p>
    @enderror
</div>
