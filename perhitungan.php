<!DOCTYPE html>
<?php 

      require_once "app/Hasil.php";
      
      $alt = new App\Hasil();
      $countdata = $alt->countalt();
      $thee1 = $alt->derajat();
      $thee2 = $alt->getMMULT();
      $thee3 = $alt->preferensi();
      $thee4 = $alt->LF(1);
      $thee5 = $alt->EF(1);
      $thee6 = $alt->NF();
      
      $page = "perhitungan";
      include "header.php";
      include "sidebar.php"; 
      // content
      include "pages/perhitungan/index.php";
      include "footer.php";
  ?>
<script>
/* Saat pengguna mengklik tombol,
toggle antara menyembunyikan dan menampilkan konten dropdown */
function ahp1() {
  document.getElementById("ahp1").classList.toggle("show");
}
function ahp2() {
  document.getElementById("ahp2").classList.toggle("show");
}
function ahp3() {
  document.getElementById("ahp3").classList.toggle("show");
}
function thee1() {
  document.getElementById("thee1").classList.toggle("show");
}
function thee2() {
  document.getElementById("thee2").classList.toggle("show");
}
function thee3() {
  document.getElementById("thee3").classList.toggle("show");
}
function thee4() {
  document.getElementById("thee4").classList.toggle("show");
}
function thee5() {
  document.getElementById("thee5").classList.toggle("show");
}
function thee6() {
  document.getElementById("thee6").classList.toggle("show");
}
/* Tutup dropdown jika pengguna mengklik di luarnya
window.onclick = function(event) {
  if (!event.target.matches('.dropbtnbaru')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
*/
</script>

</html>