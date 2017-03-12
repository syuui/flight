<?php
$error = $this->viewVars['error'];

$errorTitle = isset($error->errorTitle) ? $error->errorTitle : "出错啦";
$errorMessage = isset($error->errorMessage) ? $error->errorMessage : "产生了一个服务器内部错误。</p><p>点击“确定”将返回主页。";
$errorHint = isset($error->errorHint) ? $error->errorHint : "猛击“确定”";
$errorFlyTo = isset($error->errorFlyTo) ? $error->errorFlyTo : '/';

?>
<div class="m-layer z-show">
	<table>
		<tbody>
			<tr>
				<td>
					<article class="lywrap">
						<header class="lytt">
							<h2 class="u-tt"><?php echo $errorTitle?></h2>
						</header>
						<section class="lyct">
							<p><?php echo $errorMessage;?></p>
						</section>
						<footer class="lybt">
							<div class="lyother">
								<p><?php echo $errorHint?></p>
							</div>
							<div class="lybtns">
								<button type="button" class="u-btn"
									onclick="location.href='<?php echo $errorFlyTo;?>'">确定</button>
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