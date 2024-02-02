// AJAX Pulsar request
function searchHomeItem(search) {
  let xhr= null;
  let item = document.querySelector(".home-categories");

  if (document.querySelector(".search-home-input").value !== "") {
    document.querySelector(".home-search-form").submit();

    if (window.XMLHttpRequest) {
      xhr = new XMLHttpRequest();
    }
    else if (window.ActiveXObject)
    {
      xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
    //on appelle le fichier reponse.txt
    xhr.open("GET", `http://stockflow.cloud/StockFlow/view/src/ajax/searchHomeItem.php?searh=${search}`, false);
    xhr.send(null);

    item.innerHTML = xhr.responseText;
  } else {
    return false;
  }
}


searchHomeItem();