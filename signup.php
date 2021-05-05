<?php
    include_once 'header.php';
?>
            <section class="index-intro">
                <h2> Sign Up</h2>
                <form action="includes/signup.inc.php" method="POST">
                    <input type="text" name='name' placeholder='Full Name'> 
                    <br>
                    <input type="text" name='email' placeholder='Email'>
                    <br>
                    <input type="text" name='uid' placeholder='User Name'> 
                    <br>
                    <input type="password" name='pwd' placeholder='Password'> 
                    <br>
                    <input type="password" name='pwdrepeat' placeholder='Repeat password'>
                    <br>
                    <button type='submit' name='submit'> Sign Up</button>
                </form>
            </section> 


        
      <?php
        include_once 'footer.php';
      ?>