$(document).ready(function () {
  // DOKTER
  $("#dokter").DataTable({
    dom: "Bfrtip",
    buttons: [
      "pageLength",
      {
        extend: "pdf",
        orientation: "potrait",
        pageSize: "Legal",
        title: "Data Dokter",
        download: "open",
      },
      "excel",
      "print",
    ],
  });

  // PASIEN
  $("#pasien").DataTable({
    dom: "Bfrtip",
    buttons: [
      "pageLength",
      {
        extend: "pdf",
        orientation: "potrait",
        pageSize: "Legal",
        title: "Data Pasien",
        download: "open",
      },
      "excel",
      "print",
    ],
  });

  // POLIKLINIK
  $("#poliklinik").DataTable({
    dom: "Bfrtip",
    buttons: [
      "pageLength",
      {
        extend: "pdf",
        orientation: "potrait",
        pageSize: "Legal",
        title: "Data Poliklinik",
        download: "open",
      },
      "excel",
      "print",
    ],
  });

  // PENDAFTARAN
  $("#pendaftaran").DataTable({
    dom: "Bfrtip",
    buttons: [
      "pageLength",
      {
        extend: "pdf",
        orientation: "potrait",
        pageSize: "Legal",
        title: "Data Pendaftaran",
        download: "open",
      },
      "excel",
      "print",
    ],
  });
});
