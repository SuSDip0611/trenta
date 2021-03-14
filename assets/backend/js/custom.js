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
    // console.log('baseUrl', baseUrl);
    // console.log('window.location.origin', window.location.origin);
        
    // var baseurl=window.location.origin+'/trenta';

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
                "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"width=100px height=100px/>" +
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
    /*$(document).on("click", ".save_new_product_btn", function(e){
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
        
    });*/

    //Save product
    $(document).on("click", ".edit_product_btn", function(e){
        var form = $('#edit_product_form')[0];

        var formData = new FormData(form);

        jQuery.ajax({
            type: "POST",
            dataType : "json",
            enctype: 'multipart/form-data',
            url: baseurl + "/admin/update_product",
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


    $(document).on('click','#add_new_div_btn',function(e){
        e.preventDefault();
        var box_count = $('#box_count').val();
		// alert(box_count);return;
		box_count ++;
		$('#box_count').val(box_count);

		var html =`
            <div class="my_box" id="box_loop_`+box_count+`">
                <div class="p_dtl_div">
                    <div class="col-md-11 ">
                        <div class="col-md-4">
                            <div class="form-group"> 
                                <label for="imagefiles">Product Image <span class="required-star">*</span></label>
                                <input type="file" class="form-control file-control file-input" id="imagefiles" name="product_images[]" accept="image/*" multiple required> 
                                <div class="preview_div clearfix">
                                    <label for="" id="screenshots"></label>
                                </div>
                            </div>									
                        </div>
                        <div class="col-md-4">
                            <div class="form-group"> 
                                <label for="size">Size <span class="required-star">*</span></label> 
                                <input type="number" class="form-control" id="size" name="size" placeholder="Enter size" required> 
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group"> 
                                <label for="color">Choose color <span class="required-star">*</span></label> 
                                <input type="color" class="form-control" id="color" name="color" placeholder="Enter color" required> 
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1 add_new_div">
                        <div class="button_box">
                        <button type="button" class="btn btn-danger btn-block" name='submit' id='remove_div_btn' data-remove_indx="`+box_count+`"><i class="fa fa-minus"></i></button>
                        </div>					
                    </div>
                </div>
			</div>

		`;
            
        $(".p_dtl_div").append(html);


	});

	$(document).on('click','#remove_div_btn',function(){
        var remove_indx = $(this).data('remove_indx');
		// console.log('box_count', remove_indx);return;
		$("#box_loop_"+remove_indx).remove();
		var box_count = $('#box_count').val();
		box_count --;
		$('#box_count').val(box_count);
	});


    /*VUE Start*/
	var obj = {
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
    });
    /* VUE End*/




    $('.datatable').DataTable();
});
