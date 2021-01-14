<div id="sub-bnnr">
			<img src="/resource/images/notice-bnnr04.png" alt="" class="mb-hide">
			<img src="/resource/images/notice-bnnr04-m.png" alt="" class="mb-show">
			<h2>
				<small>커뮤니티</small>
				<span>온라인 상담</span>
			</h2>
		</div>
		<div id="container-box" class="sub">
			<section class="container">
				<?php include_once "../inc/location.php"; ?>

				<div class="board-list sub">
					<table>
						<caption>온라인상담 내용</caption>
						<thead style="display: none;">
							<tr>
								<th scope="col" class="subject">제목</th>
								<th scope="col" class="date">작성일</th>
							</tr>
						</thead>
						<tbody>
							<tr class="notice">
								<td class="subject">
                                <?=$jb_no?><?=$jb_title?>
								</td>
								<td width="300">
									<span class="date">작성일&nbsp;<?=$jb_reg_date?></span>
									<span class="view">작성자&nbsp;<?=$jb_name?></span>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<div class="view-box">
                                    <?=$content?>
									</div>
								</td>
							</tr>
                            <?php
									if($file_cnt > 0) {
										for($i=0; $i<$file_cnt; $i++)	{
											if($ex_jb_file_name[$i]) {
												//파일의 확장자
												$file_ext = substr( strrchr($ex_jb_file_name[$i], "."),1);
												$file_ext = strtolower($file_ext);	//확장자를 소문자로...

												// if ($file_ext=="gif" || $file_ext=="jpg" || $file_ext=="png" || $file_ext=="bmp") {
												// 	echo "<tr><td colspan='2'><div class='file-box'><a  class='file'  href='" . $GP->UP_IMG_SMARTEDITOR_URL ."jb_${jb_code}/${ex_jb_file_code[$i]}' target='_blank'>";
												// 	echo "<img src=\"" . $GP->UP_IMG_SMARTEDITOR_URL ."jb_" . $jb_code . "/" . $ex_jb_file_code[$i] ."\" class='imgResponsive'>";
												// 	echo "</a></div></td></tr>";
                                                // }
                                                // else{
                                                    $code_file = $GP->UP_IMG_SMARTEDITOR. "jb_${jb_code}/${ex_jb_file_code[$i]}";
                                                    echo "<tr><td colspan='2'><div class='file-box'><p>$filetext<a class='file' href=\"/bbs/download.php?downview=1&file=" . $code_file . "&name=" . $ex_jb_file_name[$i] . " \">$ex_jb_file_name[$i]</a></p></div></td></tr>";

                                                // }
											}
										}
									}
								?>
						</tbody>
					</table>
					<div id="btn-box">
                    <?                    
                     //답변권한                            
                     if($check_level >= $db_config_data['jba_reply_level']){                       
                        $onclick4 = "onclick=\"javascript:location.href='${get_par}&jb_mode=treply'\"";
                        ?>
                            <a href='#none' <?=$onclick4?> class='btn bg-yellow' style='width: 151px;'>답글</a>
                        <?
                        }					

                    if($check_level >= 9 || $check_id == $jb_mb_id){
                    //echo "<a href=\"#none\"  onclick=\"javascript:location.href='/notice/notice.php?jb_code=${jb_code}&jb_idx=${jb_idx}&search_key=${search_key}&search_keyword=${search_keyword}&page=${page}&jb_mode=tmodify&jb_mode=tmodify'\" title='수정' class='btn bg-yellow' style='width: 151px;'>수정</a>";
                    $onclick1 = "onclick=\"javascript:location.href='/notice/page.php?jb_code=${jb_code}&jb_idx=${jb_idx}&search_key=${search_key}&search_keyword=${search_keyword}&page=${page}&jb_mode=tmodify&jb_mode=tmodify'\"";
                    ?>
                      <a href='#none' <?=$onclick1?> class='btn bg-yellow' style='width: 151px;'>수정</a>
                    <?
                    }
                    //삭제권한(쓰기권한이 있어야 삭제 가능)
                    if($check_level >= 9 || $check_id == $jb_mb_id){
                    //echo "<a href=\"#none\"   onclick=\"javascript:location.href='${get_par}&jb_mode=tdelete'\"  class='btn bg-pink' style='width: 151px;' title='삭제'>삭제</a>";
                    $onclick2 = " onclick=\"javascript:location.href='${get_par}&jb_mode=tdelete'\"";
                    ?>
                     <a href='#none' <?=$onclick2?> class='btn bg-pink' style='width: 151px;'>삭제</a>
                    <?
                    }
					//글목록버튼
                    //echo "<a href=\"#none\" onclick=\"javascript:location.href='${index_page}?jb_code=${jb_code}&${search_key}&search_keyword=${search_keyword}&page=${page}'\"  class='btn bg-pink' style='width: 151px;'title='목록'>목록</a>";
                    $onclick3 = "onclick=\"javascript:location.href='${index_page}?jb_code=${jb_code}&${search_key}&search_keyword=${search_keyword}&page=${page}'\"";
					?>
                      <a href='#none' <?=$onclick3?> class='btn bg-pink' style='width: 151px;'>목록</a>
					</div>
				</div>
			</section>
		</div>