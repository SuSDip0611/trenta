$(function() {

    $('#side-menu').metisMenu();

});

//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
// Sets the min-height of #page-wrapper to window size
$(function() {
    $(window).bind("load resize", function() {
        topOffset = 50;
        width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.navbar-collapse').addClass('collapse');
            topOffset = 100; // 2-row-menu
        } else {
            $('div.navbar-collapse').removeClass('collapse');
        }

        height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $("#page-wrapper").css("min-height", (height) + "px");
        }
    });

    var url = window.location;
    var element = $('ul.nav a').filter(function() {
        return this.href == url || url.href.indexOf(this.href) == 0;
    }).addClass('active').parent().parent().addClass('in').parent();
    if (element.is('li')) {
        element.addClass('active');
    }
});

$(document).ready(function() {
        
    var baseurl=window.location.origin+'/trenta';

    /* Image preview */
    if (window.File && window.FileList && window.FileReader) {
        $("#imagefiles").on("change", function(e) {
          var files = e.target.files,
            filesLength = files.length;
            $('.pip').remove();
          for (var i = 0; i < filesLength; i++) {
            var count = i;
            var f = files[i]
            var fileReader = new FileReader();
            fileReader.onload = (function(e) {
              var file = e.target;
              $("<span class=\"pip\">" +
                "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"width=200px height=200px/>" +
                "</span>").insertAfter("#screenshots");
              /*$(".remove").click(function(){
                $(this).parent(".pip").remove();
              }); */         
            });
            fileReader.readAsDataURL(f);
          }
        });
    } else {
        console.log("Your browser doesn't support to File API")
    } 

    //Save product
    $(document).on("click", ".save_new_product_btn", function(e){
        var form = $('#save_new_product_form')[0];

        var formData = new FormData(form);

        jQuery.ajax({
            type: "POST",
            dataType : "json",
            enctype: 'multipart/form-data',
            url: baseurl + "/admin/save_new_product",
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 800000,
        }).done(function(data){
            console.log('assertion', data);
            if (data.status = true) {
                $('#myModal').modal('toggle');
                swal("Done",data.msg,"success");
                setTimeout(function(){
                    window.location.replace(baseurl+'/admin/product_list');
                },1000)
            }else {
                $('#myModal').modal('toggle');
                swal("Error",data.msg,"error");
            }
        });        
        // console.log('cat_name: ', cat_name);
        
    });

    //Delete product
    $(document).on('click','.product-delete',function(){
        var prod_id = $(this).data('product_id');
        swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this record!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
            // console.log('willDelete: ', willDelete);
            if (willDelete) {
                jQuery.ajax({
                    type : "POST",
                    dataType : "json",
                    url : baseurl + "/admin/delete_product",
                    data : { prod_id : prod_id } 
                }).done(function(data){
                    if(data.status == true){
                        swal({
                            title: "Delete Product",
                            text: data.msg,
                            icon: "success",
                        });
                        setTimeout(function(){
                            window.location.replace(baseurl+'/admin/product_list');
                        },1000)
                    }else{
                        swal({
                            title: "Delete Product",
                            text: data.msg,
                            icon: "error",
                        });
                    }
                }); 
             }
        });
    });

    //Save category
    $(document).on("click", ".save_new_category_btn", function(e){
        var form = $('#save_new_category_form')[0];

        var formData = new FormData(form);

        jQuery.ajax({
            type: "POST",
            dataType : "json",
            enctype: 'multipart/form-data',
            url: baseurl + "/admin/save_new_category",
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 800000,
        }).done(function(data){
            console.log('assertion', data);
            if (data.status = true) {
                $('#myModal').modal('toggle');
                swal("Done",data.msg,"success");
                setTimeout(function(){
                    window.location.replace(baseurl+'/admin/category_list');
                },1000)
            }else {
                $('#myModal').modal('toggle');
                swal("Error",data.msg,"error");
            }
        });        
        // console.log('cat_name: ', cat_name);
        
    });

    //Edit category
    $(document).on("click", ".edit_category_btn", function(e){
        var form = $('#edit_category_form')[0];

        var formData = new FormData(form);

        jQuery.ajax({
            type: "POST",
            dataType : "json",
            enctype: 'multipart/form-data',
            url: baseurl + "/admin/update_category",
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 800000,
        }).done(function(data){
            console.log('assertion', data);
            if (data.status = true) {
                $('#myModal').modal('toggle');
                swal("Done",data.msg,"success");

                setTimeout(function(){
                    window.location.replace(baseurl+'/admin/category_list');
                },1000)
            }else {
                $('#myModal').modal('toggle');
                swal("Error",data.msg,"error");
            }
        });        
        // console.log('cat_name: ', cat_name);
        
    });

    //Delete category
    $(document).on('click','.category-delete',function(){
        var cat_id = $(this).data('category_id');
        swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this record!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
            // console.log('willDelete: ', willDelete);
            if (willDelete) {
                jQuery.ajax({
                    type : "POST",
                    dataType : "json",
                    url : baseurl + "/admin/delete_category",
                    data : { cat_id : cat_id } 
                }).done(function(data){
                    if(data.status == true){
                        swal({
                            title: "Delete Category",
                            text: data.msg,
                            icon: "success",
                        });
                        setTimeout(function(){
                            window.location.replace(baseurl+'/admin/category_list');
                        },1000)
                    }else{
                        swal({
                            title: "Delete Category",
                            text: data.msg,
                            icon: "error",
                        });
                    }
                }); 
             }
        });
    });

    $('.datatable').DataTable();
});
