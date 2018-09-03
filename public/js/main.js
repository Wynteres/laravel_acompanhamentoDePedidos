
$(document).ready(function() {
    $('#list-table').DataTable();
    $('#list-table-entrega').DataTable();
} );

function copyToClipboard() {
        var from = document.getElementById("chave-acesso");
        var range = document.createRange();
        window.getSelection().removeAllRanges();
        range.selectNode(from);
        window.getSelection().addRange(range);
        document.execCommand('copy');
        window.getSelection().removeAllRanges();
 }