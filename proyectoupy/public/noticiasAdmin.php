<?php
  session_start();
    if (!isset($_SESSION["admin"])) header("Location:login_admin.php");
    require "./../src/BBDD.php";
    require "./../src/Noticia.php";
      $u = new Noticia();
        $u->conexion();
        $listaNoticias=$u->Noticias();



 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="./css/stilesadmin.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <!-- noticiasAdmin - Borja Hervás -->
  </head>
  <body>
    <?php include "./assets/navegadoradmin.php"; ?>
    <section id="listado_noticias">
      <form class="" action="insertarNoticia.php" method="post">
          <label for="titulo"><strong>Titulo: </strong></label><br>
          <input type="text" name="titulo" id="Nombre" required><br></br>
          <label for="descripcion"><strong>Descripción: </strong></label><br>
          <input type="text" name="descripcion" id="descripcion" required><br></br>
          <label for="imagen"><strong>Imagen: </strong></label><br>
          <input type="file" name="imagen" value placeholder=" imagen" id="imagen" required><br></br>
          <label for="url"><strong>URL: </strong><br></label>
          <input type="text" name="url" required><br></br>
          <input type="submit" name="" value="Aceptar">
      </form>
      <table whidt='2000px' border='1'>
        <tr>
          <th>Titulo</th>
          <th>Descripción</th>
          <th>Fecha de Publicación</th>
          <th>Imagen</th>
          <th>URL</th>
        </tr>
        <form class="" action="noticiasAdmin.php" method="post">
        <?php
        foreach ($listaNoticias as $noticia) {
            echo "<tr>";
            echo "<td>"."<input type='text' value='$noticia[titulo]' readonly class='activar' onclick='enable_disable()'>"."</td>";
            echo "<td>".$noticia['descripcion']."</td>";
            echo "<td>".$noticia['fecha_publicacion']."</td>";
            echo "<td>".$noticia['imagen']."</td>";
            echo "<td>".$noticia['url']."</td>";
            echo "</div>";
        }
      echo "<input type='submit' value='Actualizar' hidden class='activar' id=desact onclick='disable()'>";?>
                </form>
     </table>

    </section>
<script type="text/javascript" src="./js/activarInput.js">

</script>
  </body>
      <?php include "./assets/piedepagina.php"; ?>
</html>
