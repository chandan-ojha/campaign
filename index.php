<?php
$json_data = file_get_contents('./data/data.json');
$data = json_decode($json_data, true);

if (json_last_error() !== JSON_ERROR_NONE) {
    echo 'Error decoding JSON: ' . json_last_error_msg();
    exit;
}

$categories = isset($data['categories']) ? $data['categories'] : [];

if (empty($categories)) {
    echo 'No categories found';
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>NCC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="./css/style.css"/>
</head>
<body>
<!-- Modal HTML structure -->
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeModal">
            &times;
        </span>
        <div>
            <div class="hero-image" >
                <img src="./images/banner/banner2.png" alt="" class="img-fluid" />
            </div>
            <div>
                <div class="cat-container" id="catContainer">
                    <?php
                    foreach ($categories as $category) {
                        echo '<a class="cat-card" onclick="showBrands(\'' . $category['id'] . '\')" id="cat' . $category['id'] . '">';
                        echo '<img src="' . $category['image'] . '" alt="" />';
                        echo '<div class="cat-text">';
                        echo '<span >' . $category['name'] . '</span>';
                        echo '</div>';
                        echo '</a>';
                    }
                    ?>
                </div>
                <div class="brand-container" id="brandContainer">
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    


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
            }, 3000);
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

    const categories = <?php echo json_encode($categories); ?>;

    //show category wise brands
    function showBrands(cat_id) {
        //scroll to brand container
        document.querySelector(".brand-container").scrollIntoView({
            behavior: "smooth",
        });
        const brandContainer = document.getElementById("brandContainer");
        brandContainer.innerHTML = "";
        const selected_cat = categories.find((car) => car.id == (cat_id || categories[0].id));
        setActiveClass("cat" + selected_cat.id)
        const brands = selected_cat.brands;
        brands.forEach((brand) => {
            
            const brandCard = document.createElement("div");
            
            brandCard.classList.add("brand-card");
            if(selected_cat.id==5 || selected_cat.id==6 ) brandCard.style.minHeight = "365px";
            brandCard.innerHTML = `
            
              <img src="${brand.image}" alt="" />
              <div class="card-body">
              <div class="title-back">
              <h5 class="card-title">${brand.name}</h5>
              </div>
              <p class="card-text" >${brand.offer}</p>
              </div>
            </div>
          `;
            brandContainer.appendChild(brandCard);
        });
    }

    function setActiveClass(docId){
        // Get all elements with the class 'active'
        var activeElements = document.querySelectorAll('.active');

        // Loop through the NodeList of active elements and remove the 'active' class
        activeElements.forEach(function(element) {
        element.classList.remove('active');
        });

        const catLink = document.getElementById(docId);
        var spanElement = catLink.querySelector('span');

        if (spanElement.classList.contains('active')) {
        spanElement.classList.remove('active');
        } else {
        spanElement.classList.add('active');
        }

    }

    window.addEventListener('load', function () {
        showBrands();
    });
</script>
</body>
</html>
