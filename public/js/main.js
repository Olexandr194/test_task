$(function () {
    $('#form').on('submit', function (event) {
        event.preventDefault();
        $('#warning').attr('hidden', true);

        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: new FormData(this),
            processData: false,
            dataType:'json',
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend:() => {
                $(document).find('span.error-text').text('');
            },
            success: (data) => {
                if (data.status === 0)
                {
                    $.each(data.error, function (prefix, value){
                        $('span.'+prefix+'_error').text(value[0]);
                    })
                } else if (data.status === 1)
                {
                    $('#form').attr('hidden', true);
                    $('#success-register').removeAttr('hidden');
                } else if (data.status === 2) {
                    $('#warning').removeAttr('hidden');
                }
            },
            error: (data) => {
                console.log(data)
            }
        });
    });

    $(document).on('change', ':input', function (event) {
        event.preventDefault();
        $(this).attr('style', 'border: solid #1DC116 thin');
        $(this).closest('.form-group').find('.control-label').addClass('text-success');
    });

});
