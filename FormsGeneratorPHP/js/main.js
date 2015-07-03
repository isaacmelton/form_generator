$('#addNew').on('click', function () {
    var clone = $('table.itemTable tr.cloneable:first').clone();
    clone.append("<td><div class='deleteAdded'>Remove</div></td>")
    $('table.itemTable').append(clone);
});