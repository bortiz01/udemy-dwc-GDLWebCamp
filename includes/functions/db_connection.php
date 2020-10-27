<?php
  // error_reporting(0); // Turn off all error reporting    
  $con = new mysqli('localhost', 'root', '', 'gdlwebcamp'); 
?>

<?php if ($con->connect_error) { ?>
  <?php $message = "Fallo al conectar la BD: (" . $con->connect_errno . ") " . $con->connect_error; ?>      
  <script>
    document.querySelector(".critical_message").style.display = 'block';
    document.querySelector("#db_error").innerHTML = <?php echo json_encode($message);?>;
  </script>
<?php }; ?>