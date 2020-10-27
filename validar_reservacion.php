<?php 
  include_once 'includes/functions/functions.php';  
  if(isset($_POST['submit'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $regalo = $_POST['regalo'];
    $total = $_POST['total_pedido'];
    $fecha = date('Y-m-d H:i:s');  
    // pedidos
    $boletos = $_POST['boletos'];
    $camisas = $_POST['pedido_camisas'];
    $etiquetas = $_POST['pedido_etiquetas'];
    $product_json = product_json($boletos, $camisas, $etiquetas);    
    // eventos
    $workshops = $_POST['registro'];
    $workshops_json = event_json($workshops);                  
    try {
      // open connection
      require_once('includes/functions/db_connection.php');
      // prepare statement
      $stmt = $con->prepare("INSERT INTO registered (id_gif, name_registered, lastname_registered, email_registered, date_registered, passes_articles, workshops_registered, total_paid) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
      $stmt->bind_param("isssssss", $regalo, $nombre, $apellido, $email, $fecha, $product_json, $workshops_json, $total);
      $stmt->execute();
      $stmt->close();
      $con->close();
      header('Location: validar_reservacion.php?exitoso=1');
    } catch (\Exception $e){ 
      echo $e->getMessage();
    };    
    // echo '<pre>';
    //   print_r($product_json);
    //   echo '<hr>';
    //   print_r($workshops_json);
    // echo '</pre>';
  }; 
?>

<!DOCTYPE html>
<html class="no-js" lang="">

  <?php
    require_once 'includes/templates/meta.php';
    include_once 'includes/templates/header.php';    
  ?>
  <body>  
    <section class="seccion contenedor">
      <h2>Resumen Registro</h2>                

      <?php
        if(isset($_GET['exitoso'])) {
          if ($_GET['exitoso'] == '1') {
            echo 'Registro exitoso';
          };
        };
      ?>
    </section>

    <?php
      include_once 'includes/templates/footer.php';
      include_once 'includes/templates/scripts.php';
    ?>
  </body>
</html>