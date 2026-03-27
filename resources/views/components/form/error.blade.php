 @props([
    'name'
 ])

 @error( $name )
    <p class="color-red-800"> {{ $message }} </p>
@enderror
