@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                 <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ trans('rooms.list.menu.actions.title') }}<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#" data-toggle="modal" data-target="#create-chat-modal-window">
                                        {{ trans('rooms.list.menu.actions.submenus.create.title') }}
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div class="col-md-12 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('rooms.list.title') }}</div>
                <div class="panel-body">
                    <table class="table table-bordered" id="rooms-table">
                        <thead>
                        <tr>
                            <th>{{ trans('rooms.list.table.head.id') }}</th>
                            <th>{{ trans('rooms.list.table.head.name') }}</th>
                            <th>{{ trans('rooms.list.table.head.description') }}</th>
                            <th>{{ trans('rooms.list.table.head.created_at') }}</th>
                            <th>{{ trans('rooms.list.table.head.join') }}</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<form id ="unjoin-chat-submit-form" method="post" action="">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
@endsection

@include('chat.rooms.create')

@push('script-footer')
<script>
    var roomsChatTable = null;
    $(function() {
        roomsChatTable = $('#rooms-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('chat.rooms.index_ajax') !!}',
            order: [[ 3, "desc" ]],
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'description', name: 'description' },
                { data: 'created_at', name: 'created_at' },
                { data: 'join', name: 'join', orderable: false, searchable: false, width: '180px', className: "datatable-cell-center" }
            ],
            fnDrawCallback: function () {
                $('.unjoin-chat-action-button').off();
                $('.unjoin-chat-action-button').on('click', function () {
                    var $this = $(this);
                    var url = $this.attr('href');
                    var owner = $this.attr('owner') === 'yes';

                    var $form = $('#unjoin-chat-submit-form');

                    $form.attr('action', url);

                    if(owner){
                        BootstrapDialog.show({
                            title: '<h2>{{ trans('rooms.dialogs.unjoin.owner.title') }}</h2>',
                            message: '{{ trans('rooms.dialogs.unjoin.owner.message') }}',
                            buttons: [{
                                label: '{{ trans('rooms.dialogs.unjoin.owner.buttons.cancel.label') }}',
                                cssClass: 'btn-success',
                                action: function(dialog) {
                                    dialog.close();
                                }
                            }, {
                                label: '{{ trans('rooms.dialogs.unjoin.owner.buttons.confirm.label') }}',
                                cssClass: 'btn-danger',
                                action: function(dialog) {
                                    $form.submit();
                                }
                            }]
                        });
                    }else{
                        $form.submit();
                    }
                })
            }
        });
    });
</script>
<script>
    $(function () {
        if(window.Echo){
            window.Echo.private('rooms-list')
                .listen('NewRoomAdded', (e) => {
                    roomsChatTable.ajax.reload();
                });
        }
    });
</script>
<script>
    $(function () {

    });
</script>
@endpush
