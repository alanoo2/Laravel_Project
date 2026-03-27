@props([
    'name', 'label' => false, 'type' => 'text'
])

<div {{ $attributes }} class="mt-5 relative px-10" >
    @if ( $label )
        <label for={{$name}}
        class="mx-2 absolute right-15 top-3">
            {{$label}}
        </label>
    @endif

    @if ( $type === 'textarea')
        <textarea name="{{ $name }}"
        class = "w-full h-60 border border-2 border-gray-900 color-black-800 rounded-lg focus:border-pink-600"
        id="{{ $name }}"
        {{ $attributes}}></textarea>
    @else
        <input class=" w-full bg-black-900 border-2 border-gray-900 focus:border-pink-600 rounded"
            value="{{old($name)}}"
            type={{$type}}
            name={{$name}}
            id={{$name}}
            {{ $attributes }}>
    @endif

    @error($name)
        <p class="text-[12px] text-red-900">{{$message}}</p>
    @enderror
</div>
