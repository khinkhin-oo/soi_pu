@extends('admin.layout.master')
@section('main_content')
<style type="text/css">
  img{
  max-width:180px;
}
input[type=file]{
padding:10px;}
</style>
<div class="container-fluid">
   @include('admin.layout.breadcrumb')
   <div class="row">
      <div class="col-sm-12">
         <div class="white-box p-l-20 p-r-20">
            @include('admin.layout._operation_status')
            <div class="row">
               <div class="col-md-12">
                  <form action="{{url('/')}}/admin/page/store" method="post" enctype="multipart/form-data" onsubmit='addLoader()';>
                     {{csrf_field()}}
                    <div class="form-body">
                      {{--   <h3 class="box-title">Add Customer</h3>
                        <hr> --}}
                        <p style="color: red;">Please note that all fields that have an asterisk (*) are required.</p>
                        <br/>
                        <div class="row">
                          <div class="col-md-6">
                           <div class="form-group">
                              <label class="control-label">* Title</label>
                              <div class="input-group">
                                <span class="input-group-addon"><i class="ti-hand-point-up"></i></span>
                                <textarea name="title" id="ckeditor" class="form-control" rows="3"></textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label">Description and images</label>
                              <div class="input-group">
                                <span class="input-group-addon"><i class="ti-list"></i></span>
                                <textarea name="description" id="ckeditor2" class="form-control" rows="3"></textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <br />
                      <br />
                     <div class="form-actions">
                        <button type="submit" id="proceed" class="fcbtn btn btn-danger btn-1g">  Save</button>
                        <a href="{{ $module_url_path }}"  class="fcbtn btn btn-primary btn-outline btn-1e">Back</a>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<script type="text/javascript">
function checkImageValidation(ref){
    const file = ref.files[0];
    const  fileType = file['type'];
    const validImageTypes = ['image/gif', 'image/jpeg', 'image/png'];
    alert(validImageTypes);
    if (!validImageTypes.includes(fileType))
    {
       swal('please select valid file');
       $('#profile_image').val('');
       return false;
    }
}
</script>
<script type="text/javascript">
    $(document).ready(function(){


      $('.dropify').dropify();

    // Used events
    var drEvent = $('#input-file-events').dropify();
    drEvent.on('dropify.beforeClear', function (event, element) {
        return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
    });
    drEvent.on('dropify.afterClear', function (event, element) {
        alert('File deleted');
    });
    drEvent.on('dropify.errors', function (event, element) {
        console.log('Has Errors');
    });
    var drDestroy = $('#input-file-to-destroy').dropify();
    drDestroy = drDestroy.data('dropify')
    $('#toggleDropify').on('click', function (e) {
        e.preventDefault();
        if (drDestroy.isDropified()) {
            drDestroy.destroy();
        }
        else {
            drDestroy.init();
        }
    })
    $('.dropify-clear').on('click', function () {
        $('#oldimage').val('');
    })


        var e = document.getElementById("input-file-now"),
        r = $("#default-image").val();
        $(e).change(function(){
            $('.dropify-preview').removeClass('imp');
            if (e.files && e.files[0]){
                var a = e.files,
                t = a[0].name.substring(a[0].name.lastIndexOf(".") + 1),
                n = new FileReader;
                if ("JPEG" != t && "jpeg" != t && "jpg" != t && "JPG" != t && "png" != t && "PNG" != t)
                    return showAlert("Sorry, " + a[0].name + " is invalid, allowed extensions are: jpeg , jpg , png", "error"),$("#input-file-now").val(""),$('.dropify-preview').addClass('imp'),$('#oldimage').val(''), $(".fileupload-preview").attr("src", r), !1;
                if (a[0].size > 2e6) return showAlert("Sorry, " + a[0].name + " is invalid, Image size should be 2MB only", "error"), $("#input-file-now").val(""),$('.dropify-preview').addClass('imp'),$('#oldimage').val(''),  $(".fileupload-preview").attr("src", r), !1;
                n.onload = function(e){
                    var a = new Image;
                    a.src = e.target.result, a.onload = function(){
                        var e = this.height,
                        a = this.width;
                        /*if (e < 250 || a < 150)
                            return showAlert("Sorry,Please upload image with Height and Width greater than or equal to 200 X 150 for best result", "error"), $("#input-file-now").val(""),$('.dropify-preview').addClass('imp'),$('#oldimage').val(''),  $(".fileupload-preview").attr("src", r), !1*/
                    }, $(".fileupload-preview").attr("src", e.target.result)
                }, n.readAsDataURL(e.files[0])
            }
        })
    });
</script>
<script src="{{ url('/') }}/assets/admin_assets/js/jQuery.style.switcher.js"></script>
<script src="{{asset('ckeditor5_new/build/ckeditor.js')}}"></script>
<script>ClassicEditor
      .create( document.querySelector( '#ckeditor' ), {

        toolbar: {
          items: [
            'heading',
            '|',
            'bold',
            'italic',
            'link',
            'bulletedList',
            'numberedList',
            '|',
            'indent',
            'outdent',
            '|',
            'blockQuote',
            'insertTable',
            'mediaEmbed',
            'undo',
            'redo',
            'highlight',
            'fontFamily',
            'fontSize',
            'fontBackgroundColor',
            'fontColor',
            'imageUpload',
            'alignment'
          ]
        },
        language: 'en',
        image: {
          toolbar: [
            'imageTextAlternative',
            'imageStyle:full',
            'imageStyle:side'
          ]
        },
        table: {
          contentToolbar: [
            'tableColumn',
            'tableRow',
            'mergeTableCells'
          ]
        },
        licenseKey: '',

      } )
      .then( editor => {
        window.editor = editor;








      } )
      .catch( error => {
        console.error( 'Oops, something went wrong!' );
        console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
        console.warn( 'Build id: rivza54o3dzl-oyvs1tnekgbs' );
        console.error( error );
      } );
  </script>
  <script type="text/javascript">
      ClassicEditor
      .create( document.querySelector( '#ckeditor2' ), {

        toolbar: {
          items: [
            'heading',
            '|',
            'bold',
            'italic',
            'link',
            'bulletedList',
            'numberedList',
            '|',
            'indent',
            'outdent',
            '|',
            'blockQuote',
            'insertTable',
            'mediaEmbed',
            'undo',
            'redo',
            'highlight',
            'fontFamily',
            'fontSize',
            'fontBackgroundColor',
            'fontColor',
            'imageUpload',
            'alignment'
          ]
        },
        language: 'en',
        image: {
          toolbar: [
            'imageTextAlternative',
            'imageStyle:full',
            'imageStyle:side'
          ]
        },
        table: {
          contentToolbar: [
            'tableColumn',
            'tableRow',
            'mergeTableCells'
          ]
        },
        licenseKey: '',

      } )
      .then( editor => {
        window.editor = editor;








      } )
      .catch( error => {
        console.error( 'Oops, something went wrong!' );
        console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
        console.warn( 'Build id: rivza54o3dzl-oyvs1tnekgbs' );
        console.error( error );
      } );
  </script>
@endsection
