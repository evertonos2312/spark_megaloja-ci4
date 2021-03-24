function confirma(categoria) {
    var txtPergunta = (categoria == true) ? "Esta ação irá excluir a categoria e todos os produtos e vendas vinculados a ela.\nDeseja continuar?" : "Deseja realmente excluir este registro?"
    if (!confirm(txtPergunta)) {
        return false;
    }

    return true;
}