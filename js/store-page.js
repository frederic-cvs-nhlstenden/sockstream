function loadStore(storeType) {
  const xhr = new XMLHttpRequest();
  xhr.open("GET", `store_content/${storeType}.php`, true);
  xhr.onload = function () {
    if (this.status === 200) {
      document.getElementById("product-grid").innerHTML = this.responseText;
      document.body.style.backgroundImage =
        storeType === "seasonal"
          ? "url('../assets/images/sunny_illustrations/png/background-seasonal.png')"
          : "url('../assets/images/sunny_illustrations/png/background-socks.png')";
      document.querySelector(".sidebar").style.backgroundColor =
        storeType === "seasonal"
          ? "var(--color-purple-100)"
          : "var(--color-blue-100)";
    }
  };
  xhr.send();
}

window.onload = function () {
  const urlParams = new URLSearchParams(window.location.search);
  const storeType = urlParams.get("storeType") || "classic";
  loadStore(storeType);
};
