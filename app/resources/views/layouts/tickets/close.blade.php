<script>
    $(document).ready(function () {
        let ticket = $('#ticket-number').html();

        $(document).on('click', '.ticket-close-submit', function() {

            Swal.fire({
                title: 'Уверенно ?',
                text: "Закрываем " + ticket,
                footer: 'После закрытия, Вы не сможете добавить коммент',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes !'
            }).then((result) => {
                if (result['value']) {
                    $.ajax({
                        type: 'POST',
                        url: '/ticket/'+ticket+'/close',
                        data: {
                            '_token': $('input[name=_token]').val(),
                        },
                        success: function(response) {
                            console.log(response);
                            if (typeof response['error'] !== 'undefined')
                                Toast.fire({
                                    icon: 'error',
                                    title: 'Ошибка!',
                                    footer: 'Error: '+response['error']
                                });
                            else location.reload();
                        },
                        error: function(response) {
                            let errors = response.responseJSON;
                            console.log(errors);
                            Toast.fire({
                                icon: 'error',
                                title: 'Изменение НЕ произведено!',
                                footer: 'Ошибка: '+errors['message']
                            });
                        },
                    });
                }
            });
        });
    });
</script>
