function marcasDelete(marca_id, marca_nome)
{
    let id_marca = marca_id;
    let name = marca_nome;
    Swal.fire({
        title: 'Deletar - ' + name + '?',
        text: "Essa ação não pode ser revertida!",
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Confirmar',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: baseUrl+'/marcas/delete',
                method: 'post',
                data: {
                    'mrc_id' : id_marca
                },
                success: function(response){
                    Swal.close();
                    if(response.status == 'success' && !!response.detail.id){
                        Swal.fire({
                            title: 'Sucesso!',
                            text: 'Marca excluida com suceso!',
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
                        text: 'Não foi possível excluir esta marca.',
                        icon: 'error',
                    });
                }
            });
        }
      })
}


