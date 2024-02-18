<td>

    @if ($obj->getFirstMediaUrl('posts'))
        <img src="{{ $obj->getFirstMediaUrl('posts') }}" alt="{{ $obj->title }}" class="img-fluid img-max border">
    @else
        <img src="{{ asset('img/placeholder.png') }}" alt="@lang('transAdmin.not-found')" class="img-fluid img-max border">
    @endif


</td>
