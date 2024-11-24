$(document).ready(function () {
  // Initialize DataTable
  $("#assetsTable").DataTable({
    paging: true,
    searching: true,
    ordering: false,
    responsive: true,
    lengthChange: true,
    initComplete: function () {
      const api = this.api();
      const updatePagination = function () {
        const pageInfo = api.page.info();
        const currentPage = pageInfo.page;
        const totalPages = pageInfo.pages;

        let paginationHtml = `
            <button class="btn btn-light" data-action="prev" ${
              currentPage === 0 ? "disabled" : ""
            }>
              <i class="bi bi-chevron-double-left"></i> Previous
            </button>
          `;

        for (let i = 0; i < totalPages; i++) {
          if (
            i === 0 ||
            i === totalPages - 1 ||
            Math.abs(currentPage - i) < 2
          ) {
            paginationHtml += `<button class="btn btn-light page-button" data-page="${i}">${
              i + 1
            }</button>`;
          } else if (Math.abs(currentPage - i) === 2) {
            paginationHtml += `<span class="dots">...</span>`;
          }
        }

        paginationHtml += `
            <button class="btn btn-light" data-action="next" ${
              currentPage === totalPages - 1 ? "disabled" : ""
            }>
              Next <i class="bi bi-chevron-double-right"></i>
            </button>
          `;

        $(".dataTables_paginate").html(`
            <div class="pagination justify-content-center">${paginationHtml}</div>
          `);

        $(".page-button")
          .off("click")
          .on("click", function () {
            const page = $(this).data("page");
            api.page(page).draw(false);
            updatePagination();
          });

        $('[data-action="prev"]')
          .off("click")
          .on("click", function () {
            api.page("previous").draw(false);
            updatePagination();
          });

        $('[data-action="next"]')
          .off("click")
          .on("click", function () {
            api.page("next").draw(false);
            updatePagination();
          });
      };

      updatePagination();
    },
  });

  // Create Asset
  $("#createAssetsBtn").on("click", function () {
    const form = document.getElementById("assetsForm");
    if (!form) return;

    const formData = new FormData(form);

    fetch("/api/v1/assets/add-assets", {
      method: "POST",
      headers: {
        "X-CSRF-TOKEN": "{{ csrf_token() }}",
      },
      body: formData,
    })
      .then((response) => response.json())
      .then((data) => {
        const toastType = data.status === 200 ? "success" : "error";
        Livewire.dispatch("toast", [toastType, data.message]);
        setTimeout(() => {
          $("#addAssetsModal").modal("hide");
          window.location.reload();
        }, 1000);
      })
      .catch((error) => {
        Livewire.dispatch("toast", ["error", error.message]);
        setTimeout(() => {
          $("#addAssetsModal").modal("hide");
          window.location.reload();
        }, 1000);
      });
  });

  // View details
  document.querySelectorAll(".view-assets").forEach((button) => {
    button.addEventListener("click", function () {
      const assetsId = button.getAttribute("data-id");

      if (!assetsId) return;

      fetch(`/api/v1/assets/get-assets-details/${assetsId}`)
        .then((response) => response.json())
        .then((assetsData) => {
          if (assetsData) {
            document.getElementById("view_computer_name").value =
              assetsData.computer_name || "";
            document.getElementById("view_serial_number").value =
              assetsData.serial_number || "";
            document.getElementById("view_model").value =
              assetsData.model || "";
            document.getElementById("view_description").value =
              assetsData.description || "";

            const typeDropdown = document.getElementById("view_type");
            Array.from(typeDropdown.options).forEach((option) => {
              if (option.text === assetsData.type) {
                typeDropdown.value = option.value;
              }
            });

            const manufacturerDropdown =
              document.getElementById("view_manufacturer");
            Array.from(manufacturerDropdown.options).forEach((option) => {
              if (option.text === assetsData.manufacturer) {
                manufacturerDropdown.value = option.value;
              }
            });

            const osDropdown = document.getElementById("view_os");
            Array.from(osDropdown.options).forEach((option) => {
              if (option.text === assetsData.os) {
                osDropdown.value = option.value;
              }
            });

            $(".selectpicker").selectpicker("refresh");
            $("#viewAssetsModal").modal("show");
          }
        })
        .catch((error) => {
          console.error("Error fetching assets details:", error);
        });
    });
  });

  // Get for Edit Buttons
  $(document).on("click", ".edit-assets", function () {
    const assetsId = $(this).data("id");
    if (!assetsId) return;

    fetch(`/api/v1/assets/get-assets-details/${assetsId}`)
      .then((response) => response.json())
      .then((assetsData) => {
        if (assetsData) {
          $("#edit_computer_name").val(assetsData.computer_name);
          $("#edit_serial_number").val(assetsData.serial_number);
          $("#edit_model").val(assetsData.model);
          $("#edit_description").val(assetsData.description);

          $("#edit_type option")
            .filter(
              (_, option) => $(option).text().trim() === assetsData.type.trim()
            )
            .prop("selected", true);

          $("#edit_manufacturer option")
            .filter(
              (_, option) =>
                $(option).text().trim() === assetsData.manufacturer.trim()
            )
            .prop("selected", true);

          $("#edit_os option")
            .filter(
              (_, option) => $(option).text().trim() === assetsData.os.trim()
            )
            .prop("selected", true);

          $(".selectpicker").selectpicker("refresh");
          $("#editAssetsModal").modal("show");

          document
            .getElementById("editAssetsForm")
            .setAttribute("data-id", assetsData.id);
        }
      })
      .catch((error) => {
        console.error("Error fetching assets details:", error);
      });
  });

  // Edit event
  document
    .getElementById("editAssetsBtn")
    .addEventListener("click", function () {
      const form = document.getElementById("editAssetsForm");
      const assetsId = form.getAttribute("data-id");

      const formData = new FormData(form);

      fetch(`/api/v1/assets/edit-assets-details/${assetsId}`, {
        method: "POST",
        headers: {
          "X-CSRF-TOKEN": "{{ csrf_token() }}",
        },
        body: formData,
      })
        .then((response) => response.json())
        .then((data) => {
          if (data.success === 200) {
            Livewire.dispatch("toast", ["success", data.message]);

            setTimeout(() => {
              $("#editAssetsModal").modal("hide");

              window.location.reload();
            }, 1000);
          } else {
            Livewire.dispatch("toast", ["error", data.message]);

            setTimeout(() => {
              $("#editAssetsModal").modal("hide");

              window.location.reload();
            }, 1000);
          }
        })
        .catch((error) => {
          console.error("Error updating assets:", error);

          Livewire.dispatch("toast", ["error", error]);

          setTimeout(() => {
            window.location.reload();
          }, 1000);
        });
    });

  // Delete Assets
  $(".delete-assets").each(function () {
    $(this).on("click", function () {
      const assetsId = $(this).data("id");

      $("#confirmDeleteAssets").data("id", assetsId);

      $("#confirmDeleteAssets")
        .off("click")
        .on("click", function () {
          if (assetsId) {
            fetch(`/api/v1/assets/delete-assets/${assetsId}`, {
              method: "DELETE",
              headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": csrf,
              },
            })
              .then((response) => {
                if (!response.ok) {
                  throw new Error("Network response was not ok");
                }
                return response.json();
              })
              .then((data) => {
                if (data.success) {
                  Livewire.dispatch("toast", ["success", data.success]);
                  $("#deleteAssetsModal").modal("hide");

                  setTimeout(() => {
                    window.location.reload();
                  }, 1000);
                } else {
                  Livewire.dispatch("toast", ["error", data.error]);
                  $("#deleteAssetsModal").modal("hide");

                  setTimeout(() => {
                    window.location.reload();
                  }, 1000);
                }
              })
              .catch((error) => {
                console.error(
                  "There was a problem with the fetch operation:",
                  error
                );

                Livewire.dispatch("toast", ["error", data.error]);
                $("#deleteAssetsModal").modal("hide");

                setTimeout(() => {
                  window.location.reload();
                }, 1000);
              });
          }
        });
    });
  });
});
