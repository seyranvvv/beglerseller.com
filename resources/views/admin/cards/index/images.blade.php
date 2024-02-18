<td>

    @if ($obj->getFirstMediaUrl('icon'))
        <img src="{{ $obj->getFirstMediaUrl('icon') }}" alt="{{ $obj->name }}" class="img-fluid img-max border">
    @else
        <img src="{{ asset('img/placeholder.png') }}" alt="@lang('transAdmin.not-found')" class="img-fluid img-max border">
    @endif


</td>
