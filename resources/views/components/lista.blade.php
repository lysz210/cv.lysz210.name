<ul>
    @foreach($value as $elt)
    <x-elemento :value="$elt"></x-elemento>
    @endforeach
</ul>