const modal = document.getElementById("productModal");

modal.addEventListener("show.bs.modal", function (event) {
  const button = event.relatedTarget;

  const name = button.dataset.productName;

  document.getElementById("modalProductName").textContent = name;
});
