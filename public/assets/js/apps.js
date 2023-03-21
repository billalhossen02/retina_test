// toggle btn dashboard
{
    let dashBtn = document.getElementById("dashboard_toggle");
    let sideBar = document.getElementById("dashboard_sidebar");

    dashBtn.addEventListener("click", function () {
      sideBar.classList.toggle("activeSidebar");
      this.classList.toggle("activeToggle");
    });
  }
