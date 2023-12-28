document.addEventListener("DOMContentLoaded", function () {
  const modal = document.getElementById("myModal");
  const closeModalButton = document.getElementById("closeModal");

  // Check if the modal has been shown before using session storage
  if (
    !localStorage.getItem("modalShown") &&
    !sessionStorage.getItem("modalShown")
  ) {
    // Set a timeout to display the modal after 5-10 seconds (5000-10000 milliseconds)
    setTimeout(function () {
      modal.style.display = "block";
    }, 500);
  }

  closeModalButton.addEventListener("click", function () {
    modal.style.display = "none";
  });

  window.addEventListener("click", function (event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  });
});
