<!DOCTYPE html>
<html class="no-js" lang="">

  <!-- includes -->
  <?php
    require_once 'includes/templates/meta.php';
    include_once 'includes/templates/header.php';
  ?>
  
  <!-- querys -->
  <?php 
    try {
      // open connection
      require_once('includes/functions/db_connection.php');

      // query
      $sql = "SELECT * FROM `category_events` ORDER BY `order_category` ASC";
      
      // execute query
      $result = $con->query($sql);    
    } catch (\Exception $e){ 
      echo $e->getMessage();    
    }; 
    // close connection
    // $con->close();
  ?>
  
  <body>    
    <section class="seccion contenedor">
      <h2>La mejor conferencia de diseño web en español</h2>      

      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis
        voluptatem quis ad facere repudiandae nobis dolor, rerum eveniet neque
        quod vero ea blanditiis odit sunt placeat provident eius, sapiente
        molestiae. Lorem ipsum, dolor sit amet consectetur adipisicing elit.
        Saepe, enim exercitationem placeat consequatur aliquid id optio, nihil
        numquam itaque, eos voluptas! Quo obcaecati delectus possimus eum
        aliquid illum tempora laborum.
      </p>
    </section>

    <section class="programa">
      <div class="contenedor-video">
        <video autoplay muted loop poster="img/bg-talleres.jpg">
          <source src="video/video.mp4" type="video/mp4" />
          <source src="video/video.webm" type="video/webm" />
          <source src="video/video.ogv" type="video/ogv" />
        </video>
      </div>

      <div class="contenido-programa">
        <div class="contenedor">
          <div class="programa-evento">
            <h2>Programa del Evento</h2>
            <nav class="menu-programa">                          
              <?php while($categorys = $result->fetch_assoc()) { ?>
                <?php $catergory_name = $categorys['name_category']; ?>
                <a href="#<?php echo strtolower($catergory_name);?>"><i class="<?php echo $categorys['icon'];?>" ></i><?php echo $catergory_name;?></a>
              <?php }; ?>            
            </nav>

            <?php 
              try {
                // open connection
                require_once('includes/functions/db_connection.php');

                // query
                $sql = "";
                $sql .= " SELECT id_event, name_event, category_events.id_category, name_category, icon, name_quest, lastname_quest, description, url_imagen, name_event, date_event, hour_event, event_key";
                $sql .= " FROM `events`";
                $sql .= " INNER JOIN `category_events`";
                $sql .= " ON `events`.id_category = `category_events`.id_category";
                $sql .= " INNER JOIN `quests`";
                $sql .= " ON `quests`.id_quest = `events`.id_quest";
                $sql .= " AND events.id_category = 1";
                $sql .= " ORDER BY id_event ASC LIMIT 2;";
                $sql .= " SELECT id_event, name_event, category_events.id_category, name_category, icon, name_quest, lastname_quest, description, url_imagen, name_event, date_event, hour_event, event_key";
                $sql .= " FROM `events`";
                $sql .= " INNER JOIN `category_events`";
                $sql .= " ON `events`.id_category = `category_events`.id_category";
                $sql .= " INNER JOIN `quests`";
                $sql .= " ON `quests`.id_quest = `events`.id_quest";
                $sql .= " AND events.id_category = 2";
                $sql .= " ORDER BY id_event ASC LIMIT 2;";
                $sql .= " SELECT id_event, name_event, category_events.id_category, name_category, icon, name_quest, lastname_quest, description, url_imagen, name_event, date_event, hour_event, event_key";
                $sql .= " FROM `events`";
                $sql .= " INNER JOIN `category_events`";
                $sql .= " ON `events`.id_category = `category_events`.id_category";
                $sql .= " INNER JOIN `quests`";
                $sql .= " ON `quests`.id_quest = `events`.id_quest";
                $sql .= " AND events.id_category = 3";
                $sql .= " ORDER BY id_event ASC LIMIT 2;";                                                          
              } catch (\Exception $e){ 
                echo $e->getMessage();
              }; 
            ?>

            <!-- ejemplo de codigo con consultas multiples -->
            <!-- execute query -->
            <?php $con->multi_query($sql); ?>          
            <?php do { ?>              
              <?php $result = $con->store_result(); ?>             
              <?php $row = $result->fetch_all(MYSQLI_ASSOC); ?>

              <?php $i = 0; ?>
              <?php foreach($row as $event) { ?>
                <?php if ($i % 2 == 0) { ?>
                  <div id="<?php echo strtolower($event['name_category']);?>" class="info-curso ocultar clearfix">
                <?php }; ?>                
                  
                <div class="detalle-evento">                  
                  <h3><?php echo utf8_encode($event['name_event']);?></h3>
                  <p><i class="fas fa-clock"></i><?php echo $event['hour_event'];?></p>
                  <p><i class="fas fa-calendar"></i><?php echo $event['date_event'];?></p>
                  <p><i class="fas fa-user"></i><?php echo $event['name_quest'] . ' ' . $event['lastname_quest'];?></p>
                </div>
                                
                <?php if ($i % 2 == 1){ ?>
                  <a href="calendario.php" class="button float-right">Ver todos</a>
                  </div>
                <?php }; ?>                                
                <?php $i++; ?>
              <?php }; ?>           
              <?php $result->free(); ?>     
            <?php } while ($con->more_results() && $con->next_result()); ?>
            <!-- close connection -->
            <!-- <?php $con->close(); ?> -->
          </div>
        </div>
      </div>
    </section>

    <?php
      include_once 'includes/templates/s_invitados.php';
    ?>

    <div class="contador parallax">
      <div class="contenedor">
        <!-- <ul class="resumen-evento clearfix"> -->
        <ul class="resumen-evento">
          <li>
            <p class="numero"></p>Invitados
          </li>
          <li>
            <p class="numero"></p>Talleres
          </li>
          <li>
            <p class="numero"></p>Dias
          </li>
          <li>
            <p class="numero"></p>Conferencias
          </li>
        </ul>
      </div>
    </div>

    <section class="precios seccion">
      <h2>Precios</h2>
      <div class="contenedor">
        <!-- <ul class="lista-precios clearfix"> -->
        <ul class="lista-precios">
          <li>
            <div class="tabla-precio">
              <h3>Pase por dia</h3>
              <p class="numero">$30</p>
              <ul>
                <li>Bocadillos Gratis</li>
                <li>Todas las Conferencias</li>
                <li>Todos los Talleres</li>
              </ul>
              <a href="#" class="button hollow">Comprar</a>
            </div>
          </li>

          <li>
            <div class="tabla-precio">
              <h3>Todos los dias</h3>
              <p class="numero">$50</p>
              <ul>
                <li>Bocadillos Gratis</li>
                <li>Todas las Conferencias</li>
                <li>Todos los Talleres</li>
              </ul>
              <a href="#" class="button">Comprar</a>
            </div>
          </li>

          <li>
            <div class="tabla-precio">
              <h3>Pase por 2 dias</h3>
              <p class="numero">$45</p>
              <ul>
                <li>Bocadillos Gratis</li>
                <li>Todas las Conferencias</li>
                <li>Todos los Talleres</li>
              </ul>
              <a href="#" class="button hollow">Comprar</a>
            </div>
          </li>
        </ul>
      </div>
    </section>

    <div id="mapa" class="mapa">

    </div>

    <section class="seccion">
      <h2>Testimoniales</h2>
      <!-- <div class="testimoniales contenedor clearfix"> -->
      <div class="testimoniales contenedor">
        <div class="testimonial">
          <blockquote>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis doloremque eveniet unde facere maiores ut
              velit quis possimus dolor repudiandae est, minus corporis assumenda ad repellendus voluptas modi nam
              accusamus?</p>
            <!-- <footer class="info-testimonial clearfix"> -->
            <footer class="info-testimonial">
              <img src="img/testimonial.jpg" alt="Imagen Testimonial">
              <cite>Oswaldo Aponte Escober <span>Diseñador en @prisma</span></cite>
            </footer>
          </blockquote>
        </div>

        <div class="testimonial">
          <blockquote>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio praesentium itaque soluta laborum. Ipsa
              quidem
              perspiciatis exercitationem praesentium! Nemo eveniet ea quasi culpa saepe eos. Nostrum saepe rerum ipsam
              animi!</p>
            <!-- <footer class="info-testimonial clearfix"> -->
            <footer class="info-testimonial">
              <img src="img/testimonial.jpg" alt="Imagen Testimonial">
              <cite>Oswaldo Aponte Escober <span>Diseñador en @prisma</span></cite>
            </footer>
          </blockquote>
        </div>

        <div class="testimonial">
          <blockquote>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Temporibus quae autem molestias vero incidunt
              quaerat numquam odit, minima non saepe magni laudantium eveniet, ex accusamus corporis
              dolores libero!</p>
            <!-- <footer class="info-testimonial clearfix"> -->
            <footer class="info-testimonial">
              <img src="img/testimonial.jpg" alt="Imagen Testimonial">
              <cite>Oswaldo Aponte Escober <span>Diseñador en @prisma</span></cite>
            </footer>
          </blockquote>
        </div>
      </div>
    </section>

    <div class="newsletter parallax">
      <div class="contenido contenedor">
        <p>registrate al newsletter</p>
        <h3>gdlwebcamp</h3>
        <a href="#" class="button transparente">Registro</a>
      </div>
    </div>

    <section class="seccion">
      <h2>Faltan</h2>
      <div class="cuenta-regresiva contenedor">
        <!-- <ul class="clearfix"> -->
        <ul>
          <li>
            <p id='dias' class="numero"></p>dias
          </li>
          <li>
            <p id='horas' class="numero"></p>horas
          </li>
          <li>
            <p id='minutos' class="numero"></p>minutos
          </li>
          <li>
            <p id='segundos' class="numero"></p>segundos
          </li>
        </ul>
      </div>
    </section>

    <?php
      include_once 'includes/templates/footer.php';
      include_once 'includes/templates/scripts.php';
    ?>

  </body>
  <?php $con->close(); ?>  
</html>