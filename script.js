const searchInput = document.getElementById("search");
const cards = document.querySelectorAll(".card-time");

searchInput.addEventListener("input", function () {
  const searchValue = this.value.toLowerCase();

  cards.forEach(card => {
    const nomeTime = card.querySelector("h2").textContent.toLowerCase();
    card.style.display = nomeTime.includes(searchValue) ? "block" : "none";
  });
});