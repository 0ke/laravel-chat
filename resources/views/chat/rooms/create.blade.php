@push('body-level')

<div id="create-chat-modal-window" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('rooms.create.title') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="room-name" class="form-control-label">{{ trans('rooms.create.fields.name.label') }}</label>
                        <input type="text" class="form-control" placeholder="{{ trans('rooms.create.fields.name.placeholder') }}" id="room-name" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="room-description" class="form-control-label">{{ trans('rooms.create.fields.description.label') }}</label>
                        <textarea class="form-control" placeholder="{{ trans('rooms.create.fields.description.placeholder') }}" id="room-description" autocomplete="off"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('rooms.create.buttons.close.label') }}</button>
                <button id="chat-room-create-button" type="button" class="btn btn-primary">{{ trans('rooms.create.buttons.confirm.label') }}</button>
            </div>
        </div>
    </div>
</div>

@endpush

@push('script-footer')
<script>
    $(function () {
        $('#chat-room-create-button').on('click', function () {
            var $this = $(this);
            var $roomNameInput = $('#room-name');
            var name = $roomNameInput.val().trim();
            var description = $('#room-description').val().trim();

            if('' === name){
                $roomNameInput.addClass('red-input');
                return;
            }else{
                $roomNameInput.removeClass('red-input');
            }

            if($this.data('clicked')){
                return;
            }

            $this.data('clicked', true);

            $this.html('{{ trans('rooms.create.buttons.sending.label') }}');

            $.post(
                '{!! route('chat.rooms.store') !!}',
                {
                    _token: "{{ csrf_token() }}",
                    name: name,
                    description: description
                }
            ).done(function (data) {
                //data = JSON.parse(data);
                if(data.response){
                    $('#create-chat-modal-window').modal('hide');
                    roomsChatTable.ajax.reload()
                }else{
                    console.log("Event unmanaged because it was not considered.");
                }
            }).always(function () {
                $this.data('clicked', false)
                $this.html('{{ trans('rooms.create.buttons.confirm.label') }}');
            })
        })
    });
</script>
@endpush