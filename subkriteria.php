<!DOCTYPE html>
<html>
<?php
require_once "app/Kriteria.php";
require_once "app/Subkriteria.php";

$alt = new App\Kriteria();
$kategory = $alt->get_category();
$sub = new App\Subkriteria();
$filter = $alt->tampil();
$data = "";
foreach ($filter as $p) {
  $data .= '<option value="' . $p['id_kriteria'] . '">' . $p['kriteria'] . ' - ' . $p['keterangan'] . '</option>';
}
$page = "subkriteria";
include "header.php";
include "sidebar.php";
// content
include "pages/subkriteria/index.php";
include "footer.php";
?>
<script>
  jQuery(document).ready(function() {
    $("#cat").hide();
  });

  $("body").on("click", ".btn-edit", function() {

    var id = jQuery(this).attr("data-id");
    var data;
    $.ajax({
      type: 'GET',
      url: "pages/subkriteria/get_json.php?id=" + id,
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
          jQuery("select[name=kriteria]").val(row.id_kriteria);
          jQuery("input[name=keterangan]").val(row.keterangan);
          jQuery("input[name=nilai]").val(row.nilai);
          jQuery("select[name=kategori]").val(row.id_kat);
          if (row.id_kriteria === "3") {
            $("#cat").show();
          } else {
            $("#cat").hide();
            jQuery("select[name=kategori]").val(1);
          }
          //alert(row.id_kriteria);
          //alert(row.no_kk);
        })
      }
    });

    jQuery("#modalformsub").attr("action", "pages/subkriteria/simpan.php?id=" + id);
    jQuery("#submodal .modal-title").html("Update Data Sub Kriteria");
    jQuery("#submodal").modal("toggle");
  });

  function kosongkan() {
    jQuery("select[name=kriteria]").val(0);
    jQuery("input[name=keterangan]").val("");
    jQuery("input[name=nilai]").val("");
    jQuery("select[name=kategori]").val(1);
  }
  $("body").on("click", ".btn-add", function() {
    kosongkan();
    jQuery("#modalformsub").attr("action", "pages/subkriteria/simpan.php");
    jQuery("#submodal .modal-title").html("Tambah Data Sub Kriteria");
    jQuery("#submodal").modal("toggle");
  })
  $("body").on("click", ".btn-simpan", function() {
    Swal.fire(
      'Data Disimpan!',
      '',
      'success'
    ).then(function() {
      document.getElementById('modalformsub').submit();
    });
  });

  function changeval() {
    var val = $("#kriteria option:selected").val();

    if (val === "3") {
      $("#cat").show();
    } else {
      $("#cat").hide();
      jQuery("select[name=kategori]").val(1);
    }
  };
</script>

</html>