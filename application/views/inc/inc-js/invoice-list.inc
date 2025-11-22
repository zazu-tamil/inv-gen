<script>
  $(document).on("click", ".del_record", function () {
    let id = $(this).val();
    alert(id);
    if (confirm("Are you sure you want to delete?")) {
      $.ajax({
        url: "<?php echo site_url('delete-record');?>",
        type: "post",
        data: { tbl: "invoice_info", id: id },
        success: function (d) {
          alert(d);
          location.reload();
        },
      });
    }
  });
</script>
