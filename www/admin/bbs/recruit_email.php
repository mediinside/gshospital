<?php
	include_once("../../_init.php");
	include_once($GP -> INC_ADM_PATH."/head.php");	
	include_once($GP->CLS."class.recruit.php");
	$C_Recruit 	= new Recruit;

	$args = '';
	$args['arr_idx'] = $_GET['arr_idx'];
	$data = $C_Recruit->Recruit_info_All($args);

	$rs_email = "";
	$rs_name = "";
	for($i=0; $i<count($data); $i++) {
		$rs_email .= $data[$i]['rc_email'] . ",";
		$rs_name .= $data[$i]['rc_name'] . ",";
	}
	$rs_email = rtrim($rs_email,',');
	$rs_name = rtrim($rs_name,',');
?>
<body>
<div class="Wrap_layer"><!--// 전체를 감싸는 Wrap -->
	<div class="boxContent_layer">
		<div class="boxContentHeader">
			<span class="boxTopNav"><strong>입사지원 메일 발송</strong></span>
		</div>
		<form name="base_form" id="base_form" method="POST" action="?">
		<input type="hidden" name="mode" id="mode" value="RECRUIT_EMAIL" />
		<input type="hidden" name="receive_email" id="receive_email" value="<?=$rs_email?>" />
		<input type="hidden" name="sender_email" id="sender_email" value="<?=$GP -> Admin_Email?>" />
		<div class="boxContentBody">
			<div class="boxMemberInfoTable_layer">
				<div class="layerTable"> 
					<table class="table table-bordered">
						<tbody>
							<tr>
								<th width="30%"><span>*</span>받는 사람</th>
								<td width="70%">
									<input type="text" class="input_text" size="150" name="receive_name" id="receive_name" value="<?=$rs_name?>" readonly />
								</td>
							</tr>
							<tr>
								<th><span>*</span>보내는 사람</th>
								<td>
									<input type="text" class="input_text" size="25" name="sender_name" id="sender_name" value="<?=$GP -> Admin_HP_NAME?>" />
								</td>
							</tr>
							<tr>
								<th><span>*</span>제 목</th>
								<td>
									<input type="text" class="input_text" size="100" name="email_subject" id="email_subject" value="" />
								</td>
							</tr> 
							<tr>
								<th><span>*</span>내용</th>
								<td>
									<textarea name="email_content" id="email_content" style="width:98%; height:200px; overflow:auto;" ></textarea>
								</td>
							</tr>	
						</tbody>
					</table>
				</div>
				<div class="btnWrap">
				<button id="img_submit" class="btnSearch ">보내기</button>
				<button id="img_cancel" class="btnSearch ">취소</button>
				</div>
			</div>
		</div>
		</form>
	</div>
</div>
</body>
</html>
<script src="/admin/js/jquery.alphanumeric.js" type="text/javascript"></script>
<script type="text/javascript" src="/admin/js/jquery.validate.js"></script>
<script type="text/javascript">

	$(document).ready(function(){	
														 
		$('#img_submit').click(function(){					
			$('#base_form').submit();
			return false;
		});
		
		$('#img_cancel').click(function(){
				parent.modalclose();				
		});		
		
		
		$('#base_form').validate({
			rules: {	
				email_subject: { required: true },
				email_content: { required: true }
			},
			messages: {	
				email_subject: { required: "제목을 입력하세요" },
				email_content: { required: "내용을 입력하세요" }
			},
			onkeyup:false,
			onclick:false,
			onfocusout:false,			
			showErrors: function(errorMap, errorList) {
				if(!$.isEmptyObject(errorList)){
		      var caption = $(errorList[0].element).attr('caption') || $(errorList[0].element).attr('name');
					alert(errorList[0].message);
				}
			},
			submitHandler: function(frm) {
			if (!confirm("메일을 보내시겠습니까?")) return false;                
				frm.action = './proc/recruit_proc.php';
				frm.submit(); //통과시 전송
				return true;
			},

			success: function(element) {
			//
			}
		
		});
		
	});
</script>
