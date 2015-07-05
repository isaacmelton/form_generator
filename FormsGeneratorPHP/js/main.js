$('#add_question').click( function() {
    $(".cloneable")
        .clone()
        .insertBefore( $("#add_question"));
});