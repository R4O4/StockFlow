let navBtn = document.querySelector(".nav-container button");
let fridgeBtn = document.querySelector(".nav-fridge");
let freezerBtn = document.querySelector(".nav-freezer");

let queryString = window.location.search;
let urlParams = new URLSearchParams(queryString);
let cat = urlParams.get('cat')

switch (cat) {
  case null: {
    let newUrl = new URL(window.location.href);
    newUrl.searchParams.set('cat', 'fridge');
    break;
  }
  case "fridge": {
    cat = "fridge";
    fridgeBtn.style.backgroundColor = "rgba(134, 134, 134, 0.56)";
    break;
  }
  case "freezer": {
    cat = "freezer";
    freezerBtn.style.backgroundColor = "rgba(134, 134, 134, 0.56)";
    break;
  }
}

function changeCategory(category) {
  let newUrl = new URL(window.location.href);
  newUrl.searchParams.set('cat', category);
  window.location.href = newUrl;
}