<?php $testPage="Profil" ?>

<?php include 'header.php'?>
<br/>
    <main>
        <?php
            if(isset($_SESSION['email'])){
                include 'userPage.php';
            } else {
                if (isset($_REQUEST['act']) && ($_REQUEST['act']=='sign')){
                    include 'profil_Inscription.html';
                } else {
                    include 'loginForm.html';
                }
            }
        ?>
    </main>
<?php include 'footer.php'?>
</body>
</html>