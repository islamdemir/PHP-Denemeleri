// Sayfayı yukarı ve yumuşak kaydırma
// HTML'de bir elementin ID'si "topButton"
let topButton = document.getElementById("topButton");

// Elemente tıklanma olayını dinleyen bir olay dinleyicisi
topButton.addEventListener("click", function () {
  window.scrollTo({ top: 0, behavior: "smooth" });
});
// sayfa kaydırma end

// Hamburger tıklandığında navsize değiştirme
function toggleHeaderHeight() {
  let menuToggle = document.getElementById("menu-toggle");
  let header = document.querySelector("header");
  let navbar = document.querySelector("nav");

  if (menuToggle.checked && window.innerWidth <= 540) {
    header.style.height = "350px";
    navbar.style.height = "350px";
  }
  else if (window.innerWidth <= 540) {
    header.style.height = "165px";
    navbar.style.height = "165px";
  }
  else {
    header.style.height = "100px";
    navbar.style.height = "100px"
  }
}
