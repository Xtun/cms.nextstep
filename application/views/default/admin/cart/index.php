	<div class="admin_module_title"><h4><?=!empty($module_title) ? $module_title : '';?></h4></div>
	<div id="content">
		<div class="cart_module">
			<form action="<?=base_url();?>admin/cart" method="post">
				<div class="admin_module_form">родительская страница
					<select name="parent_id" class="page_select_list">
						<option value="0">не выбрано</option>
						<?=$page_select;?>
					</select>
					<input type="submit" value="выбрать" class="g-button"/>
					<a class="g-button" href="<?=base_url();?>admin/cart/add/<?=$parent_id;?>">создать</a>
				</div>
			</form>
			<ul class="admin_list">
				<?php if (!empty($list_cart)) :?>
				<?php foreach ($list_cart as $cart) :?>
				<li id="cart<?=$cart->id;?>" onmouseover="$(this).children().children().css('color', '#0099cc')" onmouseout="$(this).children().children().css('color', '#666666')">
					<em><a href="<?=base_url();?>admin/cart/edit/<?=$cart->id;?>/<?=$parent_id;?>"><?=$cart->title;?></a></em>
					<a href="<?=base_url();?>admin/cart/delete/<?=$cart->id;?>/<?=$parent_id;?>" class="admin_form_action_page" onclick="if (confirm('Вы уверены?')) return true; else return false;" title="удалить"><img title="удалить" alt="удалить" src="<?=base_url();?>/img/admin/icon_delete_1.5.png"/></a>
					<a href="<?=base_url();?>admin/cart/edit/<?=$cart->id;?>/<?=$parent_id;?>" class="admin_form_action_page" title="редактировать"><img title="редактировать" alt="редактировать" src="<?=base_url();?>/img/admin/icon_edit_1.5.png"/></a>
					<div class="clear"></div>
				</li>
				<?php endforeach; ?>
				<?php endif; ?>
			</ul>
		</div>
	</div>