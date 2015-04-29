<?php $ArrInfoPage = [ "page-title" => "Error 404", "menu-class" => "" ]; ?>
<?php require "../template/admin_header.php"; ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="error-template">
                <h1>
                    Oops... algo anduvo mal!</h1>
                <h2>
                    404 Not Found</h2>
                <div class="error-details">
                    Parece que ha habido un error con la página que estabas buscando.
                    <br />
                    Es posible que la entrada haya sido eliminada o que la dirección no exista.
                </div>
                <div class="error-actions">
                    <a href="../inc/admin_home.php" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>
                       Inicio </a>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require "../template/admin_footer.php"; ?>