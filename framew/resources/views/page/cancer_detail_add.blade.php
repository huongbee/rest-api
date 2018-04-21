@extends('master')
@section('title','Thêm chi tiết một loại bệnh')
@section('content')
    <section class="content">
      <div class="col-md-12">
          <div class="panel panel-default">
              <div class="panel-heading"><b>Thêm chi tiết một loại bệnh</b></div>
              <div class="panel-body">

                  <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="">
                      <input type="hidden" name="_token" value="">
                     
                      <div class="form-group">
                          <label class="col-md-2 control-label">Loại bệnh: </label>
                          <div class="col-md-4">
                              <select class="form-control" name="id_chapter">
                                   <option value="10" selected="">KỸ THUẬT AJAX</option>
                              </select>
                          </div>
                      </div>
                      <div class="form-group">
                          	<label class="col-md-2 control-label">Mô tả: </label>
                          	<div class="col-xs-10 col-sm-10">
								<textarea id="summary" name="summary" class="form-control"></textarea>
								<script type="text/javascript">CKEDITOR.replace('summary'); </script>
							</div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-2 control-label">Nguyên nhân:</label>
                        <div class="col-xs-10 col-sm-10">
								<textarea id="causes" name="causes" class="form-control"></textarea>
								<script type="text/javascript">CKEDITOR.replace('causes'); </script>
							</div>
                      </div>
                      <div class="form-group">
                        <label class="col-md-2 control-label">Triệu chứng</label>
                        <div class="col-xs-10 col-sm-10">
								<textarea id="symptoms" name="symptoms" class="form-control"></textarea>
								<script type="text/javascript">CKEDITOR.replace('symptoms'); </script>
							</div>
                      </div>
                      </div>

                      <div class="form-group" id="id_youtube" style="display: none;">
                          <label class="col-md-2 control-label">Mã youtube:</label>
                          <div class="col-md-6">
                              <input type="text" class="form-control" name="id_youtube">
                          </div>
                      </div>
                      <div class="form-group" id="iframe" style="display: none;">
                          <label class="col-md-2 control-label">Link Iframe:</label>
                          <div class="col-md-9">
                              <input type="text" class="form-control" name="iframe">
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-md-3" style="float:right">
                            <button class="btn btn-info" type="submit">Thêm</button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  	</section>
@endsection
