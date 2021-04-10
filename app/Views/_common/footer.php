</section>
<div class="clear"></div>
        <div class="footer">

            <div class="logotipo_footer">
                <img src="{app_url}assets/imagens/logo.png">
            </div>
            <div class="texto_footer">
                <nav>
                    <ul class="menu-footer">
                        <li> <a href="{app_url}">Home</a></li>
                        <li> <a href="{app_url}promocao"</li>
                        <li> <a href="{app_url}produto"</li>
                        {if !$isLoggedIn}
                                <li> <a href="{app_url}/cadastro">Cadastra-se</a></li>
                        {endif}
                        <li><a href="{app_url}/contato">Contato</a></li>
                        {if $admin}
                            <li> <a href="{app_url}/admin">Administração</a></li>
                        {endif}
                    </ul>
                </nav>
            </div>
            <div class="clear"></div>

        </div>
    </div>

</body>
</html>