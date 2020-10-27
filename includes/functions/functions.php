<?php
  function product_json(&$boletos, &$camisas = 0, &$etiquetas = 0) {
    
    $output = [];

    // crear un array - una forma de hacerlo
    // $vBoletos = ['un_dia' => $boletos[0], 'pase_completo' => $boletos[1], 'pase_2dias' => $boletos[2]];
    // print_r($vBoletos);
    
    // crear un array - otra forma de hacerlo
    $dias = [0 => 'un_dia', 1 => 'pase_completo', 3 => 'pase_2dias'];
    $total_boletos = array_combine($dias, $boletos);


    // adicionar los boletos a la salida - forma larga de hacerlo
    // foreach($total_boletos as $key => $value) {
    //   if ((int) $value > 0) {
    //     $output[$key] = $value;
    //   };
    // };        

    // print_r(json_encode($output));


    // adicionar los boletos a la salida - forma corta de hacerlo
    $to_delete = array('','0');
    $total_boletos = array_diff($total_boletos, $to_delete);
    $output = $total_boletos;

    $camisas = (int) $camisas;
    if ($camisas > 0) {
      $output['camisas'] = $camisas;
    }
    
    $etiquetas = (int) $etiquetas;
    if ($etiquetas > 0) {
      $output['etiquetas'] = $etiquetas;    
    }

    return json_encode($output);
  };

  function event_json (&$workshops) {
    $output = [];

    $output['eventos'] = $workshops;
    return json_encode($output);
  };
?>