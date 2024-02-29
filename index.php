<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youtube Clone</title>

    <link rel="stylesheet" href="style.css">

</head>
<body>

    <nav class="navbar">
        <div class="toggle-btn">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <img src="img/logo.PNG" class="logo" alt="">
        <div class="search-box">
            <input type="text" class="search-bar" placeholder="search">
            <form action="search.php" method="POST">
                <button class="search-btn" ><img src="img/search.PNG" alt=""></button>
            </form>
        </div>
        <div class="user-options">
            <img src="img/video.PNG" class="icon" alt="">
            <img src="img/grid.PNG" class="icon" alt="">
            <img src="img/bell.PNG" class="icon" alt="">
            <div class="user-dp">
               <a href="profile.php"> <img src="img/profile-pic.png" alt=""> </a>
            </div>
        </div>
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

    <!-- filters -->
    <div class="filters">
    <?php
        $servidor="localhost";
        $usuario="root";
        $senha="";
        $banco="angotube";
        $conecta = mysqli_connect($servidor,$usuario,$senha,$banco);
        $sql = "SELECT * FROM `categorias`";
        $resultado = mysqli_query($conecta, $sql);
    ?>        
    <form method="GET">
    <button name="categoria" value="" class="filter-options active"> Todos</button>            
    <?php while ($linha = mysqli_fetch_array($resultado)) {?>            
            <button name="categoria" value="<?php echo $linha["idcategoria"]?>" class="filter-options active"> <?php echo $linha["categoria"]?>  </button>            
        <?php } ?>
        </form>
    </div>

    <!-- videos -->
    
        
    <?php
        $servidor="localhost";
        $usuario="root";
        $senha="";
        $banco="angotube";
        $conecta = mysqli_connect($servidor,$usuario,$senha,$banco);
        $sql="";
        $resultado;
        if(isset($_GET["categoria"])){            
            $idcate = $_GET["categoria"];            
            $sql = "SELECT * FROM `videos` WHERE `idCategoria`=$idcate";
            $resultado = mysqli_query($conecta, $sql);
        }else{
            $sql = "SELECT * FROM `videos`";
            $resultado = mysqli_query($conecta, $sql);
        }
        
        
    ?>        
    
    <div class="video-container">
    <?php while ($linha2 = mysqli_fetch_array($resultado)) {?>
        <a href="video.php?v=<?php echo $linha2["local"] ?>">
            <div class="video">
                <img src="<?php echo $linha2["img"]?>" class="thumbnail" alt="">
                <div class="content">
                    <img src="img/profile-pic.png" class="channel-icon" alt="">
                    <div class="info">
                        <h4 class="title"><?php  echo $linha2["titulo"].""?> </h4>
                        <p class="channel-name">modern web</p>
                    </div>
                </div>
            </div>
        </a>
        <?php } ?>
    </div>
    

    <script src="https://apis.google.com/js/api.js"></script>
    <script src="app.js"></script>
    
</body>
</html>