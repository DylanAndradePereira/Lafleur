<?php include 'header.php'?>
<br/>
    <main>
        <?php
            if(isset($_SESSION['email'])){
                include 'userPage.php';
            } else {
                include 'loginForm.html';
            }
        ?>
    </main>
<?php include 'footer.php'?>
</body>
</html>