<?php require('includes/functions/db_connection.php'); ?>

<?php
  try {
    $sql = "SELECT * FROM quests";
    
    $result = $con->query($sql);
    
  } catch (\Exception $e){ 
    echo $e->getMessage();
  };
  // $con->close();
?>

<section class="invitados contenedor seccion">
  <h2>Nuestros invitados</h2>

  <!-- <ul class="lista-invitados clearfix"> -->
  <ul class="lista-invitados">
    <?php
      while($quest = $result->fetch_assoc()) {
      ?>
        <li>
          <div class="invitado">
            <a class="invitado-info" href="#invitado<?php echo $quest['id_quest'];?>" >
              <img src="img/<?php echo $quest['url_imagen'] ?>" alt=<?php echo $quest['url_imagen'] ?> >
              <p><?php echo $quest['name_quest'] . ' ' . $quest['lastname_quest']; ?></p>
            </a>
          </div>
        </li>
        
        <div style="display: none">
          <div class="invitado-info" id="invitado<?php echo $quest['id_quest'];?>" >
            <h2><?php echo $quest['name_quest'] . ' ' . $quest['lastname_quest']; ?></h2>
            <img src="img/<?php echo $quest['url_imagen'] ?>" alt=<?php echo $quest['url_imagen'] ?> >
            <p><?php echo $quest['description'] ?></p>
          </div>              
        </div>
      <?php              
      }          
    ?>        
  </ul>
</section>
