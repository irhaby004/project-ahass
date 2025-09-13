<!DOCTYPE html>
<?php

require_once "app/Users.php";

$alt = new App\Users();
$rows = $alt->tampil();
$alternatif = $alt->get_alternatif();
$page = "users";
include "header.php";
include "sidebar.php";
// content
include "pages/users/index.php";
include "footer.php";
?>
<script>
  $("body").on("click", ".btn-add", function() {
    kosongkan();
    jQuery("#formeditusers").attr("action", "pages/users/simpan.php");
    jQuery("#compose .modal-title").html("Tambah Data Users");
    jQuery("#compose").modal("toggle");
  })
  $("body").on("click", ".btn-simpan", function() {
    Swal.fire(
      'Data Disimpan!',
      '',
      'success'
    ).then(function() {
      $('#formeditusers').submit();
    });

  });

  $("body").on("click", ".btn-edit", function() {

    var id = jQuery(this).attr("data-id");
    var data;
    $.ajax({
      type: 'GET',
      url: "pages/users/get_json.php?id=" + id,
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
          jQuery("select[name=level]").val(row.level);
          jQuery("input[name=username]").val(row.username);
          jQuery("input[name=nama]").val(row.nama);
          jQuery("select[name=alternatif]").val(row.id_alternatif);

          //alert(row.id_kriteria);
          //alert(row.no_kk);
        })
      }
    });

    jQuery("#formeditusers").attr("action", "pages/users/simpan.php?id=" + id);
    jQuery("#compose .modal-title").html("Update Data Users");
    jQuery("input[name=pass]").attr("placeholder", "Kosongkan Jika tidak Diubah");
    jQuery("#compose").modal("toggle");
  });


  function kosongkan() {
    jQuery("select[name=alternatif]").val("0");
    jQuery("select[name=level]").val("User");
    jQuery("input[name=username]").val("");
    jQuery("input[name=nama]").val("");
    jQuery("input[name=pass]").attr("placeholder", "Masukkan Password");
  }
</script>

</html>