$(document).ready( function () {
    $('#myTable').DataTable({
        "language": {
            "url": "http://localhost/estoque-escolar/js/datatableptbr.json"
        }
    });
    $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
    $('.telefone_add').mask('(00) 0000-0000');
    $('.dinheiro').mask("#.##0,00", {reverse: true});
    $('.peso').mask("000", {reverse: true});
    
} );