<td>

    @if ($obj->getFirstMediaUrl('banners'))
        <img src="{{ $obj->getFirstMediaUrl('banners') }}" alt="{{ $obj->name }}" class="img-fluid img-max border">
    @else
        <img src="{{ asset('img/placeholder.png') }}" alt="@lang('transAdmin.not-found')" class="img-fluid img-max border">
    @endif


</td>
