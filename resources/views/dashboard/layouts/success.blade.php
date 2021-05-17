<audio controls id="successSound" style="display: none">
    <source src="{{asset('assets/sounds/Success.mp3')}}" type="audio/ogg">
    <source src="{{asset('assets/sounds/Success.mp3')}}" type="audio/mpeg">
    Your browser does not support the audio element.
</audio>

@push('scripts')
    <script>

        $(function () {
            @if(session()->has('message'))
            var content = {};
            var message = '{{session()->get('message')}}';
            content.message = ''
            content.title = '<h4 style="text-align:left;">' + message + '</h4>';
            // content.icon = 'flaticon-signs';
            content.url = '#'
            content.target = '_blank'

                $.notify(content, {
                    type: 'success',
                    allow_dismiss: true,
                    newest_on_top: false,
                    mouse_over:  true,
                    spacing: 10,
                    timer: 3000,
                    placement: {
                        from: 'bottom',
                        align: 'left'
                    },
                    delay: 1000,
                    z_index: 10000,
                    animate: {
                        enter: 'animate__animated animate__pulse',
                        exit: 'animate__animated animate__bounce'
                    }
                });

            $("#successSound").trigger('play');
            @endif

        });
    </script>
@endpush
