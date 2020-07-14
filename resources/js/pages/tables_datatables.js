/*
 *  Document   : tables_datatables.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Plugin Init Example Page
 */

// DataTables, for more examples you can check out https://www.datatables.net/
class pageTablesDatatables {
    /*
     * Init DataTables functionality
     *
     */
    static initDataTables() {
        // Override a few DataTable defaults
        jQuery.extend( jQuery.fn.dataTable.ext.classes, {
            sWrapper: "dataTables_wrapper dt-bootstrap4"
        });

        // Init full DataTable
        jQuery('.js-dataTable-full').dataTable({
            pageLength: 10,
            lengthMenu: [[5, 10, 20], [5, 10, 20]],
            autoWidth: false,
            buttons: [
                {
                    extend: 'copy',
                    className: 'btn-default',
                    text: 'Copiar',
                    exportOptions: {
                        columns: [1,2,3,4]
                    }
                },
                {
                    extend: 'csv',
                    className: 'btn-default',
                    text: 'CSV',
                    exportOptions: {
                        columns: [1,2,3,4]
                    }
                },
                {
                    extend: 'excel',
                    className: 'btn-default',
                    text: 'Excel',
                    exportOptions: {
                        columns: [1,2,3,4]
                    }
                },
                {
                    extend: 'pdf',
                    className: 'btn-default',
                    text: 'PDF',
                    exportOptions: {
                        columns: [1,2,3,4]
                    }
                },
                {
                    extend: 'print',
                    className: 'btn-default',
                    text: 'Imprimir',
                    exportOptions: {
                        columns: [1,2,3,4]
                    }
                },
                {
                    extend: 'colvis',
                    className: 'btn-default',
                    text: 'Visibilidad de Columnas',
                    exportOptions: {
                        columns: ':visible'
                    }
                }
            ]
        });
    }

    /*
     * Init functionality
     *
     */
    static init() {
        this.initDataTables();
    }
}

// Initialize when page loads
jQuery(() => { pageTablesDatatables.init(); });
