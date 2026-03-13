const buttons = document.querySelectorAll(
  ".list-group-item.list-group-item-action",
);

document.addEventListener("DOMContentLoaded", () => {
  const params = new URLSearchParams(window.location.search);
  const categoryId = params.get("categoryId");

  buttons.forEach((button) => {
    if (button.dataset.categoryId === categoryId) {
      button.classList.add("active");
    }
  });

  if (categoryId) {
    loadProducts(categoryId);
  }
});

buttons.forEach((button) => {
  button.addEventListener("click", () => {
    buttons.forEach((button) => button.classList.remove("active"));
    button.classList.add("active");

    const categoryId = button.dataset.categoryId;
    const url = new URL(window.location);
    url.searchParams.set("categoryId", categoryId);
    window.history.pushState({}, "", url);

    loadProducts(categoryId);
  });
});

function loadProducts(categoryId) {
  fetch(`/src/Controllers/CategoryController.php?categoryId=${categoryId}`)
    .then((res) => res.json())
    .then((products) => {
      const productsBlock = document.querySelector(".products");
      productsBlock.innerHTML = "";

      products.forEach((product) => {
        productsBlock.innerHTML += `
            <div class="card">
                <img src="/src/assets/img/${product.photo}" class="card-img-top" alt="Product photo">
                  <div class="card-body">
                      <h5 class="card-title">${product.name}</h5>
                      <div class="info">
                        <span class="price">$${product.price}</span>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#productModal" data-product-name="${product.name}">
                            Купить
                        </button>
                      </div>
                      <span class="date">Опубліковано: ${product.date}</span>
                  </div>
            </div>
          `;
      });
    });
}
