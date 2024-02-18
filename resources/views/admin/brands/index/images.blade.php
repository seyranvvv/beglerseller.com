<td>

    @if ($obj->getFirstMediaUrl('brands'))
        <img src="{{ $obj->getFirstMediaUrl('brands') }}" alt="{{ $obj->name }}" class="img-fluid img-max border">
    @else
        <img src="{{ asset('img/placeholder.png') }}" alt="@lang('transAdmin.not-found')" class="img-fluid img-max border">
    @endif


</td>
