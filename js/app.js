$(document).ready( function () {
    $('#myTable').DataTable();
    $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
    $('.telefone_add').mask('(00) 0000-0000');

} );