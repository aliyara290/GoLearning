const userPic = document.querySelectorAll(".user__pic-nav");
const setMenu = document.querySelectorAll(".acc_menu");

userPic.forEach((pic, index) => {
  pic.addEventListener("click", () => {
        setMenu[index].classList.toggle("active");
  });
});
const menuDots = document.querySelectorAll(".dots_port");
const menuList = document.querySelectorAll(".mn_btns");

menuDots.forEach((dot, index) => {
  dot.addEventListener("click", (e) => {
    e.preventDefault();
    e.stopPropagation();
    menuList[index].classList.toggle("active");
  });
});

// custom file input
const fileInputs = document.querySelectorAll('.file-input');
const fileNames = document.querySelectorAll('.file-name');

fileInputs.forEach((fileInput, index) => {
  fileInput.addEventListener('change', function () {
    if (this.files && this.files[0]) {
      fileNames[index].textContent = this.files[0].name;
      console.log(fileNames[index].textContent = this.files[0].name);
    } else {
      fileNames[index].textContent = 'No file chosen';
    }

  });
});

function liveSearch() {
  const query = document.getElementById('searchQuery').value.trim();
  const resultsContainer = document.getElementById('searchResults');

  if (query.length > 4) {
    fetch(`./index.php?q=${encodeURIComponent(query)}`)
      .then(response => response.text())
      .then(data => {
        resultsContainer.innerHTML = data;
      })
      .catch(error => {
        console.error('Error fetching search results:', error);
        resultsContainer.innerHTML = '<p>An error occurred while searching.</p>';
      });
  } else {
    resultsContainer.innerHTML = '';
  }
}


// new course page 

const selectOption = document.querySelectorAll(".select__choix");
const videoOption = document.querySelectorAll(".video__option");
const videoOptionInput = document.querySelectorAll(".video__option .clr_vl");
const textOption = document.querySelectorAll(".text__option");
const textOptionTextarea = document.querySelectorAll(".text__option .clr_vl");

selectOption.forEach((opt, index) => {
  opt.addEventListener("change", () => {
    let value = opt.value;
    switch (value) {
      case "video":
        videoOption[index].classList.add("active");
        textOption[index].classList.remove("active");
        textOptionTextarea.value = "";
        break;
        case "text":
          videoOption[index].classList.remove("active");
        textOption[index].classList.add("active");
        videoOptionInput.textContent = "";

        break;
      }
    });
  });
console.log("hey");