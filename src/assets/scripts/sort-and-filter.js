const buttons = document.querySelectorAll(
  ".list-group-item.list-group-item-action",
);
const select = document.getElementById("sort");
const defaultSort = "cheaper";

document.addEventListener("DOMContentLoaded", () => {
  const params = new URLSearchParams(window.location.search);
  const categoryId = params.get("categoryId");
  const sort = params.get("sort") ?? defaultSort;

  buttons.forEach((button) => {
    if (button.dataset.categoryId === categoryId) {
      button.classList.add("active");
    }
  });

  select.value = sort;

  const queryParams = { categoryId, sort };

  loadProducts(queryParams);
});

select.addEventListener("change", () => {
  const sort = select.value;

  createUrl("sort", sort);
  loadProducts({ sort });
});

buttons.forEach((button) => {
  button.addEventListener("click", () => {
    buttons.forEach((button) => button.classList.remove("active"));
    button.classList.add("active");

    const categoryId = button.dataset.categoryId;
    createUrl("categoryId", categoryId);
    loadProducts({ categoryId });
  });
});

function createUrl(key, value) {
  const url = new URL(window.location);
  url.searchParams.set(key, value);
  window.history.pushState({}, "", url);
}

function loadProducts(queryParams) {
  const categoryParam = queryParams.categoryId
    ? `&categoryId=${queryParams.categoryId}`
    : "";
  const sortParam = queryParams.sort ? `${queryParams.sort}` : defaultSort;

  fetch(
    `/src/Controllers/ProductsController.php?sort=${sortParam}${categoryParam}`,
  )
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
