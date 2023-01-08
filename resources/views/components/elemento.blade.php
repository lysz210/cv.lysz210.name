<li>
@if(is_array($value))
    {{ $value['title'] }}
    <x-lista :value="$value['content']"></x-lista>
@else
    {{ $value }}
@endif
</li>
