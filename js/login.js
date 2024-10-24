const togglePassword = document.getElementById("toggle-password");
const passwordInput = document.getElementById("password");

togglePassword.addEventListener("click", () => {
  const currentType = passwordInput.getAttribute("type");
  console.log("Dsvds");
  if (currentType == "password") {
    passwordInput.setAttribute("type", "text");
    togglePassword.textContent = "Hide";
  } else {
    passwordInput.setAttribute("type", "password");
    togglePassword.textContent = "Show";
  }
});
