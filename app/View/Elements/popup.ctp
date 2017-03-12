<script language="JavaScript">
function removeLayer() {
	_lyr=document.getElementById('popup_win');
	_lyr.parentNode.removeChild(_lyr);
	location.href='$flyTo';
}
</script>
<div class="m-layer z-show" id="popup_win">
	<table>
		<tbody>
			<tr>
				<td><article class="lywrap">
						<header class="lytt">
							<h2 class="u-tt"><?php echo $title?></h2>
							<span class="lyclose" onclick="removeLayer();">×</span>
						</header>
						<section class="lyct">
							<p><?php echo $message?></p>
						</section>
						<footer class="lybt">
							<div class="lyother">
								<p><?php echo $hint?></p>
							</div>
							<div class="lybtns">
								<button type="button" class="u-btn" onclick="removeLayer();">确定</button>
							</div>
						</footer>
					</article></td>
			</tr>
		</tbody>
	</table>
</div>