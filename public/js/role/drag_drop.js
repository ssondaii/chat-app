$( function() {
    let form_submit = $('#formUpdateRolePermission');
    let btn_save    = $('#btn_save_role_permission');
    let left        = $('#sortable1');
    let right       = $('#sortable2');
    let modal_error = $('#modalError');

    left.sortable({
        connectWith: ".connectedSortable",
        placeholder: "class-highlight-placeholder",
        scroll: false,
        scrollSensitivity: 100,
        scrollSpeed: 100,
        start : function(event, ui){
            //get current element being sorted( before drop)
            // $(ui.item)
        },
        stop : function(event, ui){
            //when drag element from left and drop to right
            if(right.has($(ui.item)).length){ // check if right has element from left
                $(ui.item).find('input[name ="list_check_permission[]"]').prop( "checked", false );
                console.log('drop ' + $(ui.item).find('input[name ="list_id_permission[]"]').val());
            }
        },
        sort : function (event, ui) {
            let parentElement   = $(ui.placeholder).parents('.connectedSortable');
            let itemElement     = $(ui.item);
            autoScroll(parentElement, itemElement);
        }
    }).disableSelection();

    right.sortable({
        connectWith: ".connectedSortable",
        placeholder: "class-highlight-placeholder",
        scroll: false,
        scrollSensitivity: 100,
        scrollSpeed: 100,
        start : function(event, ui){
            //get current element being sorted( before drop)
            // $(ui.item)
        },
        stop : function(event, ui){
            //when drag element from right and drop to left
            if(left.has($(ui.item)).length){// check if left has element from right
                $(ui.item).find('input[name ="list_check_permission[]"]').prop('checked', true);
                console.log('drop ' + $(ui.item).find('input[name ="list_id_permission[]"]').val());
            }
        },
        sort : function (event, ui) {
            let parentElement   = $(ui.placeholder).parents('.connectedSortable');
            let itemElement     = $(ui.item);
            let itemPlaceholder = $(ui.placeholder);
            autoScroll(parentElement, itemElement, itemPlaceholder);
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

    //show modal error
    if(modal_error.length){
        modal_error.modal("show");
    }

    //auto scroll
    function autoScroll(parentElement, itemElement, itemPlaceholder){

        let parentPosition  = parentElement[0].getBoundingClientRect();
        let itemPosition    = itemElement[0].getBoundingClientRect();
        let scrollSpeed     = 0;

        if(itemPosition.bottom >= parentPosition.bottom){
            parentElement.animate({ scrollTop: parentElement.scrollTop() + itemPosition.height },
                                    scrollSpeed);
            // setTimeout(function () {
            //     parentElement.remove('.ui-sortable-placeholder');
            //     parentElement.append(itemPlaceholder);
            // },100);
        }
        if(itemPosition.top <= parentPosition.top){
            parentElement.animate({ scrollTop: parentElement.scrollTop() - itemPosition.height },
                                    scrollSpeed);
            // setTimeout(function () {
            //     parentElement.remove('.ui-sortable-placeholder');
            //     parentElement.prepend(itemPlaceholder);
            // },100);
        }

        return;
    }
} );
