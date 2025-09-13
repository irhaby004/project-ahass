<!DOCTYPE html>
<html>
<?php
require_once "app/Penilaian.php";

$alt = new App\Penilaian();

$page = "penilaian";
include "header.php";
if ($_SESSION["status"] == 'Admin') {
  $rows = $alt->tampil();
} else {
  $rows = $alt->get_tampil();
}
include "sidebar.php";
// content
include "pages/penilaian/index.php";
include "footer.php";
?>
<script>
  $("body").on("click", ".btn-edit", function() {

    var id = jQuery(this).attr("data-id");
    var data;
    $.ajax({
      type: 'GET',
      url: "pages/penilaian/get_json.php?id=" + id,
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
          jQuery("input[name=kode]").val(row.kode);
          jQuery("input[name=ahass]").val(row.ahass);
          jQuery("input[name=c1]").val(row.c1);
          jQuery("input[name=c2]").val(row.c2);
          jQuery("input[name=c3]").val(row.c3);
          jQuery("input[name=c4]").val(row.c4);
          jQuery("input[name=c5]").val(row.c5);
          jQuery("input[name=c4]").val(row.c4);
          jQuery("input[name=c5]").val(row.c5);
          jQuery("input[name=id_penilaian]").val(row.id_penilaian);
          jQuery("input[name=id_alternatif]").val(row.id_alternatif);
        })
      }
    });

    jQuery("#modalformpenilaian").attr("action", "pages/penilaian/simpan.php");
    jQuery("#penilaianmodal .modal-title").html("Update Data Kriteria");
    jQuery("#penilaianmodal").modal("toggle");
  });

  $("body").on("click", ".btn-simpan", function() {
    Swal.fire(
      'Data Disimpan!',
      '',
      'success'
    ).then(function() {
      $('#modalformpenilaian').submit();
    });
  });
</script>

</html>
