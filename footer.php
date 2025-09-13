      <footer class="py-4 bg-light mt-auto">
          <div class="container-fluid px-4">
              <div class="d-flex align-items-center justify-content-between small">
                  <div class="text-muted">Wildani Nasution - Sistem Informasi 2025</div>
                  <div>
                     
                  </div>
              </div>
          </div>
      </footer>
      </div>
      </div>
      </body>

      <!-- jQuery 3 -->
      <script src="bower_components/jquery/dist/jquery.min.js"></script>
      <!-- jQuery UI 1.11.4 -->
      <script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
      <script type="text/javascript" src="assets/datatables.min.js"></script>
      <script src="assets/js/bootstrap.bundle.min.js"></script>
      <script src="js/scripts.js"></script>
      <script src="js/Chart.min.js"></script>
      <script src="js/simple-datatable.js"></script>
      <script src="js/datatables-simple-demo.js"></script>

      <script>
          $(function() {
              //$(".alert").fadeOut(5000);
              for (var i = 1; i <= 10; i++) {
                  const datatablesSimple = document.getElementById('example' + i);
                  if (datatablesSimple) {
                      new simpleDatatables.DataTable(datatablesSimple, {
                          info: true,
                          paging: false,
                      });
                  }
              }
              for (var i = 1; i <= 10; i++) {
                  const datatablesSimple = document.getElementById('theedata' + i);
                  if (datatablesSimple) {
                      new simpleDatatables.DataTable(datatablesSimple);
                  }
              }
              const datatablesSimple = document.getElementById('datalf');
              new simpleDatatables.DataTable(datatablesSimple, {
                  info: false,
                  searching: false,
                  paging: false,
              });
          });

          $("body").on("click", ".btn-hapus", function() {
              var x = jQuery(this).attr("data-id");
              var y = jQuery(this).attr("data-handler");
              var xy = x + '-' + y;
              event.preventDefault()
              Swal.fire({
                  title: 'Hapus Data ?',
                  text: "Data yang dihapus tidak dapat dikembalikan !",
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes',
                  cancelButtonText: 'Tidak'
              }).then((result) => {
                  if (result.value) {
                      Swal.fire(
                          'Data Dihapus!',
                          '',
                          'success'
                      );
                      document.getElementById('delete-form-' + xy).submit();
                  }
              });

          })
      </script>