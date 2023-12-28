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
    }, 5000);
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

// jquery if you need to use it instead of vanilla js

// $(document).ready(function () {
//     const modal = $("#myModal");
//     const closeModalButton = $("#closeModal");

//     // Check if the modal has been shown before using session storage
//     if (!localStorage.getItem("modalShown") && !sessionStorage.getItem("modalShown")) {
//         // Set a timeout to display the modal after 5-10 seconds (5000-10000 milliseconds)
//         setTimeout(function () {
//             modal.css("display", "block");
//         }, 5000);

//         // Set a flag in both local storage and session storage
//         // localStorage.setItem("modalShown", "true");
//         // sessionStorage.setItem("modalShown", "true");
//     }

//     closeModalButton.on("click", function () {
//         modal.css("display", "none");
//     });

//     $(window).on("click", function (event) {
//         if (event.target == modal[0]) {
//             modal.css("display", "none");
//         }
//     });
// });
