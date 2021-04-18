function userDelete(user_id, user_name)
{
    let id_user = user_id;
    let name = user_name;
    console.log(name);
    Swal.fire({
        title: 'Deletar - ' + name + '?',
        text: "Essa ação não pode ser revertida!",
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Confirmar',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: baseUrl+'/usuarios/delete',
                method: 'post',
                data: {
                    'usr_id' : id_user
                },
                success: function(response){
                    Swal.close();
                    if(response.status == 'success' && !!response.detail.id){
                        Swal.fire({
                            title: 'Sucesso!',
                            text: 'Usuário excluido com suceso!',
                            icon: 'success'
                        }).then(function(){
                            location.reload();
                        });
                        
                    }
                },
                error: function(response){
                    Swal.close();
                    Swal.fire({
                        title: 'Ops! Aconteceu algo de errado',
                        text: 'Não foi possível excluir este usuário.',
                        icon: 'error',
                    });
                }
            });
        }
      })
}


