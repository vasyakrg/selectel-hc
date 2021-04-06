<!-- /cluster-edit-modal -->
<div class="modal fade" id="ticket-reopen-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Переотерытие запроса</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" role="modal">
                <div class="modal-body">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="ReopenNewComment">Дополнить запрос</label>
                            <textarea id="ReopenNewComment" class="form-control" rows="4"></textarea>
                        </div>
                        <p>
                            <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> File..</a>
                        </p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="submit" class="btn btn-success reopen-ticket-submit" data-dismiss="modal">Открыть снова</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Я передумал</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /cluster-edit-modal end -->

<script>

    $(document).on('click', '.ticket-reopen-modal-show', function() {
        $('#ticket-reopen-modal').modal('show');
    });

    $(document).on('click', '.reopen-ticket-submit', function() {
        let ticket = $('#ticket-number').html();
        let comment =$('#ReopenNewComment').val();

        console.log('ticket:'+ticket+', comment:'+comment);

        if (comment.length < 5)
            Toast.fire({
                icon: 'error',
                title: 'Так не пойдет!',
                footer: 'Ошибка: очень короткий коммент'
            });
        else
            $.ajax({
                type: 'POST',
                url: '/ticket/'+ticket+'/reopen',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'comment': comment
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
    });
</script>
