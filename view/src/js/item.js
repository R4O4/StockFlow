function refreshQuantityValue() {
  let quantiySelector = document.querySelector(".quantity-selector");
  let quantityLabel = document.querySelector(".quantity-p");
  quantityLabel.innerHTML = quantiySelector.value;
}

function selectCurrentOptions() {
  let catSelector = document.querySelector(".category-selector");
  let subCatSelector = document.querySelector(".subcat-selector");
  let placeSelector = document.querySelector(".place-selector");
}

refreshQuantityValue();
selectCurrentOptions();
