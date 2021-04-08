// Call the dataTables jQuery plugin
$(document).ready(function () {
  $('#dataTable').DataTable();

  // table.on('click', '.edit', function () {
  //   alert(11111);
  //   var tr = $(this).closest('tr');

  //   console.log(tr);
  //   if ($(tr).hasClass('child')) {
  //     tr = tr.prev('.parent');
  //   }

  //   var data = table.row($tr).data();
  //   console.log(data);

  //   $('#name').val(data[1]);

  //   $('#editForm').attr('action', '/user/' + data[0]);
  //   $('#myModal').modal('show');
  // });
});
