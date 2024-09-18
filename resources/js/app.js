import './bootstrap';

import Alpine from 'alpinejs';
import $ from 'jquery';

// Importar estilos y scripts de Select2
import 'select2';
import 'select2/dist/css/select2.min.css';

// Importar estilos y scripts de DataTables
import 'datatables.net-bs4';
import 'datatables.net-bs4/css/dataTables.bootstrap4.css';


// Importar SweetAlert2
import Swal from 'sweetalert2';

window.Alpine = Alpine;
Alpine.start();

window.Swal = Swal;
window.$ = window.jQuery = $;

$(document).ready(function() {
    // Inicializar Select2
    $('.select2').select2();
    
    // Inicializar DataTables
    $('#example').DataTable();
});
