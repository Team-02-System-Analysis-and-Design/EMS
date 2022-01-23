<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>&copy; <?php echo date("Y"); ?></strong> BSISNS-3C-M Employee Management System
  </footer>

</div>


<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>

<!-- Date Picker -->
<script>
    $('#datepicker').datepicker({
      autoclose: true
    })
</script>

<!-- Datatable -->
<script>
  $(function () {
    $('#example1').DataTable()
    
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
