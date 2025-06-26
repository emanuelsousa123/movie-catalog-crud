<?php
    session_start();
    
    if (isset($_SESSION['erro'])) {
        $erros = include 'includes/erros.php';
    }

    $erro = $_SESSION['erro'] ?? null;
    unset($_SESSION['erro']);

    if (isset($_SESSION['user_id'])) {
        header("Location: pages/films.php");
        exit;
    }
?>
<div id="dark-background">
        <div class="pop-up" id="signup">
            <img src="assets/images/efeito_de_folha2.svg" class="effect-border" alt="effect-border">
            <div class="white-background">
                <div class="black-border">
                    <div class="header-signup">
                        <div class="logo-box">
                            <a href="index.php"><img src="assets/images/logo2.svg" class="logo-image" alt="logo-image"></a>
                        </div>
                        <div class="title">
                            <h1>SIGN UP</h1>
                        </div>
                        <div class="off-popup" onclick="close_popup('signup')">
                            <button><img src="assets/images/go-out.svg" alt=""></button>
                        </div>
                    </div>
                    <form action="actions/signup_user.php" method="post">
                        <div class="box">
                            <div class="campo">
                                <label class="label_signup" for="username_signup">USERNAME:</label>
                                <input type="text" id="username_signup" name="name_user" class="campo_entrada" autocomplete="off">
                                <?php
                                    if($erro == 1) {
                                        echo '<div class="box_erro"><p class="erro_message">' . $erros[$erro] . '</p></div>';
                                    }
                                ?>
                        
                            </div>
                        </div>

                        <div class="box">
                            <div class="campo">
                                <label class="label_signup" for="email_signup">E-MAIL:</label>
                                <input type="text" id="email_signup" name="email_user" class="campo_entrada" autocomplete="off">
                            </div>
                            <?php
                            if($erro == 2 || $erro == 4 || $erro == 5) {
                                echo '<div class="box_erro"><p class="erro_message">' . $erros[$erro] . '</p></div>';
                            }
                            ?>
                        </div>

                        <div class="box">
                            <div class="campo">
                                <label class="label_signup "for="password_signup">PASSWORD:</label>
                                <input id="password_signup" name="password_user" class="campo_entrada" autocomplete="off" type="password">
                            </div>
                            <?php
                            if($erro == 3) {
                                echo '<div class="box_erro"><p class="erro_message">' . $erros[$erro] . '</p></div>';
                            }
                            ?>
                        </div>
                        
                        <div class="footer">
                            <div class="button">
                                <input class="green_button" type="submit" value="SIGN UP NOW">
                            </div>
                            <div class="direcionar_login">
                                <p>Have an account?  <a onclick="open_close('login','signup')">Log in</a></p>
                            </div>
                        </div>
                        
                    </form>

                    
                </div>
            </div>
        </div>

        <div class="pop-up" id="login">
            <img src="assets/images/efeito_de_folha2.svg" class="effect-border" alt="effect-border">
            <div class="white-background">
                <div class="black-border">
                    <div class="header-signup">
                        <div class="logo-box">
                            <a href="index.php"><img src="assets/images/logo2.svg" class="logo-image" alt="logo-image"></a>
                        </div>
                        <div class="title">
                            <h1>LOG IN</h1>
                        </div>
                        <div class="off-popup" onclick="close_popup('login')">
                            <button><img src="assets/images/go-out.svg" alt=""></button>
                        </div>
                    </div>
                    <form action="actions/login.php" method="post">
                        <div class="box">
                            <div class="campo">
                                <label class="label_signup" for="email_login">E-MAIL:</label>
                                <input type="text" id="email_login" name="email_user" class="campo_entrada" autocomplete="off">
                            </div>
                            <?php
                                if($erro == 7 || $erro == 9) {
                                    echo '<div class="box_erro"><p class="erro_message">' . $erros[$erro] . '</p></div>';
                                }
                            ?>
                        </div>

                        <div class="box">
                            <div class="campo">
                                <label class="label_signup "for="password_login">PASSWORD:</label>
                                <input id="password_login" name="password_user" class="campo_entrada" type="password">
                            </div>
                            <?php
                                if($erro == 6 || $erro == 8) {
                                    echo '<div class="box_erro"><p class="erro_message">' . $erros[$erro] . '</p></div>';
                                }
                            ?>
                        </div>
                        
                        <div class="footer">
                            <div class="button">
                                <input class="green_button" type="submit" value="LOG IN NOW">
                            </div>
                            <div class="direcionar_login">
                                <p>Don't have a account?  <a onclick="open_close('signup','login')">Sign up</a></p>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
