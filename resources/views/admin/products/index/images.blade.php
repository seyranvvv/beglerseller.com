<td>

    @if ($obj->getFirstMediaUrl('products'))
        <img src="{{ $obj->getFirstMediaUrl('products') }}" alt="{{ $obj->title }}" class="img-fluid img-max border">
    @else
        <img src="{{ asset('img/placeholder.png') }}" alt="@lang('transAdmin.not-found')" class="img-fluid img-max border">
    @endif


</td>
