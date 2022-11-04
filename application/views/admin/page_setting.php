<div class="page animsition">
    <div class="page-header">
      	<h1 class="page-title">
      		<?=$page_title?>
		</h1>
      	<ol class="breadcrumb">
	        <li><a href="<?=BASEURL?>admin">Admin</a></li>
            <li><?=$page_title?></li>
      	</ol>
      	<div class="page-header-actions">
	        <a class="btn btn-sm btn-primary btn-round" href="<?=BASEURL?>" target="_blank">
          		<i class="icon md-link" aria-hidden="true"></i>
	          	<span class="hidden-xs">Website</span>
	        </a>
      	</div><!-- /page-header-actions -->
    </div><!-- /page-header -->
    <?php if (isset($_GET['msg'])):?>
		<div class="bg-success well">
			<p><?=$_GET['msg']?></p>
		</div>
	<?php endif;?>
    <div class="page-content container-fluid">
      	<div class="panel">
	        <div class="panel-heading">
	          	<h3 class="panel-title"><?=$page_title?></h3>
	        </div><!-- /panel-heading -->
	        <div class="panel-body">
	          <form id="exampleFullForm" autocomplete="off" enctype="multipart/form-data" method="post" action="
	          	<?php
		  		if($mode != edit)echo BASEURL."admin/post-page-setting";
			  	else echo BASEURL."admin/update-page-setting";
		  		?>">
		  		<?php
				$required_string = "required";
				if(isset($mode) && $mode=="edit") {?>
					<input type="hidden" name="mode" value="edit" />
					<input type="hidden" name="aid" value="1" />
					<input type="hidden" name="security" value="1ee344ecee344e778694777eb3323a" />
				<?php $required_string = '';
				}?>

	            <div class="row row-lg">
					
					<div class="col-lg-12 form-horizontal">
						<div class="form-group form-material">
							<label class="col-lg-12 col-sm-3 control-label">Slider Overlay Heading 
								<span class="required">*</span>
							</label>
							<div class=" col-lg-12 col-sm-9">
								<input type="text" class="form-control" name="slider_overlay_text" placeholder="Slider Overlay Heading" required="" value="<?=$q['slider_overlay_text']?>">
							</div><!-- /12 -->
						</div><!-- /form-group -->
					</div><!-- /form-horizontal -->

					<div class="col-lg-12 form-horizontal">
						<div class="form-group form-material">
							<label class="col-lg-12 col-sm-3 control-label">Contact layer Heading 
								<span class="required">*</span>
							</label>
							<div class=" col-lg-12 col-sm-9">
								<input type="text" class="form-control" name="contect_heading_text" placeholder="Contact layer Heading" required="" value="<?=$q['contect_heading_text']?>">
							</div><!-- /12 -->
						</div><!-- /form-group -->
					</div><!-- /form-horizontal -->

					<div class="col-lg-12 form-horizontal">
						<div class="form-group form-material">
							<label class="col-lg-12 col-sm-3 control-label">Request Callback Heading 
								<span class="required">*</span>
							</label>
							<div class=" col-lg-12 col-sm-9">
								<input type="text" class="form-control" name="request_call_back_heading" placeholder="Request Callback Heading" required="" value="<?=$q['request_call_back_heading']?>">
							</div><!-- /12 -->
						</div><!-- /form-group -->
					</div><!-- /form-horizontal -->

					<div class="col-lg-12 form-horizontal">
						<div class="form-group form-material">
							<label class="col-lg-12 col-sm-3 control-label">Request Callback Text 
								<span class="required">*</span>
							</label>
							<div class=" col-lg-12 col-sm-9">
								<input type="text" class="form-control" name="request_call_back_text" placeholder="Request Callback Text" required="" value="<?=$q['request_call_back_text']?>">
							</div><!-- /12 -->
						</div><!-- /form-group -->
					</div><!-- /form-horizontal -->
					<div class="col-lg-12 form-horizontal">
						<div class="form-group form-material">
							<label class="col-lg-12 col-sm-3 control-label">Request Callback Button Text 
								<span class="required">*</span>
							</label>
							<div class=" col-lg-12 col-sm-9">
								<input type="text" class="form-control" name="request_call_back_button" placeholder="Request Callback Button Text" required="" value="<?=$q['request_call_back_button']?>">
							</div><!-- /12 -->
						</div><!-- /form-group -->
					</div><!-- /form-horizontal -->

					<div class="row">
						<div class="col-md-6">
							<div class="form-group form-material">
								<label class="col-lg-12 col-sm-3 control-label">Counter 1 Heading 
									<span class="required">*</span>
								</label>
								<div class=" col-lg-12 col-sm-9">
									<input type="text" class="form-control" name="counter1_heading" placeholder="Counter 1 Heading" required="" value="<?=$q['counter1_heading']?>">
								</div><!-- /12 -->
							</div><!-- /form-group -->
						</div>
						<div class="col-md-6">
							<div class="form-group form-material">
								<label class="col-lg-12 col-sm-3 control-label">Counter 1 Value 
									<span class="required">*</span>
								</label>
								<div class=" col-lg-12 col-sm-9">
									<input type="text" class="form-control" name="counter1_value" placeholder="Counter 1 Value" required="" value="<?=$q['counter1_value']?>">
								</div><!-- /12 -->
							</div><!-- /form-group -->
						</div>
						<div class="col-md-6">
							<div class="form-group form-material">
								<label class="col-lg-12 col-sm-3 control-label">Counter 2 Heading 
									<span class="required">*</span>
								</label>
								<div class=" col-lg-12 col-sm-9">
									<input type="text" class="form-control" name="counter2_heading" placeholder="Counter 2 Heading" required="" value="<?=$q['counter2_heading']?>">
								</div><!-- /12 -->
							</div><!-- /form-group -->
						</div>
						<div class="col-md-6">
							<div class="form-group form-material">
								<label class="col-lg-12 col-sm-3 control-label">Counter 2 Value 
									<span class="required">*</span>
								</label>
								<div class=" col-lg-12 col-sm-9">
									<input type="text" class="form-control" name="counter2_value" placeholder="Counter 2 Value" required="" value="<?=$q['counter2_value']?>">
								</div><!-- /12 -->
							</div><!-- /form-group -->
						</div>
						<div class="col-md-6">
							<div class="form-group form-material">
								<label class="col-lg-12 col-sm-3 control-label">Counter 3 Heading 
									<span class="required">*</span>
								</label>
								<div class=" col-lg-12 col-sm-9">
									<input type="text" class="form-control" name="counter3_heading" placeholder="Counter 3 Heading" required="" value="<?=$q['counter3_heading']?>">
								</div><!-- /12 -->
							</div><!-- /form-group -->
						</div>
						<div class="col-md-6">
							<div class="form-group form-material">
								<label class="col-lg-12 col-sm-3 control-label">Counter 3 Value 
									<span class="required">*</span>
								</label>
								<div class=" col-lg-12 col-sm-9">
									<input type="text" class="form-control" name="counter3_value" placeholder="Counter 3 Value" required="" value="<?=$q['counter3_value']?>">
								</div><!-- /12 -->
							</div><!-- /form-group -->
						</div>
						<div class="col-md-6">
							<div class="form-group form-material">
								<label class="col-lg-12 col-sm-3 control-label">Counter 4 Heading 
									<span class="required">*</span>
								</label>
								<div class=" col-lg-12 col-sm-9">
									<input type="text" class="form-control" name="counter4_heading" placeholder="Counter 4 Heading" required="" value="<?=$q['counter4_heading']?>">
								</div><!-- /12 -->
							</div><!-- /form-group -->
						</div>
						<div class="col-md-6">
							<div class="form-group form-material">
								<label class="col-lg-12 col-sm-3 control-label">Counter 4 Value 
									<span class="required">*</span>
								</label>
								<div class=" col-lg-12 col-sm-9">
									<input type="text" class="form-control" name="counter4_value" placeholder="Counter 4 Value" required="" value="<?=$q['counter4_value']?>">
								</div><!-- /12 -->
							</div><!-- /form-group -->
						</div>
					</div><!-- /form-horizontal -->
					<div class="col-lg-12 form-horizontal">
						<div class="form-group form-material">
							<label class="col-lg-12 col-sm-3 control-label">Footer Contact Form Heading 
								<span class="required">*</span>
							</label>
							<div class=" col-lg-12 col-sm-9">
								<input type="text" class="form-control" name="footer_contact_form_heading" placeholder="Footer Contact Form Heading" required="" value="<?=$q['footer_contact_form_heading']?>">
							</div><!-- /12 -->
						</div><!-- /form-group -->
					</div><!-- /form-horizontal -->

					<div class="col-lg-12 form-horizontal">
						<div class="form-group form-material">
							<label class="col-lg-12 col-sm-3 control-label">Footer Contact Form Button 
								<span class="required">*</span>
							</label>
							<div class=" col-lg-12 col-sm-9">
								<input type="text" class="form-control" name="footer_contact_form_button" placeholder="Footer Contact Form Button" required="" value="<?=$q['footer_contact_form_button']?>">
							</div><!-- /12 -->
						</div><!-- /form-group -->
					</div><!-- /form-horizontal -->

	              	<div class="col-lg-12 form-horizontal">
		                <div class="example-wrap">
							<h4 class="example-title">Logo</h4>
							<div class="example">
								<input type="file" id="input-file-now" data-plugin="dropify" required data-default-file="<?=UPLOADS.$q['image']?>"/>
								<input type="text" name="image" required value="<?=$q['image']?>" hidden>
							</div><!-- /example -->
						</div><!-- /example-wrap -->
	              	</div><!-- /12/form-horizontal -->
					
	              	<div class="form-group form-material col-lg-12 text-right padding-top-m">
	                	<button type="submit" class="btn btn-primary" id="validateButton1">Submit</button>
	              	</div><!-- /form-group -->
	            </div><!-- /row/row-lg -->
	          </form>
	        </div><!-- /panel-body -->
      </div><!-- /panel -->
    </div>
</div><!-- /page/animsition -->

<script>
$(function(){
	$("#input-file-now").on('change',function(){
		$("#validateButton1").text('Wait File Is Uploading');
		var data = new FormData();
    	data.append('img', $(this).prop('files')[0]);
	    $.ajax({
	        type: 'POST',
	        processData: false,
	        contentType: false,
	        data: data,
	        url: '<?=BASEURL?>admin/post-photo-ajax',
	        dataType : 'json',
	        success: function(resp){
	        	// resp = $.parseJSON(resp);
	        	console.log(resp.data);
	       		if (resp.status == true)
	       		{
	       			$("#validateButton1").removeAttr('disabled');
	       			$("#validateButton1").text('Submit');
	       			$("input[name='image']").val(resp.data);
	       		}
	       		else
	       		{
	       			alert(resp.msg)
	       			$("#validateButton1").text('Upload An Image First');
	       		}
	        }
	    });
	})
})
</script>