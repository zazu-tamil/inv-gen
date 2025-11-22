<link
  rel="stylesheet"
  href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css"
/>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
  jQuery(function ($) {
    // Initialize DataTable
    if ($.fn.DataTable.isDataTable("#company_bank_list")) {
      $("#company_bank_list").DataTable().destroy();
    }
    var table = $("#company_bank_list").DataTable({
      paging: true,
      lengthChange: true,
      searching: true,
      ordering: true,
      info: true,
      autoWidth: true,
      language: {
        emptyTable: "No records found",
      },
    });

    // Edit Record
    $(document).on("click", ".edit_record", function () {
      let bankId = $(this).val();
      let $editModal = $("#edit_modal");
      $.ajax({
        url: "<?= site_url('get-data'); ?>",
        type: "POST",
        data: { tbl: "company_bank_info", id: bankId },
        dataType: "json",
        success: function (d) {
          console.log(d);
          $("#edit_modal #bank_id").val(d.bank_id);
          $("#edit_modal #bank_name").val(d.bank_name);
          $("#edit_modal #company").val(d.company);
          $("#edit_modal #branch").val(d.branch);
          $("#edit_modal #account_type").val(d.account_type);
          $("#edit_modal #account_no").val(d.account_no);
          $("#edit_modal #IFSC_code").val(d.IFSC_code);
          $("#edit_modal #qr_code").val(d.qr_code);
          $("#edit_modal #remarks").val(d.remarks);
          $('#edit_modal input:radio[value="' + d.status + '"]').prop(
            "checked",
            true
          );
        },
        error: function (xhr, status, error) {
          console.error("AJAX Error:", xhr.status, status, error);
          alert("Error fetching bank info: " + error);
        },
      });
    });

    // QR Code Preview for Add Modal
    $("#add_modal #qr_code").change(function () {
      readImage(this, "#add_modal #qr_code_img_preview");
    });

    // QR Code Preview for Edit Modal
    $("#edit_modal #qr_code").change(function () {
      readImage(this, "#edit_modal #qr_code_img_preview");
    });

    function readImage(input, targetImg) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
          $(targetImg).attr("src", e.target.result).show();
        };
        reader.onerror = function () {
          console.error("Error reading image file");
          $(targetImg).hide();
        };
        reader.readAsDataURL(input.files[0]);
      } else {
        $(targetImg).hide();
      }
    }
    $(document).on("click", ".del_record", function () {
      let id = $(this).val();
      if (confirm("Are you sure you want to delete?")) {
        $.ajax({
          url: "<?php echo site_url('delete-record'); ?>",
          type: "post",
          data: { tbl: "company_bank_info", id: id },
          success: function (d) {
            alert(d);
            location.reload();
          },
        });
      }
    });
  });
</script>
