<!DOCTYPE html>
<?php

require_once "app/Kriteria.php";

$alt = new App\kriteria();
$rows = $alt->tampil();

$page = "kriteria";
include "header.php";
include "sidebar.php";
// content
include "pages/kriteria/index.php";
include "footer.php";
?>
<script>
  $("body").on("click", ".btn-edit", function() {
   
    var id = jQuery(this).attr("data-id");
    var data;
    $.ajax({
      type: 'GET',
      url: "pages/kriteria/get_json.php?id=" + id,
      data: {
        data
      },
      dataType: 'JSON',
      error: function() {
        alert('Something is wrong');
      },
      success: function(dataResult) {
        console.log(dataResult);
        $.each(dataResult, function(index, row) {
          jQuery("input[name=kriteria]").val(row.kriteria);
          jQuery("input[name=keterangan]").val(row.keterangan);
          jQuery("input[name=bobot]").val(row.bobot);
          //alert(row.nama);
          //alert(row.no_kk);
        })
      }
    });

    jQuery("#modalformkriteria").attr("action", "pages/kriteria/simpan.php?id=" + id);
    jQuery("#kriteriamodal .modal-title").html("Update Data Kriteria");
    jQuery("#kriteriamodal").modal("toggle");
  });

  function kosongkan() {
    jQuery("input[name=kriteria]").val("");
    jQuery("input[name=keterangan]").val("");
    jQuery("input[name=bobot]").val("0.01");
  }
  $("body").on("click", ".btn-add", function() {
    kosongkan();
    jQuery("#modalformkriteria").attr("action", "pages/kriteria/simpan.php");
    jQuery("#kriteriamodal .modal-title").html("Tambah Data Kriteria");
    jQuery("#kriteriamodal").modal("toggle");
  })
  $("body").on("click", ".btn-simpan", function() {
    Swal.fire(
      'Data Disimpan!',
      '',
      'success'
    ).then(function() {
      document.getElementById('modalformkriteria').submit();
    });

  });
</script>

</html>