const buttons = document.querySelectorAll(
  ".list-group-item.list-group-item-action",
);

buttons.forEach((button) =>
  button.addEventListener("click", () => {
    buttons.forEach((button) => button.classList.remove("active"));
    button.classList.add("active");
  }),
);
