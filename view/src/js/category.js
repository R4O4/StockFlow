let category = document.getElementsByClassName("category");

category[0].style.borderRadius = "16px 16px 0 0";
category[category.length-1].style.borderRadius = "0 0 16px 16px";

if (category.length == 1) {
  category[0].style.borderRadius = "16px";
}