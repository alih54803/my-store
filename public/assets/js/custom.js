$(document).ready(function(){

    //     $("button").click(function(){
    //     $("p").hide();
    //   });

      $('.addtocartbtn').click(function(e){
        e.preventDefault();
        var product_id=$(this).closest('.product_data').find('.product_id').val();
        var prodcut_qty=$(this).closest('.product_data').find('.qty-input').val();
        // alert(product_id);
        // alert(prodcut_qty);

        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
        method:"POST",
        url:"/add-to-cart",
        data:{
            'product_id':product_id,
            'product_qty':prodcut_qty,
        },
        success: function (response){
            alert(response.status);
            // window.location.reload();
            // swal("",response.status,"success");
        }

        });


      });

        $('.increment-btn').click(function(e){
        e.preventDefault();
        // console.log('umer');
        // alert('umer');
            // var inc_value=$('.qty-input').val();
            var inc_value=$(this).closest('.product_data').find('.qty-input').val();
            var value=parseInt(inc_value,10);
            // alert(value);
            value=isNaN(value)?0:value;
            if(value<10){
                value++;
                $(this).closest('.product_data').find('.qty-input').val(value);
                // $('.qty-input').val(value);
            }
        });

        $('.decrement-btn').click(function(e){
        e.preventDefault();
            // var dec_value=$('.qty-input').val();
            var dec_value=$(this).closest('.product_data').find('.qty-input').val();
            var value=parseInt(dec_value,10);
            value=isNaN(value)?0:value;
            if(value>1){
                value--;
                // $('.qty-input').val(value);
                $(this).closest('.product_data').find('.qty-input').val(value);
            }
        });

        $('.changeQty').click(function(e){
            e.preventDefault();
            var product_qty=$(this).closest('.product_data').find('.qty-input').val();
            var prod_id=$(this).closest('.product_data').find('.product_id').val();
          // alert(product_id);
            data={
                'product_idd':prod_id,
                'product_qty':product_qty
            }

            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
            method:"POST",
            url:"/update-to-cart",
            data:data,
            // dataType:'dataType',
            success: function (response){
                alert(response.status);
                // window.location.reload();
                // swal("",response.status,"success");
            }


        });
        });

        $('#country_dd').on('change',function(e){
            e.preventDefault();
            var idCountry=this.value;
            $('#state_dd').html('');
            // alert(idCountry);
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:"/fetch_states",
                method:'post',
                data:{
                    country_id:idCountry,
                },
                dataType:'json',
                success:function(result){
                    $('#state_dd').html('<option value="">select state</option>');
                    $.each(result.states, function(key,value){
                                            $("#state_dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                                // alert(value.id);
                    });




                    // $('#city_dd').html('<option value="">select city</option>')
                }
            });
        });
        $('#state_dd').on('change', function (e) {
            e.preventDefault();
            var stateId =this.value;

            // alert(stateId);
            $("#city_dd").html('');


            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url:'/fetchCities',
                method:"post",
                data:{
                    state_id:stateId,
                },
                dataType:'json',
                success:function(response){
                    // alert(response);
                    $('#city_dd').html('<option value="">select city</option>');
                    $.each(response.cities, function(key, value){
                        $('#city_dd').append('<option value="'+value.id+'">'+value.name+'</option>');
                        // alert(value.id);
                    });
                }

            });
        });
    });

// alert($('meta[name="csrf-token"]').attr('content'));

// var token: $('meta[name="csrf-token"]').attr('content')
    Dropzone.options.photoDropzone = {
// alert('umer')
        // url: "<?=url('/submit-photo-img') ?>",
        // headers: {
        //     'X-CSRF-TOKEN': "{{ csrf_token() }}"
        // },
        url: '/store_media/drop',
        // clickable: true,
        // autoProcessQueue: false,
        // uploadMultiple: false,
        // parallelUploads: 1,

        maxFilesize: 10, // MB
        acceptedFiles: '.jpeg,.jpg,.png,.gif',
        maxFiles: 1,
        addRemoveLinks: true,

        params: {
            _token:$('meta[name="csrf-token"]').attr('content')

        },
        success: function (file, response) {

            // this.on("addedfile", function (file) {
            //     // alert('hello')
            //     if (this.files[1] != null) {
            //         this.removeFile(this.files[0]);
            //     }

            // });
            $('form').find('input[name="image[]"]').remove()
            $('form').append('<input type="" name="image[]" value="' + response.name + '" >')
        },
            // removedfile: function (file) {
            //   file.previewElement.remove()
            //   if (file.status !== 'error') {
            //     $('form').find('input[name="image[]"]').remove()
            //     this.options.maxFiles = this.options.maxFiles + 1
            //   }
            // },
        init: function () {
            // if(isset($product) && $product->photo)
            //     var file = {!! json_encode($product->photo) !!}
            //         this.options.addedfile.call(this, file)
            //     this.options.thumbnail.call(this, file, file.preview)
            //     file.previewElement.classList.add('dz-complete')
            //     $('form').append('<input type="hidden" name="image[]" value="' + file.file_name + '" multiple>')
            //     this.options.maxFiles = this.options.maxFiles - 1
            // endif
            // },
            // error: function (file, response) {
            //     if ($.type(response) === 'string') {
            //         var message = response //dropzone sends it's own error messages in string
            //     } else {
            //         var message = response.errors.file
            //     }
            //     file.previewElement.classList.add('dz-error')
            //     _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
            //     _results = []
            //     for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            //         node = _ref[_i]
            //         _results.push(node.textContent = message)
            //     }
            //     return _results
        }
        }
{/* <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>
    <script type="text/javascript">

    Dropzone.autoDiscover = false;
    var token = '<?php echo csrf_token(); ?>';
    // alert('<?=url('/submit-photo-img')?>')

    var myDropzone = new Dropzone('div#myDropzone', {
        paramName: 'file',
        url: '<?=url('/submit-photo-img')?>',

        addRemoveLinks: true,
        clickable: true,
        autoProcessQueue: false,
        uploadMultiple: false,
        parallelUploads: 1,
        maxFiles: 1,
        params: {
            _token: token
        },
        init: function() {
            // alert('url')
            // alert('umer');
            var myDropzone = this;
            $("form[name='dropzoneForm']").submit(function(event) {
                // $("submit-form']").click(function(event){
                event.preventDefault();
                URL = $("#dropzoneForm").attr('action');
                formData = $('#dropzoneForm').serialize();
                $.ajax({
                    type: 'POST',
                    url: URL,
                    data: formData,
                    success: function(result) {
                        console.log(result);
                        if (result.status == 'success') {
                            var user_id = result.user_id;
                            $('#user_id').val(user_id);
                            myDropzone.processQueue();
                        } else {}
                    }
                })
            });
            this.on('sending', function(file, xhr, formData) {
                console.log('erro');
                let user_id = document.getElementById('user_id').value;
                formData.append('user_id', user_id);
            });
            this.on('success', function(file, response) {

                $('#dropzoneForm')[0].reset();
            });
            this.on('queuecomplete', function() {

            });
        }
    })

    // var myDrop= new Dropzone("#myDrop", {
    //   url: '/submit/pink_extra_care_ride_info'
    // });
    </script> */}
