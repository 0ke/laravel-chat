@extends('layouts.app')

@section('content')
    <div id="main-chat-container" class="container">
        <div id="chat-row" style="height: 100%" class="row">
            <nav id="chat-menu-bar" class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ trans('room.menu.actions.title') }}<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#" data-toggle="modal" data-target="#unjoin-chat-modal-window">
                                            {{ trans('room.menu.actions.submenus.unjoin') }}
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
            <div id="chat-box" class="col-md-12 col-xs-12 col-sm-12 col-lg-12">
                <div id="sub-chat-box" style="height: 100%;margin-bottom: 0;" class="panel panel-default">
                    <div id="chat-panel-heading" class="panel-heading">{{ trans('room.title', ['room' => $joinedRoom->name]) }}</div>
                    <div id="chat-panel-body" style="padding: 0;" class="panel-body">
                        <div class="chat-box message-box col-xs-12 col-sm-12 col-md-9 col-lg-9">
                            Message-box
                        </div>
                        <div class="chat-box users-box col-xs-12 col-sm-12 col-md-3 col-lg-3">
                            Users-box
                        </div>
                        <div class="chat-box text-field col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            Text-field
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script-footer')
    <script>
        $(function () {
            var res = function () {
                var htmlHeight = $('html').height();
                var menuHeight = $('#main-navbar').outerHeight(true);
                var resultingHeight = htmlHeight - menuHeight;
                $('#main-chat-container').css('height', resultingHeight + 'px').css('padding', 0).css('margin-top', 0).css('margin-bottom', 0);
            }

            var res2 = function () {
                var rowHeight = $('#chat-row').height();
                var menuHeight = $('#chat-menu-bar').outerHeight(true);
                var resultingHeight = rowHeight - menuHeight;
                $('#chat-box').css('height', resultingHeight + 'px').css('padding', 0).css('margin-top', 0).css('margin-bottom', 0);
            }

            var res3 = function () {
                var rowHeight = $('#sub-chat-box').height();
                var menuHeight = $('#chat-panel-heading').outerHeight(true);
                var resultingHeight = rowHeight - menuHeight;
                $('#chat-panel-body').css('height', resultingHeight + 'px').css('padding', 0).css('margin-top', 0).css('margin-bottom', 0);
            }
            $( window ).resize(function () {
                res();
                res2();
                res3();
            });

            res();
            res2();
            res3();
        });
    </script>
@endpush
