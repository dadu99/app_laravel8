window.addEventListener('DOMContentLoaded', event => {
    // Simple-DataTables
    // https://github.com/fiduswriter/Simple-DataTables/wiki

    const datatablesSimple = document.getElementById('datatablesSimple');
    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple);

    }

});

// $(document).ready(function () {
//     $("#datatablesSimple").DataTable({
//         oLanguage: {
//             sSearch: 'Search Users',
//         },

//         language: {
//             info: "Se afiseaza pagina _PAGE_ din _PAGES_",

//             lengthMenu: "Afiseaza _MENU_ randuri / pagina",

//             paginate: {
//                 next: "Next",
//                 first: "First",
//                 last: "Last",
//                 previous: "Prev",
//             },
//         },
//     });
// });
