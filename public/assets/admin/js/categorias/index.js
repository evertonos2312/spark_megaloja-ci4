function categoriasDelete(categoria_id, categoria_nome)
{
    let id_categoria = categoria_id;
    let name = categoria_nome;
    Swal.fire({
        title: 'Deletar - ' + name + '?',
        text: "Essa ação não pode ser revertida!",
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Confirmar',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: baseUrl+'/categorias/delete',
                method: 'post',
                data: {
                    'ctg_id' : id_categoria
                },
                success: function(response){
                    Swal.close();
                    if(response.status == 'success' && !!response.detail.id){
                        Swal.fire({
                            title: 'Sucesso!',
                            text: 'Categoria excluida com suceso!',
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
                        text: 'Não foi possível excluir esta categoria.',
                        icon: 'error',
                    });
                }
            });
        }
      })
}


