<?php if( ($toc = do_shortcode('[op-toc]')) !== "\n") :?>
<div class="snippet-toc left">
	<div class="content">
		<div class="header">
			Table of Contents
		</div>

		<?=$toc;?>
	</div>
</div>