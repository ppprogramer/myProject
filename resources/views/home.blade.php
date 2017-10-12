@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in!
                    </div>
                    <div id="output">asdfad</div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    window.onload = function () {
        var output = document.getElementById("output");
        var wsUri = "ws://127.0.0.1:2345";
        var userId = "<?php echo \Illuminate\Support\Facades\Auth::user()->id?>";
        alert(userId);
        function testWebSocket() {
            websocket = new WebSocket(wsUri);
            websocket.onopen = function (evt) {
                onOpen(evt)
            };
            websocket.onclose = function (evt) {
                onClose(evt)
            };
            websocket.onmessage = function (evt) {
                onMessage(evt)
            };
            websocket.onerror = function (evt) {
                onError(evt)
            };
        }

        function onOpen(evt) {
            writeToScreen("CONNECTED");
            doSend("WebSocket rocks");
        }

        function onClose(evt) {
            writeToScreen("closed");
        }

        function onMessage(evt) {
            writeToScreen('<span style="color: blue;">RESPONSE: ' + evt.data + '</span>');
//            websocket.close();
        }

        function onError(evt) {
            writeToScreen('<span style="color: red;">ERROR:</span> ' + evt.data);
        }

        function doSend(message) {
            writeToScreen("SENT: " + message);
            websocket.send(message);
        }

        function writeToScreen(message) {
            var pre = document.createElement("p");
            pre.style.wordWrap = "break-word";
            pre.innerHTML = message;
            output.appendChild(pre);
        }

        testWebSocket();
    }
</script>
