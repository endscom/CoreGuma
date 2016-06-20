<?php
  if(!($InfoCuenta)){
    $cuenta = "";
    $Banco = "";
    $Moneda = "";
  }else{
    $cuenta = $InfoCuenta[0]['NCuenta'];
    $Banco = $InfoCuenta[0]['Banco'];
    $Moneda = $InfoCuenta[0]['MTipo'];
  }

  $retVal = ((substr($Moneda,0,1))=="D") ? "$" : "C$" ;
  
?>

<div  class="">
    <div class=""> 
    <div class="row">
        <div class="col s12">
          <div id="card1" class="card">
          
            
            <div class="card-content">
              <div class="row">
                <div id="DetalleCuenta">
                
                <p>Cuenta: &nbsp&nbsp &nbsp &nbsp  <?php echo $cuenta?></p>
                <p>Banco:  &nbsp&nbsp &nbsp &nbsp <?php echo $Banco?></p>
                <p>Moneda:  &nbsp&nbsp &nbsp &nbsp <?php echo $Moneda?></p>
                <p>Saldo de Movimiento: &nbsp&nbsp &nbsp &nbsp   
                
                <?php  if (!($Movimientos)) { $Array[]=0; } else { for ($i=0; $i <count($Movimientos) ; $i++) { $Array[] = $Movimientos[$i]['Monto']; } echo $retVal." ".number_format(array_sum($Array),2);}?>
                </p>
              </div>
              </div>
              <div class="row">
              <div class="col s12">
                <table id="TblMasterMov" class="table bordered hover  display" s>
                     <thead>
                        <tr >
                            <th>No.</th>
                            <th>FECHA</th>
                            <th>Nº DOCUMENTO</th>
                            <th>NOMBRE</th>                                    
                            <th>CONCEPTO</th>
                            <th>MONTO</th>                             
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                          if (!($Movimientos)) {
                            # code...
                          } else {
                              $c=1;
                                foreach ($Movimientos as $key) {
                                   echo "
                                    <tr>                                    
                                        <td>".$c."</td>
                                        <td>".date("d-M-Y", strtotime($key['FechaM']))."</td>
                                        <td>".$key['nDocumento']."</td>
                                        <td >".$key['Nombre']."</td>
                                        <td >".$key['Concepto']."</td>
                                        <td >".$retVal." ".number_format($key['Monto'],2)."</td>
                                    </tr>
                                    ";
                                    $c++;
                                }
                          }                            
                        ?>

                     </tbody>
                 </table>
                 </div>
              </div>
            </div>
          </div>
        </div>
      </div>    
    </div>
</div>

