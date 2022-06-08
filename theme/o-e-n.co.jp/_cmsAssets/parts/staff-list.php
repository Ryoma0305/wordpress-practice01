<?php
	$staff_list = get_field("staff_list");
?>
	<div class="p-staffList">
		<?php if($staff_list): ?>
		<h3 class="p-staffList__title">Staff list</h3>
			<ul class="p-staffList__list">
				<?php foreach($staff_list as $staff): ?>
				<li class="p-staffList__listChild">
					<dl>
						<dt><?php echo $staff["postion"]; ?></dt>
						<dd><?php echo $staff["name"]; ?></dd>
					</dl>
				</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
	</div>
