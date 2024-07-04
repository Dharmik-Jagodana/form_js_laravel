// SweetAlert
$('body').on('click','.delete_crud',function(e) {
    e.preventDefault();

    var href = $(this).attr('href');
    var message = $(this).data('confirm');

    // pop up
    swal({
        title: `Are you sure you want to delete this record?`,
        text: "If you delete this, it will be gone forever.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            $(this).closest('form').submit();
        }
    });
});