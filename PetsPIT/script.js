// pra quando a pessoa clica no botão de "aceitar, mostrando q o termo foi aceito"
function setCookieAccepted() {
  localStorage.setItem("cookieAccepted", "true");
  hideCookieBanner();
}

// fecha o banner de cookis
function hideCookieBanner() {
  const cookieBanner = document.getElementById("cookie-banner");
  cookieBanner.style.display = "none";
}

//  verifica se o item "cookieAccepted" existe
document.addEventListener("DOMContentLoaded", function () {
  const acceptBtn = document.getElementById("accept-btn");

  acceptBtn.addEventListener("click", function () {
    setCookieAccepted();
  });

  const isCookieAccepted = localStorage.getItem("cookieAccepted");

  if (!isCookieAccepted) {
    const cookieBanner = document.getElementById("cookie-banner");
    cookieBanner.style.display = "block";
  }
});
