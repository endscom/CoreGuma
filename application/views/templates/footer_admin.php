
<header></header>
<main></main>

 
<footer class="page-footer " id="ColorFooter" >

    <div class="footer-copyright " id="ColorFooter">
           <div class="center row">
               © <?php echo date('Y')?> Copyright GCTI_GUMA
          </div>
    </div>   
  
</footer>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/materialize.min.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/chosen.jquery.js"></script>
<script type="text/javascript">
    var config = {
        '.chosen-select'           : {}
    }
    for (var selector in config) {
        $(selector).chosen(config[selector]);
    }
    
</script>
<script src="<?php echo base_url(); ?>assets/media/js/extensions/jquery.numeric.js"></script>
<script src="<?php echo base_url(); ?>assets/media/js/extensions/jquery.numeric.min.js"></script>

<script src="<?php echo base_url(); ?>assets/media/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/media/js/extensions/dataTables.colVis.min.js"></script>
<script src="<?php echo base_url(); ?>assets/media/js/extensions/dataTables.tableTools.min.js"></script>
<script src="<?php echo base_url(); ?>assets/media/js/extensions/jquery.dataTables.rowGrouping.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/index.js"></script>
<script>
 $('.datepicker1').pickadate({
       selectMonths: true, // Creates a dropdown to control month
        selectYears: 15, // Creates a dropdown of 15 years to control year
        format: 'yyyy-mm-dd',// Formats
        monthsFull: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
        weekdaysFull: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
        weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
        showMonthsShort: undefined,
        showWeekdaysFull: undefined,
        today: 'Hoy',
        clear: 'Borrar',
        close: 'Cerrar'
    });  
</script>

</body>
</html>
