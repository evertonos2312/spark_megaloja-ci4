<section class="content-main">

        <div class="content-header">
            <h2 class="content-title">Usuários </h2>
            <div>
                <a href="#" class="btn btn-primary"><i class="material-icons md-plus"></i> Criar novo</a>
            </div>
        </div>

        <div class="card mb-4">
            <header class="card-header">
                <div class="row gx-3">
                    <div class="col-lg-4 col-md-6 me-auto">
                        <input type="text" placeholder="Search..." class="form-control">
                    </div>
                    <div class="col-lg-2 col-6 col-md-3">
                        <select class="form-select">
                            <option>All category</option>
                            <option>Electronics</option>
                            <option>Clothes</option>
                            <option>Automobile</option>
                        </select>
                    </div>
                    <div class="col-lg-2 col-6 col-md-3">
                        <select class="form-select">
                            <option>Status</option>
                            <option>Active</option>
                            <option>Disabled</option>
                            <option>Show all</option>
                        </select>
                    </div>
                </div>
            </header> <!-- card-header end// -->
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox">
                                </div>
                            </th>
                            <th>#ID</th>
                            <th>Product</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th class="text-end"> Action </th>
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
                            <td>{id}</td>
                            <td><b>{name}</b></td>
                            <td>Dresses</td>
                            <td><span class="badge rounded-pill alert-{status}">{active}</span></td>
                            <td>03.12.2020</td>
                            <td class="text-end">
                                <a href="" class="btn btn-light">Detail</a>
                                <div class="dropdown">
                                    <a href="" data-bs-toggle="dropdown" class="btn btn-light"> <i
                                            class="material-icons md-more_horiz"></i> </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="">View detail</a>
                                        <a class="dropdown-item" href="">Edit info</a>
                                        <a class="dropdown-item text-danger" href="">Delete</a>
                                    </div>
                                </div> <!-- dropdown //end -->
                            </td>
                        </tr>
                        {/usuarios}
                    </tbody>
                </table>
                </div> <!-- table-responsive end // -->

                <nav class="float-end mt-3" aria-label="Page navigation">
                  <ul class="pagination">
                    <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                  </ul>
                </nav>

            </div> <!-- card-body end// -->
        </div> <!-- card end// -->


    </section> <!-- content-main end// -->