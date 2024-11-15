  function platire() {
    window.location.href = "http://localhost/platatest.html";
  }

  function conectare() {
    window.location.href = "conectare.html";
  }
  document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("paymentForm").addEventListener("submit", function (event) {
    var expiryDateInput = document.getElementById("expiryDate");
    var currentDate = new Date();
    var currentYear = currentDate.getFullYear() % 100; // extrage ultimele două cifre ale anului
    var currentMonth = currentDate.getMonth() + 1; // lunile sunt indexate de la 0

    // Obține valoarea introdusă pentru data expirării și separă luna și anul
    var inputDate = expiryDateInput.value.split("/");
    var inputMonth = parseInt(inputDate[0], 10);
    var inputYear = parseInt(inputDate[1], 10);

    // verificare dacă anul și luna introduse sunt valide
    if (inputYear < currentYear || (inputYear === currentYear && inputMonth > 12) || inputMonth < 1) {
      alert("Data expirării introdusă nu este validă.");
      event.preventDefault(); // oprire trimitere formular
    }
  });
});
