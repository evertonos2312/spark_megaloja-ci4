function userDelete(user_id)
{
    let id =  $("input[id=user_id").val();
    console.log(user_id);
    Swal.fire({
        title: 'Alterar Status de Pagamento',
        input: 'select',
        inputOptions: {'processando': 'Processando',
        'aguardando': 'Aguardando Pagamento',
        'cancelado': 'Cancelado',
        'recusado': 'Recusado',
        'pago': 'Pago'},
        inputPlaceholder: 'Status',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Confirmar',
        inputValidator: (status) => {
            return new Promise((resolve) => {
                if(status){
                    $.ajax({
                        url: app_url+'admin/usuarios/delete',
                        method: 'post',
                        dataType: 'json',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest',
                        },
                        data: JSON.stringify({
                            id: user_id, 
                            status: status,
                        }),
                        success: function(d){
                            Swal.close();
                            if(d.status == 'success' && !!d.detail.id){
                                Swal.fire({
                                    title: 'Sucesso!',
                                    text: 'Status alterado com suceso!',
                                    icon: 'success'
                                });
                            }
                        },
                        error: function(d){
                            Swal.close();
                            Swal.fire({
                                title: 'Ops! Aconteceu algo de errado',
                                text: 'Não foi possível alterar o status do pagamento.',
                                icon: 'error',
                            });
                        }
                    });
                    resolve();
                } else{
                    resolve('Selecione uma opção');
                }
            })
        }
    })
}