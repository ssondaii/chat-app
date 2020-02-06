$( function() {
    let form_submit = $('#formUpdateRolePermission');
    let btn_save    = $('#btn_save_role_permission');
    let left        = $('#sortable1');
    let right       = $('#sortable2');

    left.sortable({
        connectWith: ".connectedSortable",
        placeholder: "class-highlight-placeholder",
        start : function(event, ui){
            //get current element being sorted( before drop)
            // $(ui.item)
        },
        stop : function(event, ui){
            //when drag element from left and drop to right
            if(right.has($(ui.item)).length){ // check if right has element from left
                $(ui.item).find('input[name ="list_check_permission[]"]').prop( "checked", false );
                console.log($(ui.item).find('input[name ="list_id_permission[]"]').val());
            }
        }
    }).disableSelection();

    right.sortable({
        connectWith: ".connectedSortable",
        placeholder: "class-highlight-placeholder",
        start : function(event, ui){
            //get current element being sorted( before drop)
            // $(ui.item)
        },
        stop : function(event, ui){
            //when drag element from right and drop to left
            if(left.has($(ui.item)).length){// check if left has element from right
                $(ui.item).find('input[name ="list_check_permission[]"]').prop('checked', true);
                console.log($(ui.item).find('input[name ="list_id_permission[]"]').val());
            }
        }
    }).disableSelection();

    //when drop element to left zone.
    left.droppable({
        over: function( event, ui ) {
            //when element hover left zone
        },
        out: function( event, ui ) {
            //when element out of left zone
        },
        drop: function( event, ui ) {
            //when element drop to left zone
        }
    });

    //when drop element to right zone.
    right.droppable({
        over: function( event, ui ) {
            //when element hover right zone
        },
        out: function( event, ui ) {
            //when element out of right zone
        },
        drop: function( event, ui ) {
            //when element drop to right zone
        }
    });

    //submit form in left zone.
    btn_save.on('click', function () {
        form_submit.submit();
    });
} );
