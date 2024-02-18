<td>

    @if ($obj->getFirstMediaUrl('services'))
        <img src="{{ $obj->getFirstMediaUrl('services') }}" alt="{{ $obj->title }}" class="img-fluid img-max border">
    @else
        <img src="{{ asset('img/placeholder.png') }}" alt="@lang('transAdmin.not-found')" class="img-fluid img-max border">
    @endif


</td>
