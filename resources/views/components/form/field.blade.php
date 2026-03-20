@props([
    'name', 'label', 'type'
])

<div class="mt-5 relative px-10" >
    <label for={{$name}} class="mx-2 absolute right-15 top-3">{{$label}}</label>
    <input class="bg-black-900 border-2 border-gray-900 focus:border-pink-600 rounded w-65" value="{{old($name)}}" type={{$type}} name={{$name}} id={{$name}}>

    @error($name)
        <p class="text-[12px] text-red-900">{{$message}}</p>
    @enderror
</div>
