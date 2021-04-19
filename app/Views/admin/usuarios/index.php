<section class="content-main">
    <div class="content-header">
        <h2 class="content-title">{title} </h2>
        <div>
            <a href="{app_url}admin/usuarios/core/" class="btn btn-primary"><i class="material-icons md-plus"></i> Criar novo</a>
        </div>
    </div>
    {if ($msg)}
        <div class="alert {if ($msg_type)}{msg_type}{else}alert-danger{endif} alert-dismissible fade show" role="alert">
            <i class="far fa-lightbulb mr-5"></i>
                <span>&nbsp;</span>
                {msg}
            <button type="button" class="{if ($msg_type)}{msg_type}{else}alert-danger{endif} close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    {endif}
    <div class="card mb-4">
        <header class="card-header">
            <div class="row gx-3">
                <div class="col-lg-4 col-md-6 me-auto">
                    <input type="text" placeholder="Buscar..." class="form-control">
                </div>
                <div class="col-lg-2 col-6 col-md-3">
                    <select class="form-select">
                        <option>Status</option>
                        <option>Ativo</option>
                        <option>Inativo</option>
                        <option>Todos</option>
                    </select>
                </div>
            </div>
        </header> <!-- card-header end// -->
        <div class="card-body">
            <div class="table-responsive">
            {if $usuarios}
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox">
                            </div>
                        </th>
                        <th>Nome</th>
                        <th>Usuário</th>
                        <th>Tipo</th>
                        <th>Status</th>
                        <th>Data de Criação</th>
                        <th class="text-center"> Ações </th>
                    </tr>
                </thead>
                <tbody>
                    {usuarios}
                    <tr>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox">
                            </div>
                        </td>
                        <td><b>{name}</b></td>
                        <td>{username}</td>
                        <td>{type}</td>
                        <td><span class="badge rounded-pill alert-{status}">{active}</span></td>
                        <td>{created_on}</td>
                        <td class="text-center">
                            <a href="" class="btn btn-light"> <i class="fas fa-info"></i> Detalhes</a>
                            <a href="{app_url}admin/usuarios/core/{id}" class="btn btn-light"> <i class="far fa-edit"></i> Editar</a>
                            <input type="hidden" id="{id}">
                            
                            <button id="delete-btn"onclick="userDelete{noparse}({/noparse}'{id}', '{name}'{noparse}){/noparse}" class="btn btn-warning"> <i class="fas fa-trash"></i> Excluir</button>
                        </td>
                    </tr>
                    
                    {/usuarios}
                </tbody>
            </table>
                {else}
                    <h5 class="notfound">Nenhum usuário encontrado</h3>
                {endif}
            </div> <!-- table-responsive end // -->

            <nav class="float-end mt-3" aria-label="Page navigation">
                <ul class="pagination">
                <li class="page-item disabled"><a class="page-link" href="#">Anterior</a></li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Próxima</a></li>
                </ul>
            </nav>

        </div> <!-- card-body end// -->
    </div> <!-- card end// -->
</section> <!-- content-main end// -->
<script src="{app_url}assets/admin/js/user/index.js" type="text/javascript"></script>