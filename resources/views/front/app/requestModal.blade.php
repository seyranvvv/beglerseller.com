<div class="modal fade requestModal" id="requestModal" tabindex="-1" aria-labelledby="requestModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="requestModalLabel">@lang('transFront.order')</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="request-form" method="post" name="request-form" action="{{ route('requests.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="comment-form__input-box">
                                <input required type="text" placeholder="@lang('transAdmin.name')" name="name">
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="comment-form__input-box">
                                <input type="email" placeholder="@lang('transFront.email')" name="email">
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="comment-form__input-box">
                                <input required type="text" placeholder="@lang('transFront.phone')" name="phone">
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="comment-form__input-box text-message-box">
                                <textarea required name="body" placeholder="@lang('transFront.write_a_message')"></textarea>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" data-bs-dismiss="modal" class="thm-btn border-0 btn-secondary px-5"
                    style="background-color: gray">
                    @lang('transFront.close')
                </button>
                <button form="request-form" type="submit" class="thm-btn about-one__btn px-5 border-0">@lang('transFront.submit')</button>
            </div>
        </div>
    </div>
</div>
