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
                { data: 'join', name: 'join', orderable: false, searchable: false, width: '100px', className: "datatable-cell-center" }
            ]
        });
    });
</script>
@endpush
