@props(['name' => ''])

@error($name)<br /><span {{ $attributes->merge(['class' => 'text-red-400 inline-block mt-1 text-sm']) }}>
    {{ $message }}
</span >@enderror
