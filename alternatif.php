<!DOCTYPE html>
<?php

require_once "app/Alternatif.php";

$alt = new App\Alternatif();
$rows = $alt->tampil();
$kategory = $alt->get_category();

$page = "alternatif";
include "header.php";
include "sidebar.php";
// content
include "pages/alternatif/index.php";
include "footer.php";
?>
<script>
  $("body").on("click", ".btn-add", function() {
    jQuery("#formalternatif").attr("action", "pages/alternatif/simpan.php");
    jQuery("#compose .modal-title").html("Tambah Data Testing");
    jQuery("#compose").modal("toggle");
  })
  $("body").on("click", ".btn-simpan", function() {
    Swal.fire(
      'Data Disimpan!',
      '',
      'success'
    ).then(function() {
      $('#formalternatif').submit();
    });

  });
  $("body").on("click", ".btn-update", function() {
    Swal.fire(
      'Data Disimpan!',
      '',
      'success'
    ).then(function() {
      $('#formeditalternatif').submit();
    });

  });
  $("body").on("click", ".btn-edit", function() {
    var id = jQuery(this).attr("data-id");
    var data;
    $.ajax({
      type: 'GET',
      url: "pages/alternatif/get_json.php?id=" + id,
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
          jQuery("#formeditalternatif input[name=kode]").val(row.kode);
          jQuery("#formeditalternatif input[name=ahass]").val(row.ahass);
          jQuery("#formeditalternatif input[name=t1]").val(row.t1);
          jQuery("#formeditalternatif input[name=t2]").val(row.t2);
          jQuery("#formeditalternatif input[name=t3]").val(row.t3);
          jQuery("#formeditalternatif input[name=t4]").val(row.t4);
          jQuery("#formeditalternatif input[name=t5]").val(row.t5);
          jQuery("#formeditalternatif select[name=kategori]").val(row.id_kategori);
          //alert(row.nama);
          //alert(row.no_kk);
        })
      }
    });

    jQuery("#formeditalternatif").attr("action", "pages/alternatif/simpan.php?id=" + id);
    jQuery("#editalternatif .modal-title").html("Update Data Alternatif");
    jQuery("#editalternatif").modal("toggle");
  });
</script>

</html>