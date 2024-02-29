<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youtube Clone</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="profile.css">

</head>

<body>

    <nav class="navbar">

    </nav>

    <!-- sidebar -->
    <div class="side-bar">
        <a href="http://localhost/angoTube/" class="links active"><img src="img/home.PNG" alt="">home</a>
        <a href="#" class="links"><img src="img/explore.PNG" alt="">Musicas</a>
        <a href="#" class="links"><img src="img/subscription.PNG" alt="">Videos</a>
        <hr class="seperator">
        <a href="#" class="links"><img src="img/library.PNG" alt="">Meu canal</a>
        <a href="#" class="links"><img src="img/history.PNG" alt="">history</a>
        <a href="#" class="links"><img src="img/your-video.PNG" alt="">Biblioteca</a>
    </div>


    <?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "angotube";
    $conecta = mysqli_connect($servidor, $usuario, $senha, $banco);
    $sql = " SELECT * FROM user WHERE ID = 1";

    $resultado = mysqli_query($conecta, $sql);

    $resultado = mysqli_fetch_assoc($resultado);

    $resultado['Foto_Capa'] == "capa.jpg"
        ? $capa = "./img/CapaDefault/" . $resultado['Foto_Capa']
        : $capa = "./Users/" . $resultado['ID'] . "/" . $resultado['Foto_Capa'];

    $img = "./Users/" . $resultado['ID'] . "/" . $resultado['img'];
    ?>

    <div class="perfil">
        <div class="fotoCapa">
            <img src=<?php echo $capa;  ?>>
        </div>
        <div class="fotoPerfil">
            <img src=<?php echo $img;  ?>>
        </div>
        <div class="detalhesUser">
            <h2><?php echo $resultado['Nome'];  ?></h2>
            <h5>Software Developer</h5>
            <h5>Editora Sapce X Continuous</h5>
        </div>
        <br> <br>
        <div class="meusVideos">
            <h2>Meus Videos</h2>

            <div class="video-container">

                <?php
                $query = "SELECT * FROM videos WHERE iduser = 1";
                $result = mysqli_query($conecta, $query);

                while ($linha = mysqli_fetch_assoc($result)) {

                    $fotoPerfil = "./Users/" . $resultado['ID'] . "/" . $resultado['img'];


                ?>
                    <a href="video.php?v=<?php echo $linha["local"] ?>">
                        <div class="video">
                            <img src="<?php echo $linha["img"] ?>" class="thumbnail">
                            <div class="content">
                                <img src=<?php echo $fotoPerfil; ?> class="channel-icon">
                                <div class="info">
                                    <h4 class="title"><?php echo $linha["titulo"] . "" ?> </h4>
                                    <p class="channel-name">modern web</p>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php } ?>

            </div>
        </div>


        <div class="meusVideos">
            <h2>Biblioteca</h2>

            <div class="video-container">

                <?php
                $query1 = "SELECT * FROM biblioteca WHERE Id_Usuario = 1";
                $result1 = mysqli_query($conecta, $query1);

                while ( $linha = mysqli_fetch_assoc($result1)) {

               

                $buscaDownloads = "SELECT * FROM videos WHERE idvideo = ".$linha["Id_Video"];
                $videos = mysqli_query($conecta, $buscaDownloads);
                
                while ($video = mysqli_fetch_assoc($videos)) 
                {?>
                    <a href="video.php?v=<?php echo $video["local"] ?>">
                        <div class="video">
                            <img src="<?php echo $video["img"] ?>" class="thumbnail">
                            <div class="content">
                                <img src="img/profile-pic.png" class="channel-icon">
                                <div class="info">
                                    <h4 class="title"><?php echo $video["titulo"] . "" ?> </h4>
                                    <p class="channel-name">modern web</p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <?php 
                }
            } ?>

            </div>
        </div>

    </div>


    <script src="https://apis.google.com/js/api.js"></script>
    <script src="app.js"></script>

</body>

</html>