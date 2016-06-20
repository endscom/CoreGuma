
<!--<a href="#!" id="link<?php //echo $link; $link++;?>"onclick="mostrar(<?php //echo $contador; ?>);" class="collection-item verde"><?php echo $definitiva."&nbsp &nbsp".$m['año']?></a>-->
<!-- <div style="background-color:white!important;" class="row">-->
<br>
<div class="">
  <div class="container"> 
    <div class="row">
      <div class="col s12">
        <div class="card">

         <h5 class="center Texto"><br >ESTADOS DEL DÍA</h5>
         <div class="card-content fondo">
          <div class="row">
            <div class="col s2">
              <a id="back" class="right waves-effect waves-light btn " href="<?php echo base_url('index.php/dashboard');?> ">ATRAS</a>
            </div>
          </div>

          <div id="" class="row">
           <div class=" col s12 ">
             <ul class="collapsible " data-collapsible="accordion">                   
              <?php
              $contador=1;
              $link=1;
              if (!($fecha)) {                              
              } else {
                foreach ($fecha as $m) {

                  if ($m['Fecha']=="1") $mes="ENERO";
                  if ($m['Fecha']=="2") $mes="FEBRERO";
                  if ($m['Fecha']=="3") $mes="MARZO";
                  if ($m['Fecha']=="4") $mes="ABRIL";
                  if ($m['Fecha']=="5") $mes="MAYO";
                  if ($m['Fecha']=="6") $mes="JUNIO";
                  if ($m['Fecha']=="7") $mes="JULIO";
                  if ($m['Fecha']=="8") $mes="AGOSTO";
                  if ($m['Fecha']=="9") $mes="SEPTIEMBRE";
                  if ($m['Fecha']=="10") $mes="OCTUBRE";
                  if ($m['Fecha']=="11") $mes="NOVIEMBRE";
                  if ($m['Fecha']=="12") $mes="DICIEMBRE";
                  $definitiva= $mes; ?>
                  <li>
                    <div id="Collap"class="collapsible-header "><?php echo $definitiva."&nbsp &nbsp".$m['año']?></div>

                    <div  class="collapsible-body" id="<?php echo $contador; $contador++;?>">
                      <table class="ingreso"  id="" >
                        <thead >
                          <tr>
                           <th>FECHA</th>
                           <th>UNIMARK</th>
                           <th>UMAAGRO</th>
                           <th>UMAVET</th>
                           <th>INNOVA</th>
                           <th>AGLOSA</th>
                         </tr>
                       </thead>
                       <tbody class="Tcolor">                                                      
                        <?php
                        $mess=0;
                        switch ($definitiva) {
                          case "ENERO":$mess=01;break;
                          case "FEBRERO":$mess=02;break;
                          case "MARZO": $mess=3; break;
                          case "ABRIL": $mess=04;break;
                          case "MAYO": $mess=05;break;
                          case "JUNIO": $mess=06; break;
                          case "JULIO":$mess=07;break;
                          case "AGOSTO": $mess=08; break;
                          case "SEPTIEMBRE": $mess=09;break;
                          case "OCTUBRE":$mess=10;break;
                          case "NOVIEMBRE":$mess=11; break;
                          case "DICIEMBRE":$mess=12;break;
                          default: /**/ break; }
                                              if (!($All)) {}
                                               else {
                                                            foreach ($All as $key) {
                                                                //echo "<td><a href=".base_url('index.php/Formatos').">".date('d/m/Y',strtotime(substr($key['FechaM'], 0,10)))."</a></td>";

                                                                  if($mess==date('m',strtotime(substr($key['FechaM'], 0,10))))                                                                  //echo $mess;
                                                                  echo "
                                                                  <tr>

                                                                  <td>".date('d/m/Y',strtotime(substr($key['FechaM'], 0,10)))."</td>
                                                                  <td>".
                                                                  (($key['UNIMARK']==1) ? "<a target='_blank' href='".base_url("index.php/Detalles/".$key['Id1']."/".date('Y-m-d',strtotime(substr($key['FechaM'], 0,10)))."")."'>
                                                                    <i class='green-text text-darken-3 small material-icons'>&#xE5CA;</i></a>" : '<i class="red-text text-darken-3 small material-icons">&#xE5CD;</i>')."
                                                                  </td>
                                                                  <td>".
                                                                  (($key['UMAARGO']==1) ? "<a target='_blank' href='".base_url("index.php/DetallesUma/".$key['Id2']."/".date('Y-m-d',strtotime(substr($key['FechaM'], 0,10)))."")."'>
                                                                    <i class='green-text text-darken-3 small material-icons'>&#xE5CA;</i></a>" : '<i class="red-text text-darken-3 small material-icons">&#xE5CD;</i>')."
                                                                  </td>
                                                                  <td>".
                                                                  (($key['UMAVET']==1) ? "<a target='_blank' href='".base_url("index.php/DetallesUmavet/".$key['Id3']."/".date('Y-m-d',strtotime(substr($key['FechaM'], 0,10)))."")."'>
                                                                    <i class='green-text text-darken-3 small material-icons'>&#xE5CA;</i></a>" : '<i class="red-text text-darken-3 small material-icons">&#xE5CD;</i>')."
                                                                  </td>
                                                                  <td>".
                                                                  (($key['INNOVA']==1) ? "<a target='_blank' href='".base_url("index.php/DetallesInnova/".$key['Id4']."/".date('Y-m-d',strtotime(substr($key['FechaM'], 0,10)))."")."'>
                                                                    <i class='green-text text-darken-3 small material-icons'>&#xE5CA;</i></a>" : '<i class="red-text text-darken-3 small material-icons">&#xE5CD;</i>')."
                                                                  </td>
                                                                  <td>".
                                                                  (($key['AGLOSA']==1) ? "<a target='_blank' href='".base_url("index.php/DetallesAglosa/".$key['Id5']."/".date('Y-m-d',strtotime(substr($key['FechaM'], 0,10)))."")."'>
                                                                    <i class='green-text text-darken-3 small material-icons'>&#xE5CA;</i></a>" : '<i class="red-text text-darken-3 small material-icons">&#xE5CD;</i>')."
                                                                  </td>
                                                                  </tr>
                                                                  ";

                                                                }
                                                              }                                                              
                                                              ?>                    
                                                            </tbody>
                                                          </table>
                                                        </div>
                                                      </li>  
                                                 <?php }
                                                      }?> 
                                                  
                                                  </ul>
                                                </div>
                                              </div>


                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>    
                                  </div>
                                </div>


