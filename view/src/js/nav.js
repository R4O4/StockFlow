let navBtn = document.querySelector(".nav-container button");

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
    break;
  }
  case "freezer": {
    cat = "freezer";
    break;
  }
}

