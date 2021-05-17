@if ($errors->any())
    <audio controls id="errorSound" style="display: none">
        <source src="{{asset('assets/sounds/Error.mp3')}}" type="audio/ogg">
        <source src="{{asset('assets/sounds/Error.mp3')}}" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>
@endif

@push('scripts')
    <script>

        $(function () {
            @if($errors->any())
            var content = {};
            var message = '{{session()->get('message')}}';
            content.message = ''
            content.title = '<h4 style="text-align:center;">خطأ في التحقق من البيانات ، قم بتغيير بعض الحقول وحاول الإرسال مرة أخرى.</h4>';
            // content.icon = 'flaticon-signs';
            content.url = '#'
            content.target = '_blank'

            $.notify(content, {
                type: 'danger',
                allow_dismiss: true,
                newest_on_top: false,
                mouse_over:  true,
                spacing: 10,
                timer: 2000,
                placement: {
                    from: 'top',
                    align: 'center'
                },
                delay: 1000,
                z_index: 10000,
                animate: {
                    enter: 'animate__animated animate__pulse',
                    exit: 'animate__animated animate__bounce'
                }
            });
            $("#errorSound").trigger('play');

            @endif

        });
    </script>
@endpush
