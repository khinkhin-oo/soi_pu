<style>
#multiprice_div {border: 1px solid #ddd;padding: 20px 0;margin-bottom: 30px;}
#multiprice_div .add-remove-btn {position: absolute;right: 8px;top: 39px;padding: 0px 8px;line-height: 30px;font-size: 14px;}
#multiprice_div .remove-btn-block {position: absolute;right: 8px;top: 20px;padding: 0px 8px;line-height: 30px;font-size: 14px;}
.label-block {margin-bottom: 15px;margin-top: -5px;}
.generate-group {border-top: 1px solid #ddd;padding-top: 20px;margin-top: -5px;position: relative}
.modifiers-add-button .add-remove-btn {right: -30px;top: 3px;padding: 0px 7px;}
/*#modifiers {max-width: 717px;width: 100%;}*/
#modifiers .remove-btn-block{position: absolute;top: 2px;right: -30px;padding: 0 7px;line-height: 30px;}
.upload-photo {display: inline-block;border: 1px dashed #dddddd;position: relative;width: 100px;height: 100px;margin-right: 10px;margin-bottom: 10px;}
.upload-photo img {width: 100%;height: 100%;}
.upload_pic_btn {width: 100px;height: 100px;position: absolute;top: 0;left: 0;opacity: 0;cursor: pointer;}
input.error.upload_pic_btn{position: absolute !important;}
.upload-photo label.error {left: 0;bottom: -25px;white-space: nowrap;}
.upload-close {display: block;height: 30px;width: 30px;position: absolute;border-radius: 50%;background: #fff;left: 0;top: 0;right: 0;bottom: 0;margin: auto;transform: translateY(-15px);-webkit-transform: translateY(-15px);-moz-transform: translateY(-15px);-ms-transform: translateY(-15px);-o-transform: translateY(-15px);opacity: 0;visibility: hidden;transition: 0.5s}
.upload-close a{display: block;text-align: center;color: #f83e3f;font-size: 19px;padding-top: 1px;}
.upload-photo:hover .upload-close{transform: translateY(0px);-webkit-transform: translateY(0px);-moz-transform: translateY(0px);-ms-transform: translateY(0px);-o-transform: translateY(0px);opacity: 1;visibility: visible;transition: 0.5s}
.user-box-upload-section{margin-bottom: 20px;}    
.add-busine-multi span div {position: relative;height: 100px;width: 100px;display: inline-block;border: 1px dashed #dddddd;margin-right: 10px;margin-bottom: 10px;}
.add-busine-multi span.upload-photo {display: inline-block;border: 1px dashed #dddddd;position: relative;width: 100px;height: 100px;margin-right: 10px;margin-bottom: 10px;}
.add-busine-multi span.upload-photo span {display: none;}
.add-busine-multi span.upload-photo .image-note span{display: block;height: auto;width: auto;}
.add-busine-multi span.upload-photo .image-note{position: absolute;right: -230px;top: 0;width: 200px;padding: 10px;height: auto;border: 1px solid #dddddd;background: #f4f4f4;font-size: 12px;line-height: 22px;transform: translateX(-15px);-webkit-transform: translateX(-15px);-moz-transform: translateX(-15px);-ms-transform: translateX(-15px);-o-transform: translateX(-15px);visibility: hidden;opacity: 0;transition: 0.5s}
.add-busine-multi span.upload-photo:hover .image-note,.add-busine-multi span.upload-photo .upload_pic_btn:focus ~ .image-note{transform: translateX(0px);-webkit-transform: translateX(0px);-moz-transform: translateX(0px);-ms-transform: translateX(0px);-o-transform: translateX(0px);visibility: visible;opacity: 1;transition: 0.5s}
.add-busine-multi span.upload-photo .image-note:before{border-top: 10px solid transparent;border-bottom: 10px solid transparent;border-right: 10px solid #dddddd;position: absolute;top: 20px;left: -10px;content: "";}
.add-busine-multi span.upload-photo .image-note:after{border-top: 8px solid transparent;border-bottom: 8px solid transparent;border-right: 8px solid #f4f4f4;position: absolute;top: 22px;left: -8px;content: "";}
</style>
<link href="{{url('/')}}/assets/multi_image_assets/css/multiselect.css" rel="stylesheet"/>
<link href="{{url('/')}}/assets/multi_image_assets/css/jquery.multiselect.css" rel="stylesheet" />
<script src="{{ url('/')}}/assets/multi_image_assets/js/multiselect.min.js"></script>
<script src="{{ url('/')}}/assets/multi_image_assets/js/jquery.multiselect.js"></script>
<link rel="stylesheet" type="text/css" href="{{url('/')}}/assets/clock/dist/bootstrap-clockpicker.min.css">
<link rel="stylesheet" type="text/css" href="{{url('/')}}/assets/clock/assets/css/github.min.css">
<link href="{{url('/')}}/assets/multi_image_assets/css/bootstrap-theme.min.css" rel="stylesheet"/>
<script src="{{ url('/')}}/assets/multi_image_assets/js/jquery.min.js"></script>
<script src="{{ url('/')}}/assets/multi_image_assets/js/bootstrap1.min.js""></script>
<link href="{{url('/')}}/assets/multi_image_assets/css/bootstrap-multiselect.css" rel="stylesheet"/>
<script src="script.js"></script>