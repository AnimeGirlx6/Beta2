<?php
    include_once 'header.php';
?>
            <section class ='index-intro'>
                <h2> Log In</h2>
                <form action="includes/login.inc.php" method="post">
                    <input type="text" name='name' placeholder='Username/Email'> 
                    <br>
                    <br>
                    <input type="password" name='pwd' placeholder='Password'> 
                    <br>
                    <br>
                    <button type='submit' name='submit'> Log In</button>
                </form>
            </section>  
            


        
      <?php
        include_once 'footer.php';
      ?>