$(document).ready(function () {
    $(".appartament_search, #submit_button").click(function (event) {
        var th = $(this)
        var a = $(".wq-street_address")
        var b = $(".wq-street_number")
        var c = $(".wq-intersection")
        var d = $(".wq-route")
        var e = $(".wq-sublocality")
        var f = $(".wq-locality")
        var g = $(".wq-administrative_area_level_1")
        var h = $(".wq-administrative_area_level_2")
        var i = $(".wq-administrative_area_level_3")
        var j = $(".wq-administrative_area_level_4")
        var k = $(".wq-administrative_area_level_5")
        var l = $(".wq-country")
        var m = $(".wq-neighborhood")
        var fil = $('#file-upload');

        if(!a.val() && !b.val() && !c.val() && !d.val() && !e.val() && !f.val() && !g.val() && !h.val() && !i.val() && !j.val() && !k.val() && !l.val() && !m.val()){
            swal(
                'Wrong Address',
                'Please select the address from suggestions when you type!',
                'error'
            )
            event.stopImmediatePropagation();
            event.preventDefault()
            return false;
        }


        if(window.location.pathname != '/' && window.location.pathname != '/search_listing'){
            if(!fil.val()){
                swal(
                    'Wrong Address',
                    'Please Upload image first!',
                    'error'
                );

                event.stopImmediatePropagation();
                event.preventDefault()
                return false;
            }
        }


    })
});