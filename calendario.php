<!DOCTYPE html>
<html class="no-js" lang="">

  <?php
    require_once 'includes/templates/meta.php';
    include_once 'includes/templates/header.php';
  ?>

  <?php
    try {
      // open connection
      require_once('includes/functions/db_conndection.php');

      // query
      $sql = "";
      $sql .= " SELECT id_event, name_event, name_category, icon, name_quest, lastname_quest, description, url_imagen, name_event, date_event, hour_event, event_key";
      $sql .= " FROM `events`";
      $sql .= " INNER JOIN `category_events`";
      $sql .= " ON `events`.id_category = `category_events`.id_category";
      $sql .= " INNER JOIN `quests`";
      $sql .= " ON `quests`.id_quest = `events`.id_quest";
      $sql .= " ORDER BY id_event ASC";
      
      // execute query
      $result = $con->query($sql);    
    } catch (\Exception $e){ 
      echo $e->getMessage();
    };    
  ?>

  <body id="#calendario">    
    <section class = 'seccion contenedor'>
      <h2>Calendario de eventos</h2>          

      <div class="calendario"> 
        <?php
          $calendar = []; 
          while ($events = $result->fetch_assoc()) { 
            $date = $events['date_event'];

            $event = [
              'title' => $events['name_event'],
              'date' => $events['date_event'],
              'hour' => $events['hour_event'],
              'category' => $events['name_category'],
              'icon' => $events['icon'],
              'quest' => $events['name_quest'] . " " . $events['lastname_quest']
            ];

            $calendar[$date][] = $event;
          };                    
        ?>

        <?php foreach ($calendar as $day => $event_data) { ?>
          <h3>
            <i class= 'fa fa-calendar-alt'></i>
            <?php
              // setlocale(LC_TIME, 'es_US.UTF-8'); //UNIX            
              // setlocale(LC_TIME, 'spanish');
              setlocale(LC_TIME, 'spanish');
              echo utf8_encode(strftime("%A, %d de %B del %Y", strtotime($day)));
            ?>          
          </h3>

          <?php foreach($event_data as $data) { ?>
            <div class="dia">
              <p class="titulo"> 
                <?php echo $data['title'];?> 
              </p>
              
              <p class="hora"> 
                <i class="far fa-clock"></i>
                <?php echo $data['date'] . ' ' . $data['hour'];?> 
              </p>

              <p> 
                <i class= "<?php echo $data['icon']; ?>"></i>
                <?php echo $data['category']; ?> 
              </p>

              <p> 
                <i class="far fa-user"></i>
                <?php echo $data['quest']?> 
              </p>
            </div>
          <?php }; ?>                      
        <?php }; ?>
      </div>
    </section>    
    
    <?php
      include_once 'includes/templates/footer.php';
      include_once 'includes/templates/scripts.php';
    ?>

  </body>
  <?php $con->close(); ?>
</html>