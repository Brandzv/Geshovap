<!DOCTYPE html>
<html lang="es">
    <head>
        <?php include("/components/header.php")?>
        <title>Login | La Parroquia de Veracruz</title>
    </head>

    <body>
        <section>
            <form class="login" action="control.php" method="POST">
                <header class="login__item">
                    <div class="header__item logo--item">
                        <img class="item__img" src="./img/laparroquia-logo.webp" alt="Logo de La Parroquia de Veracruz" />
                    </div>

                    <div class="header__item login--text">
                        <h2 class="item___header">Login</h2>
                    </div>
                </header>

                <div class="login__item">
                    <span class=""></span>
                    <input class="form--input" type="text" placeholder="Usuario" name="usuario" autocomplete="off" required autofocus />
                </div>

                <div class="login__item">
                    <span class=""></span>
                    <input class="form--input" type="password" placeholder="Contraseña" name="clave" autocomplete="off" required />
                </div>

                <div class="login__item">
                    <button class="button--login">Entrar</button>
                </div>
            </form>
        </section>
    </body>
</html>
