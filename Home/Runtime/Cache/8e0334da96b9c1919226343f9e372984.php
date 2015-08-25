<?php if (!defined('THINK_PATH')) exit();?><div class="show"><?php echo ($show); ?></div>
<div class="comments">
    <div class="comments-title">Comments Area</div>
    <?php if(is_array($list)): foreach($list as $key=>$vo): ?><div class="item-title"><?php echo ($vo["id"]); ?></div>
            <div class="item-body"></div>
        </div>
    <hr/><?php endforeach; endif; ?>
    <div class="item">
</div>