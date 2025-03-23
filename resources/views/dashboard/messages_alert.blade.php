@if (session()->has('add'))
    <script>
        window.onload = function () {
            notif({
                msg: "{{trans('dashboard/message.add')}}",
                type: 'success'
            });
        }
    </script>

@endif

@if (session()->has('update'))
    <script>
        window.onload = function () {
            notif({
                msg: "{{trans('dashboard/message.update')}}",
                type: 'success'
            });
        }
    </script>
@endif


@if (session()->has('delete'))
    <script>
        window.onload = function () {
            notif({
                msg: "{{trans('dashboard/message.delete')}}",
                type: 'success'
            });
        }
    </script>
@endif

@if (session()->has('error'))
    <script>
        window.onload = function () {
            notif({
                msg: "{{trans('dashboard/message.error')}}",
                type: 'error'
            });
        }
    </script>
@endif