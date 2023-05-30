<style>
.whiteBox{
    font-size:2em;
    width:30%;
}
</style>

<?php
    $email = $_SESSION['email'];
    $nom = $_SESSION['nom'];
    $prenom = $_SESSION['prenom'];
    $adresse = $_SESSION['adresse'];
    $ville = $_SESSION['ville'];
    $cp = $_SESSION['codePostale'];
?>

        <div id="containerProfilProfil">
            <div class="row">
                <div class="whiteBox">
                    <?php echo "Email : ".$email; ?>
                </div>
            </div>

            <div class="row">
                <div class="whiteBox">
                    <?php echo "Nom : ".$nom; ?>
                </div>
            </div>

            <div class="row">
                <div class="whiteBox">
                    <?php echo "Prenom : ".$prenom; ?>
                </div>
            </div>

            <div class="row">
                <div class="whiteBox">
                    <?php echo "Adresse : ".$adresse; ?>                
                </div>
            </div>

            <div class="row">
                <div class="whiteBox">
                    <?php echo "Ville : ".$ville; ?>                
                </div>
            </div>

            <div class="row">
                <div class="whiteBox">
                    <?php echo "Code Postal : ".$cp; ?>
                </div>
            </div>
        </div>