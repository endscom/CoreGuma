<header></header>
<main></main>
<footer class="page-footer light-blue lighten-1">
    <div class="footer-copyright">
        <div class="container center">
            © <?php echo date('Y')?> Copyright UNIMARK S.A
        </div>
    </div>
</footer>
</script>



<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/materialize.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/coreguma.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>assets/media/js/extensions/dataTables.colVis.min.js"></script>
<script src="<?php echo base_url(); ?>assets/media/js/extensions/dataTables.tableTools.min.js"></script>



<script type="text/javascript" src="<?php echo base_url(); ?>assets/media/js/jquery.dataTables.editable.js"></script>
<script src="<?php echo base_url(); ?>assets/media/js/jquery.jeditable.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/media/js/jquery-ui.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/media/js/jquery.validate.js" type="text/javascript"></script>


<script type="text/javascript" src="<?php echo base_url('assets/js/JQExcel.js')?>"></script>

<script src="<?php echo base_url(); ?>assets/media/js/extensions/jquery.numeric.js"></script>
<script src="<?php echo base_url(); ?>assets/media/js/extensions/jquery.numeric.min.js"></script>


<script type="text/javascript" charset="utf-8">

    $('#TblveditCuenta').dataTable({         
                    "sPaginationType": "full_numbers"
    }).makeEditable({
                        sAddURL: "<?php echo base_url('index.php/CtaAdd');?>",                        
                        sDeleteURL: "<?php echo base_url('index.php/CtaDel');?>",
                        sUpdateURL:"<?php echo base_url('index.php/CtaUpd');?>",
                        sAddDeleteToolbarSelector: ".dataTables_length",
                        oAddNewRowFormOptions: {
                                        title: 'Crear Nueva Cuenta',
                                        show: "blind",
                                        hide: "explode",
                                        modal: true
                                    },
                        oAddNewRowButtonOptions: {  
                            label: "Agregar..."
                            
                        },
                        oDeleteRowButtonOptions: {  
                            label: "Inactivar..."
                        },
                        "aoColumns": [{
                        cssclass: "required" },
                        {
                            indicator: 'Guardando...',
                            tooltip: '',
                            type: 'textarea',
                            submit:'Guardar',
                            fnOnCellUpdated: function(){                                            
                                window.location.href = "<?php echo base_url('index.php/Cuentas');?>";                                         
                            }
                        },

                        {
                            indicator: 'Guardando...',
                            tooltip: '',
                            type: 'textarea',
                            submit:'Guardar',
                            fnOnCellUpdated: function(){                                            
                               window.location.href = "<?php echo base_url('index.php/Cuentas');?>";                                         
                            }
                            
                        },
                         {
                            indicator: 'Guardando...',
                            tooltip: '',
                            type: 'textarea',
                            submit:'Guardar',
                            fnOnCellUpdated: function(){                                            
                                window.location.href = "<?php echo base_url('index.php/Cuentas');?>";                                         
                            }
                        },
                        {
                            indicator: 'Guardando...',
                            tooltip: '',
                            type: 'textarea',
                            submit:'Guardar',
                            fnOnCellUpdated: function(){                                            
                                window.location.href = "<?php echo base_url('index.php/Cuentas');?>";                                         
                            }
                        }
                                    
                    ]

                });
</script>

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
    $('.datepicker2').pickadate({
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