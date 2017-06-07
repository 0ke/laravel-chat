@extends('layouts.app')

@section('content')
    <div id="main-chat-container" class="container">
        <div id="chat-row" style="height: 100%" class="row">

            <chat :chat="chat" ></chat>
        </div>
    </div>
@endsection

@push('script-head')
<script>
    window.Chat = {
        id : '{{ $joinedRoom->id }}',
        title: '{{ trans('room.title', ['room' => $joinedRoom->name]) }}',
        menu: [
            {
                id: 1,
                title: '{{ trans('room.menu.actions.title') }}',
                submenus: [
                    {
                        id: 1,
                        title: '{{ trans('room.menu.actions.submenus.unjoin') }}',
                        action: 'logout'
                    }
                ]
            }
        ]
    }
</script>
@endpush

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

            var res4 = function () {
                var outerHeight = $('#text-field').height();
                $('#text-field-textarea').css('height', (outerHeight - 6) + 'px');
            }
            $( window ).resize(function () {
                res();
                res2();
                res3();
                res4();
            });

            res();
            res2();
            res3();
            res4();
        });
    </script>
@endpush
