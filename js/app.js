const searchInput = document.querySelector("#search")
const searchResult = document.querySelectorAll(".names")


searchInput.addEventListener("keyup", (e) => {

  searchResult.forEach((elt,i) => {
    const row = elt.parentElement;
    if (elt.innerHTML.toLocaleLowerCase().includes(e.target.value.toLocaleLowerCase())){
      row.style.display = 'table-row';
    }else {
      row.style.display = 'none'
    }

  })
})