$(document).ready(function () {
  fetch("/api/v1/dashboard/get-details-dashboard")
    .then((response) => response.json())
    .then((data) => {
      document.getElementById("totalAssets").textContent =
        data.totalAssets || 0;
      document.getElementById("totalLaptops").textContent =
        data.totalLaptops || 0;
      document.getElementById("totalDesktops").textContent =
        data.totalDesktops || 0;
      document.getElementById("totalUsers").textContent = data.totalUsers || 0;
    })
    .catch((error) => {
      console.error("Error fetching dashboard data:", error);
    });
});
