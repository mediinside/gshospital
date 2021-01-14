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

				<div class="board-list">
					<table>
						<caption>온라인 상담 리스트</caption>
						<thead>
							<tr class="notice">
								<th scope="col" class="num">NO</th>
								<th scope="col" class="subject">제목</th>
								<th scope="col" class="date">작성자</th>
								<th scope="col" class="date">작성일</th>
							</tr>
						</thead>
							<?php include $GP -> INC_PATH . "/${skin_dir}/board_list_inc.php";	?>
                        </tbody>
                    </table>
                    <form class="board-search" id="search_form" name="search_form" method="get" action="?">
                        <input type="hidden" name="jb_code" id="jb_code" value="40">
                        <fieldset>
                            <legend>게시물 검색</legend>
                            <select name="search_key" id="search_key">
                                 <option value="jb_title" <?php if($_GET['search_key']=="jb_title") echo " selected";?>>제목</option>
                            </select>
                            <input type="search" class="search-input" placeholder="키워드를 입력하세요." name="search_keyword" id="search_keyword"
                            value="<?=$_GET['search_keyword']?>">
                            <button type="submit" class="search-btn" id="search_submit"><span>검색</span></button>
                        </fieldset>
                        <?                      
                        
                         //쓰기권한                       
                        if($check_level >= $db_config_data['jba_write_level']) {
                            echo "<button type='button' class='btn bg-pink' href=\"#\" onclick=\"javascript:location.href='${index_page}?jb_code=${jb_code}&jb_mode=twrite'\" title='글쓰기'>글쓰기</button>";
                        } else {
                            echo "<a class='btn bg-pink' id='twrite_btn' title='글쓰기'><strong>글쓰기</strong></a>";
                        }
                        ?>

                    </form>
                    <div class="pagination">
                      <?=$page_link?>
                    </div>
                </div>
            </section>
        </div>
					<script type="text/javascript">
					$(document).ready(function(){
						$('#search_submit').click(function(){
							$('#search_form').submit();
							return false;
						});

						$('#page_row').change(function(){
							var val = $(this).val();
							location.href="?dep1=<?=$_GET['dep1']?>&dep2=<?=$_GET['dep2']?>&search_key=<?=$_GET['search_key']?>&search_keyword=<?=$_GET['search_keyword']?>&page=<?=$_GET['page']?>&page_row=" + val;
						});

						$('#twrite_btn').click(function(){
							alert("로그인 후 이용가능 합니다.");
							location.href ='/member/login.html?reurl=/community/page03.html';
						});
					});
					</script>
					<style>
						.board-list .subject a {
							text-indent:25px;
						}
					</style>