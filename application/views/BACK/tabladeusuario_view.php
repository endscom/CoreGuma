
<div class="">
    <div class="container"> 
    <div class="row">
        <div class="col s12">
          <div class="card">
            <h5 class="center Texto"><br>USUARIOS</h5>  <br><br>
            <div class="card-content">
              <div class="row" id="Btns">
              <a  id="btn" class="waves-effect waves-light btn" href="<?php echo base_url('index.php/Ingreso');?>">CREAR</a> &nbsp&nbsp
              <a  id="btn" class="waves-effect waves-light btn  " href="<?php echo base_url('index.php/dashboard');?>">ATRAS</a> <br><br>
              </div>
              <div>
                 
                <table id="TblMaster" class="User table hover cell-border " cellspacing="1" cellpadding="2">
                     <thead >
                        <tr class="Texto1">
                            <th>Nº</th>
                            <th>USUARIO</th>                                    
                            <th>EMPRESA</th>
                            <th>PERMISOS</th> 
                            <th>ELIMINAR</th>                  
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                            $c=1;
                            foreach ($MTUS as $key) {
                               echo "
                                <tr>                                    
                                    <td>".$c."</td>
                                    <td class='text3'>".$key['SlpName']."</td>
                                    <td class='text3'>".$key['Nombre']."</td>
                                    <td>".$key['Privilegio']."</td>
                                    <td><a href='".base_url('index.php/Eliminar/'.$key['SlpCode'].'')."'><i class='red-text text-darken-3 small material-icons'>&#xE5CD;</i></a></td>
                                    </a></td>                                    
                                </tr>
                                ";
                                $c++;
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

