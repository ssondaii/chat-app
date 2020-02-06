$( function() {
    let form_submit = $('#formUpdateRolePermission');
    let btn_save    = $('#btn_save_role_permission');
    let left        = $('#sortable1');
    let right       = $('#sortable2');

    left.sortable({
        connectWith: ".connectedSortable"
    }).disableSelection();

    right.sortable({
        connectWith: ".connectedSortable"
    }).disableSelection();

    // $('#sortable1').draggable({
    //     scroll: true,
    //     axis: "x",
    //     containment: "body",
    //     revert: true,
    //     helper: "clone",
    //     disable: false,
    //     start: function( event, ui ) {
    //         // $(ui.item).addClass("active-draggable");
    //     },
    //     drag: function( event, ui ) {
    //     },
    //     stop:function( event, ui ) {
    //         // $(ui.item).removeClass("active-draggable");
    //     }
    // });
    //
    // $('#sortable2').draggable({
    //     scroll: true,
    //     axis: "x",
    //     containment: "body",
    //     revert: true,
    //     helper: "clone",
    //     disable: false,
    //     start: function( event, ui ) {
    //         // $(ui.item).addClass("active-draggable");
    //     },
    //     drag: function( event, ui ) {
    //     },
    //     stop:function( event, ui ) {
    //         // $(ui.item).removeClass("active-draggable");
    //     }
    // });

    //when drop element to left zone.
    left.droppable({
        // accept: "#div",
        // class: {
        //     "ui-droppable-active":"ac",
        //     "ui-droppable-hover":"hv"
        // },
        activate: function( event, ui ) {
            // $(this).css('background','red');
        },
        over: function( event, ui ) {
            // $(this).css('background','yellow');
        },
        out: function( event, ui ) {
            // $(this).css('background','blue');
        },
        drop: function( event, ui ) {
            // $(this).css('background','white');
        },
        deactivate: function( event, ui ) {
            // $(ui.item).css('background','green');
        },
    });

    //when drop element to right zone.
    right.droppable({
        // accept: "#div",
        // class: {
        //     "ui-droppable-active":"ac",
        //     "ui-droppable-hover":"hv"
        // },
        activate: function( event, ui ) {
            // $(this).css('background','red');
        },
        over: function( event, ui ) {
            // $(this).css('background','yellow');
        },
        out: function( event, ui ) {
            // $(this).css('background','blue');
        },
        drop: function( event, ui ) {
            // $(this).css('background','white');
        },
        deactivate: function( event, ui ) {
            // $(ui.item).css('background','green');
        },
    });

    // $('#sortable1').bind("DOMSubtreeModified",function(){
    //     setTimeout(function() {
    //         $('#sortable1').find('input').prop('disabled', false);
    //         $('#sortable2').find('input').prop('disabled', true);
    //         $('#sortable2').find('input').prop('checked', false);
    //         resetDefaultExportSize();
    //     },100);
    // });

    //submit form in left zone.
    btn_save.on('click', function () {
        form_submit.submit();
    });
} );
