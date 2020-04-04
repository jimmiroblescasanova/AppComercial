<script>
    $('#dataTable').DataTable({
        language: {
            url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        info: false,
        responsive: {
            details: {
                type: 'column'
            }
        },
        columnDefs: [{
            className: 'control',
            orderable: false,
            targets: 0
        }],
        // order: [1, 'DESC'],
    });
</script>
