<ol class="breadcrumb">
    <?php foreach ($items as $key=>$item): ?>
        <?php if ($key === $active): ?>
            <li class="active" id="breadcrumb_item_<?php echo $key+1; ?>">
                    <?php echo $item['title']; ?>
            </li>
        <?php else: ?>
            <li id="breadcrumb_item_<?php echo $key+1; ?>">
                <a href="<?php echo $item['url']; ?>">
                    <?php echo $item['title']; ?>
                </a>
            </li>
        <?php endif; ?>
    <?php endforeach; ?>
</ol>