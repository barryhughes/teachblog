<div class="teachblog no-blog">

	<?php if (isset($signed_in) and $signed_in): ?>

		<h5><?php _e('You do not currently have a blog', 'teachblog') ?></h5>

		<p><?php _e('Before you can begin writing posts you will need a blog of your own. You may need assistance '
				. 'from a teacher or administrator to set this up.', 'teachblog') ?></p>

	<?php else: ?>

		<h5><?php _e('You must be signed in to post to your blog', 'teachblog') ?></h5>

		<p><?php _e('It looks like you are not currently signed in. You must have a blog already set up and be signed '
				. 'in to continue &ndash; if you need any further help please contact a teacher or administrator.', 'teachblog') ?></p>

	<?php endif; ?>
</div>