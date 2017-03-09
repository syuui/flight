<div class="m-layer z-show">
	<table>
		<tbody>
			<tr>
				<td>
					<article class="lywrap">
						<header class="lytt">
							<h2 class="u-tt">出错啦</h2>
						</header>
						<section class="lyct">
							<p>您试图访问了一个不存在的地址！</p>
							<p>点击“确定”将返回主页。</p>
						</section>
						<footer class="lybt">
							<div class="lyother">
								<p>猛击“确定”</p>
							</div>
							<div class="lybtns">
								<button type="button" class="u-btn"
									onclick="location.href='/Company'">确定</button>
							</div>
						</footer>
					</article>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<?php
if (Configure::read('debug') > 0) :
    echo $this->element('exception_stack_trace');

endif;
?>
