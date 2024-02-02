function refreshQuantityValue() {
  let quantitySelector = document.querySelector(".quantity-selector");
  let quantityLabel = document.querySelector(".quantity-p");
  quantityLabel.innerHTML = quantitySelector.value;
}

function selectCurrentOptions() {
  let catSelector = document.querySelector(".category-selector");
  let subCatSelector = document.querySelector(".subcat-selector");
  let placeSelector = document.querySelector(".place-selector");

  switch (catSelector.value) {
    case "fridge": {
      catSelector.selectedIndex = 0;
    }
    case "freezer": {
      catSelector.selectedIndex = 1;
    }
  }

  switch (subCatSelector.value) {
    case "viandes_rouge": {
      subCatSelector.selectedIndex = 0;
    }
    case "volailles": {
      subCatSelector.selectedIndex = 1;
    }
    case "porc": {
      subCatSelector.selectedIndex = 2;
    }
    case "poissons": {
      subCatSelector.selectedIndex = 3;
    }
    case "autre": {
      subCatSelector.selectedIndex = 4;
    }
  }
}

refreshQuantityValue();
selectCurrentOptions();
