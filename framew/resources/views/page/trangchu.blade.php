@extends('master')
@section('title','Trang chủ')
@section('content')
  <div class="panel panel-body">
    Hello world!
    <div class="col-xs-12 col-sm-12">
			<textarea id="summary" name="summary" class="form-control"></textarea>
			<script type="text/javascript">CKEDITOR.replace('summary'); </script>
		</div>
</div>
@endsection
