@extends('admin_layout')
@section('admin_content')
<script src="{{asset('public/backend/ckeditor/ckeditor.js')}}"></script>


<div class="row">
<div class="col-lg-12">
<section class="panel">
<header class="panel-heading">
Thêm tin tức
</header>
<?php
$message = Session::get('message');
if($message){
echo '<span class="text-alert">'.$message.'</span>';
Session::put('message',null);
}
?>
<div class="panel-body">
<div class="position-center">
<form role="form" action="{{URL::to('/save-news')}}"
method="post" enctype="multipart/form-data">
{{ csrf_field() }}
<div class="form-group">
<label for="exampleInputEmail1">Tiêu đề</label>
<input type="text" data-validation="length" data-validationlength="min10" data-validation-error-msg="Làm ơn điền ít nhất 10 ký tự"
name="tittle" class="form-control" id="exampleInputEmail1"
placeholder="Tiêu đề">
</div>


<div class="form-group">
<label for="exampleInputEmail1">Hình ảnh</label>
<input type="file" name="image" class="formcontrol" id="exampleInputEmail1">
</div>
<div class="form-group">
<label for="exampleInputPassword1">Nội dung</label>
<textarea style="resize: none" rows="8" class="formcontrol" name="content" id="news" placeholder="Nội dung"></textarea>
<script type="text/javascript">
	CKEDITOR.replace('news');
</script>

</div>

<button type="submit" name="add_news" class="btn btninfo">Thêm tin tức</button>
</form>
</div>
</div>
</section>
</div>
@endsection

