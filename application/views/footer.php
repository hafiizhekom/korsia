 </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © PT Korsia Boan Perkasa 2019</span>
          </div>
        </div>
      </footer>

    </div>
    

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?=base_url('home/logout')?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  -->
  
  <script type="text/javascript">
    $('.table').bootstrapTable();


    function nomor(value, row, index) {
      return index+1;
    } 


  </script>

      <script type="text/javascript">
                                    $('.form_date').datetimepicker({
                                        language:  'id',
                                        weekStart: 1,
                                        todayBtn:  1,
                                        autoclose: 1,
                                        todayHighlight: 1,
                                        startView: 2,
                                        minView: 2,
                                        forceParse: 0
                                    });

                                    $('.form_date_month').datetimepicker({
                                        language:  'id',
                                        weekStart: 1,
                                        todayBtn:  1,
                                        autoclose: 1,
                                        todayHighlight: 1,
                                        startView: 3,
                                        minView: 3,
                                        forceParse: 0
                                    });

                                    $('.form_date_year').datetimepicker({
                                        language:  'id',
                                        weekStart: 1,
                                        todayBtn:  1,
                                        autoclose: 1,
                                        todayHighlight: 1,
                                        startView: 4,
                                        minView: 4,
                                        forceParse: 0
                                    });
                                </script>


</body>

</html>
