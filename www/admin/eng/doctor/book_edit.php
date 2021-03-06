<?php
	include_once("../../_init.php");
	include_once($GP -> INC_ADM_PATH."/head.php");	
	include_once($GP -> CLS."/class.doctor.php");
	$C_Doctor 	= new Doctor;
	
	$args = "";
	$args['tb_idx'] 	= $_GET['tb_idx'];
	$rst = $C_Doctor ->Book_Info($args);	
	
	if($rst) {
		extract($rst);
		$tb_title		 = $C_Func->dec_contents_edit($tb_title);				
		$tb_content  = $C_Func->dec_contents_edit($tb_content);				
	}
	$ps_select = $C_Func -> makeSelect_Normal('tb_type', $GP -> DOCTOR_PUBLISH, $tb_type, '', '::선택::');		
?>
<body>
<div class="Wrap_layer"><!--// 전체를 감싸는 Wrap -->
	<div class="boxContent_layer">
		<div class="boxContentHeader">
			<span class="boxTopNav"><strong>방송출연, 자문, 저서 및 논문 수정</strong></span>
		</div>
		<form name="base_form" id="base_form" method="POST" action="?" enctype="multipart/form-data">
		<input type="hidden" name="mode" id="mode" value="BOOK_MODI" />
		<input type="hidden" name="tb_idx" id="tb_idx" value="<?=$_GET['tb_idx']?>" />
		<input type="hidden" name="before_image_main" id="before_image_main" value="<?=$tb_file_code?>" />
		<div class="boxContentBody">			
			<div class="boxMemberInfoTable_layer">				
				<table class="table table-bordered">
					<tbody>
						<tr>
							<th><span>*</span>타입</th>
							<td>
								<?=$ps_select?>
							</td>
						</tr>
						<tr>
							<th width="25%"><span>*</span>제목</th>
							<td width="75%">
								<input type="text" class="input_text" size="50" name="tb_title" id="tb_title" value="<?=$tb_title?>" />
							</td>
						</tr>						
						<tr>
							<th><span>*</span>방송사,출판사,학술대회</th>
							<td>
								<input type="text" class="input_text" size="50" name="tb_content" id="tb_content" value="<?=$tb_content?>" />
							</td>
						</tr>							
						<tr>
							<th><span>*</span>첨부파일</th>
							<td>
								<input type="file" name="tb_file" id="tb_file" size="30">
								<?
										if($tb_file_code != "") {
											echo  "<br>" . $tb_file_code;
								?>
									<a href="#" onClick="img_del('<?=$tb_file_code;?>','<?=$_GET['tb_idx']?>')">(X)</a>
								<? } ?>
							</td>
						</tr>		
					</tbody>
				</table>				
				<div style="margin-top:5px; text-align:center;">
				<button id="img_submit" class="btnSearch ">수정</button>
				<button id="img_cancel" class="btnSearch ">취소</button>
				</div>
			</div>
		</div>
		<input type="hidden" name="img_full_name" id="img_full_name" />
 	  <input type="hidden" name="upfolder" id="upfolder" value="../../common/book" />
		</form>
	</div>
</div>
</body>
</html>
<script type="text/javascript" src="<?=$GP -> JS_PATH?>/jquery.alphanumeric.js"></script>
<script type="text/javascript" src="<?=$GP -> JS_PATH?>/jquery.validate.js"></script>
<script type="text/javascript" src="<?=$GP -> JS_SMART_PATH?>/HuskyEZCreator.js" charset="utf-8"></script>
<script type="text/javascript" src="<?=$GP -> JS_PATH?>/jquery.base64.js"></script>
<script type="text/javascript">

	$(document).ready(function(){	
														 
		$('#img_cancel').click(function(){
				parent.modalclose();				
		});															 
														 
		
		$('#img_submit').click(function(){
				
				if($('#tb_title').val() == '') {
					alert("제목을 입력하세요");
					$('#tb_title').focus();
					return false;
				}				
		
		/*
				if($('#tb_content').val() == '') {
					alert('내용을 입력하세요');
					return false;
				}		
			*/	
				$('#base_form').attr('action','./proc/dt_proc.php');
				$('#base_form').submit();
				return false;							
		});
	});
	
	function img_del(image, idx)
	{
		if(!confirm("삭제하시겠습니까?")) return;

		$.ajax({
			type: "POST",
			url: "./proc/dt_proc.php",
			data: "mode=BOOK_IMGDEL&tb_idx=" + idx + "&tb_file=" + image,
			dataType: "text",
			success: function(msg) {

				if($.trim(msg) == "true") {
					alert("삭제되었습니다");
					window.location.reload();
					return false;
				}else{
					alert('삭제에 실패하였습니다.');
					return;
				}
			},
			error: function(xhr, status, error) { alert(error); }
		});
	}

</script>
