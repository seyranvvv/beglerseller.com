<td>
    <div class="d-flex flex-row">
        <div class="dropdown">
            <button class="btn p-0" type="button" id="dropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">

                <a class="dropdown-item d-flex align-items-center"
                    href="{{ route('admin.products.edit', ['product' => $obj]) }}">
                    <i data-feather="edit" class=" icon-sm mr-2"></i>
                    <span class="">Üýtgetmek</span>
                </a>
                <a href="#" class="dropdown-item d-flex align-items-center" data-target="#d{{ $obj->id }}"
                    data-toggle="modal">
                    <i data-feather="trash" class=" icon-sm mr-2"></i>
                    <span class="">Pozmak</span>
                </a>

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="d{{ $obj->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div>
                        "{{ $obj->title }}" @lang('transAdmin.are-you-sure-want-to-delete')
                        <div class="mt-2 small">
                            <span class="text-danger font-weight-bold">@lang('transAdmin.be-carefully')</span>
                        </div>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-right">
                    <form action="{{ route('admin.products.destroy', $obj) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="button" class="btn btn-sm btn-success" data-dismiss="modal">@lang('transAdmin.cancel')
                        </button>
                        <button type="submit" class="btn btn-dark btn-sm">@lang('transAdmin.delete')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</td>
