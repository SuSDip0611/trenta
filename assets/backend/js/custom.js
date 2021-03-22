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

    /* Image preview */
    if (window.File && window.FileList && window.FileReader) {
        $("#imagefiles").on("change", function(e) {
            var box_count = $('#box_count').val();
            var files = e.target.files,
            filesLength = files.length;
            // console.log(files);
            // $('.pip_'.box_count).remove();
          for (var i = 0; i < filesLength; i++) {
            var count = i;
            var f = files[i]
            var fileReader = new FileReader();
            fileReader.onload = (function(e) {
              var file = e.target;
              $("<span class=\"pip_"+box_count+"\">" +
                "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"width=50px height=50px/>" +
                "</span>").insertAfter("#screenshots_".box_count);
            });
            fileReader.readAsDataURL(f);
          }
        });
    } else {
        console.log("Your browser doesn't support to File API")
    } 


    $(document).on("click", "#add_new_div_btn", function(e){
		// alert(200);
        $('.old_btns').hide();
		var box_count = $('#box_count').val();
        
		box_count ++;
		$('#box_count').val(box_count);

		var html = `
			<div class="my_box" id="box_loop_`+box_count+`">
                <div class="col-md-12 ">
                    <div class="row">
                        <div class="col-md-11 text-center details_header" >
                            <label> Product Details Part `+box_count+` </label>
                        </div>
                        <div class="col-md-1 tsk-btn">
                            <div class="add_step" style="cursor: pointer;font-size: 25px;">
                                <i class="fa fa-minus-circle rmv_btn_`+box_count+`" aria-hidden="true" data-edit_mode="false" data-index=`+box_count+` id='remove_new_div_btn' title='Remove new details' ></i>
                            </div>
                        </div>
                    </div>
                    <div class="details_div">
                        <div class="col-md-11 p_dtl_div">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group" > 
                                        <label for="color">Choose color <span class="required-star">*</span></label> 
                                        <input type="color" class="form-control" id="color" name="product_color[]" placeholder="Enter color" required> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" > 
                                        <label for="imagefiles">Product Image <span class="required-star">*</span></label>
                                        <input type="file"
                                            id="imagefiles"
                                            class="form-control file-control file-input" 
                                            accept="image/*"
                                            name="product_image_`+box_count+`[]"
                                            multiple 
                                            required
                                        > 
                                        <div class="clearfix screenshots_div">
                                            <label for="" id="screenshots_`+box_count+`"></label>
                                        </div>
                                    </div>									
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group" > 
                                        <label for="size">Size <span class="required-star">*</span></label>
                                        <div class="row size_div_`+box_count+`">
                                            <div class="col-md-4 ">
                                                <input type="number" class="form-control" id="size" name="product_size_`+box_count+`[]" placeholder="Enter size" required> 
                                            </div>
                                            <div class="col-md-1">
                                                <i class="fa fa-plus-circle" aria-hidden="true" data-tab_index = "`+box_count+`" id='add_new_size_btn' title='Add new details'></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" > 
                                        <label for="size">Stock <span class="required-star">*</span></label> 
                                        <input type="number" class="form-control " id="size" name="product_stock[]" placeholder="Enter stock" required> 
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" id="tab_count_`+box_count+`" value="1">
                        </div>
                    </div>					
                </div>         
			</div>
		`;

        $(".prd_dtl_div").append(html);

        $('.rmv_btn_'+(box_count-1)).hide();

	});

    $(document).on("click", "#remove_new_div_btn", function(e){

        var edit_mode = $(this).data('edit_mode');
        
        // return;
        if (edit_mode == true){

            var box_count = $(this).data('index');
            var size_id = $(this).data('size_id');
            var color_id = $(this).data('color_id');
            var image_id = $(this).data('image_id');
            var product_id = $(this).data('product_id');

            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover those details!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                
                if (willDelete) {
                    jQuery.ajax({
                        type : "POST",
                        dataType : "json",
                        url : baseurl + "admin/remove_product_details",
                        data : { 
                            size_id : size_id,
                            color_id : color_id,
                            image_id : image_id,
                            product_id : product_id,
                        } 
                    }).done(function(data){
                        if (data.status = true) {
                            /*$("#box_loop_"+box_count).remove();
                            var box_count_new_val = $('#box_count').val();
                            box_count_new_val --;
                            $('#box_count').val(box_count_new_val);*/

                            window.location.reload();
                        }
                    }); 
                }

            });
        }else {

            // $('.old_btns').show();
            var box_count = $(this).data('index');
            // console.log('ASD box_count: ',box_count);
            $("#box_loop_"+box_count).remove();
            $('.rmv_btn_'+(box_count-1)).show();
            var box_count_new_val = $('#box_count').val();
            box_count_new_val --;
            $('#box_count').val(box_count_new_val);
        }
    });

    $(document).on("click", "#add_new_size_btn", function(e){
        // $('.old_btns').hide();
        var box_count = $('#box_count').val();
		var tab_count = $('#tab_count_'+box_count).val();
        // alert(tab_count);
        // return;
        console.log('tab_count', tab_count);
        var tab_index = $(this).data('tab_index');
        
		tab_count ++;
        $('#tab_count_'+box_count).val(tab_count);

		var html = `
            <div id="size_box_loop_`+box_count+`_`+tab_count+`">
                <div class="col-md-4">
                    <input type="number" class="form-control ipt" id="size" name="product_size_`+tab_count+`[]" placeholder="Enter size" required>
                </div>
                <div class="col-md-1" style="cursor: pointer;">
                    <i class="fa fa-minus-circle rmv_btn_size_`+box_count+`_`+tab_count+`" aria-hidden="true" data-size_edit_mode="false" data-tab_index=`+tab_count+` id='remove_new_size_btn' title='Remove new details' ></i>
                </div>
            </div>
		`;

        $(".size_div_"+tab_index).append(html);

        $('.rmv_btn_size_'+box_count+'_'+(tab_count-1)).hide();

	});

	$(document).on("click", "#remove_new_size_btn", function(e){

        var edit_mode = $(this).data('size_edit_mode');


        
        // return;
        if (edit_mode == true){

            var box_count = $(this).data('index');
            var size_id = $(this).data('size_id');
            var color_id = $(this).data('color_id');
            var image_id = $(this).data('image_id');
            var product_id = $(this).data('product_id');

            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover those details!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                
                if (willDelete) {
                    jQuery.ajax({
                        type : "POST",
                        dataType : "json",
                        url : baseurl + "admin/remove_product_details",
                        data : { 
                            size_id : size_id,
                            color_id : color_id,
                            image_id : image_id,
                            product_id : product_id,
                        } 
                    }).done(function(data){
                        if (data.status = true) {
                            /*$("#box_loop_"+box_count).remove();
                            var box_count_new_val = $('#box_count').val();
                            box_count_new_val --;
                            $('#box_count').val(box_count_new_val);*/

                            window.location.reload();
                        }
                    }); 
                }

            });
        }else {
            var tab_index = $(this).data('tab_index');
            alert(tab_index);
            $("#size_box_loop_"+tab_index).remove();
            
            $('.rmv_btn_size_'+(tab_count-1)).show();
            var tab_count = $('#tab_count').val();
            tab_count --;
            $('#box_count').val(tab_count);
        }
    });

    //Save product
    $(document).on("click", ".save_new_product_btn", function(e){
        var form = $('#save_new_product_form')[0];

        var formData = new FormData(form);

        jQuery.ajax({
            type: "POST",
            dataType : "json",
            enctype: 'multipart/form-data',
            url: baseurl + "admin/save_new_product",
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 800000,
        }).done(function(data){
            
            if (data.status = true) {
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

    //Save product
    $(document).on("click", ".edit_product_btn", function(e){
        var form = $('#edit_product_form')[0];

        var formData = new FormData(form);

        jQuery.ajax({
            type: "POST",
            dataType : "json",
            enctype: 'multipart/form-data',
            url: baseurl + "admin/update_product",
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 800000,
        }).done(function(data){
            if (data.status == true) {
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

    //Deselect product image
    $(document).on('click','.img_deselect_product',function(){

        var img_name = $(this).data('img_name');
        var img_id = $(this).data('uploadid');
        var prod_id = $(this).data('prod_id');

        var THIS = $(this);

        swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this image!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                jQuery.ajax({
                    type : "POST",
                    dataType : "json",
                    url : baseurl + "/admin/deselect_image",
                    data : { 
                        img_name : img_name,
                        prod_id : prod_id,
                    } 
                }).done(function(data){
                    if (data = true) {
                        THIS.remove();
                        $('.upload_img_'+img_id).remove();
                    }
                }); 
             }
        });
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


     $(document).on("click", "#checkActive", function(e){
        e.preventDefault();
        
        var tid = $(this).data('tid');
        swal({
          title: "Are you sure?",
          text: "Once aproved, you will not be able to recover this record!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {

                jQuery.ajax({
                    type : "POST",
                    dataType : "json",
                    url : baseurl + "/admin/check_active_tickets",
                    data : { tid : tid } 
                }).done(function(data){
                    if(data.status == true){
                        swal({
                            title: "Aproved Ticket",
                            text: data.msg,
                            icon: "success",
                        });
                        setTimeout(function(){
                            window.location.replace(baseurl+'/admin/all-tickets');
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
        })
     })



    /*VUE Start*/
	/*var obj = {
        foo: 'bar'
    }
    new Vue({
        el: '#app',
        data: {
            Details: []
        },
        methods: {
            saveProductDetails: function() {
                
				var form = $('#save_new_product_form')[0];
		        var product_data = JSON.stringify(this.Details);

                var formData = new FormData(form);
		        formData.append('product_data',product_data);

                $.ajax({
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
					if (data.status = true) {
                        swal("Done",data.msg,"success");
                        setTimeout(function(){
                            window.location.replace(baseurl+'/admin/product_list');
                        },1000)
                    }else {
                        $('#myModal').modal('toggle');
                        swal("Error",data.msg,"error");
                    }
		        });

            },

            addMoreDetails: function(i) {
                this.Details.push({
                    product_images: [{
                        images:[]
                    }],
                    product_size:[{
                        name: ''
                    }],
                    product_color: [{
                        color: ''
                    }],
                });
            },

            preView: function(e) {
                // console.log('e: ', e);
                var idx = event.target.getAttribute('data-id');
                console.log('idx: ', idx);
                var files = e.target.files,
                filesLength = files.length;
                $('.pip'+idx).remove();
                for (var i = 0; i < filesLength; i++) {
                    var count = i;
                    var f = files[i]
                    var fileReader = new FileReader();
                    fileReader.onload = (function(e) {
                        var file = e.target;
                        $("<span class=\"pip_"+idx+"\ pre_img\">" +
                        "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"width=50px height=50px/>" +
                        "</span>").insertAfter(".preview_div_"+idx);
                        // $(".remove").click(function(){
                        // $(this).parent(".pip").remove();
                        // });   
                    });
                    fileReader.readAsDataURL(f);
                }
            },

            removeDetails: function(i) {
				this.Details.splice(i, 1);
			},
        },
        created: function () {

            this.Details.push({
                product_images: [{
                    images:[]
                }],
                product_size:[{
                    name: ''
                }],
                product_color: [{
                    color: ''
                }],
            });
        }
    });*/
    /* VUE End*/




    $('.datatable').DataTable();
});
