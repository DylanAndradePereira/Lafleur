<?php include 'header.php'?>

    <main>
        <div class="mainContainer">
            <div>
                <h1 id="title">
                    Les <span class="green">plantes</span> représentent<br/>
                    la beauté de<br/>
                    la <span class="green">vie</span>.
                </h1> 
            </div>
         

            <div>
                <div class="imgHome hidden-phone">
                    <img src="./images/RectangleVertt.png">
                    <img class="bo" src="./images/aisamco.png">
                </div>
            </div>
            
            <div class="hidden-phone">
                <form>
                    <input type="text" name="recherche" placeholder="Déja une idée ?">
                    <button class="buttonSubmitArrow" type="submit">
                        <img class="arrowButton" src="icons/arrow.png" alt="flèche">
                    </button>
                </form>
            </div>

            <div>
                <a href="#"><button class="hidden-phone" id="buttonBonsail">BONSAIL</button></a>
            </div>

        </div>

    </main>

<?php include 'footer.php'?>
</body>

</html>