@extends('admin_layout')
@section('admin_content')
<script type="text/javascript">
	CKEDITOR.replace( 'ckeditor2' );
</script>
<div class="row">
<div class="col-lg-12">
<section class="panel">
<header class="panel-heading">

</header>
<div class="panel-body">
<div class="position-center">
<?php
			$message = Session::get('message');
			if($message){
			echo '<span class="text-alert">'.$message.'</span>';
			Session::put('message',null);
			}
		?>
	
<form role="form" action="{{URL::to('/save-category-product')}}" method="post">
{{ csrf_field() }}
<div class="form-group">

<label for="exampleInputEmail1">Tên danh mục</label>
<input type="text" name="category_product_name"
class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
</div>
<div class="form-group">
<label for="exampleInputEmail1">Slug</label>
<input type="text" name="slug_category_product"
class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
</div>
<div class="form-group">
<label for="exampleInputPassword1">Mô tả danh
mục</label>
<textarea style="resize: none" rows="8" class="formcontrol" name="category_product_desc" id="ckeditor2"
placeholder="Mô tả danh mục"></textarea>
<script type="text/javascript">
	CKEDITOR.replace('ckeditor2');
</script>
</div>
<div class="form-group">
<label for="exampleInputPassword1">Từ khóa danh
mục</label>
<input type="text" class="form-control" name="category_product_keywords" id="exampleInputPassword1"
placeholder="Mô tả danh mục"></textarea>
</div>
<div class="form-group">
<label for="exampleInputPassword1">Hiển thị</label>
<select name="category_product_status" class="formcontrol input-sm m-bot15">
<option value="0">Ẩn</option>
<option value="1">Hiển thị</option>
</select>
</div>
<button type="submit" name="add_category_product"
class="btn btn-info">Thêm danh mục</button>
</form>
</div>
</div>
</section>
</div>
@endsection