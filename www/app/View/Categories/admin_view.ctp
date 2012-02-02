<h1>View category - <?php echo $category['Category']['firstname'] . ' ' . $category['Category']['lastname'] . ' - ' . $category['Category']['email'] ; ?></h1>
<ul class="tools">
    <li><?php echo $this->Html->link(__('Edit category', true), array( 'action' => 'admin_edit', $category['Category']['id']));?></li>
</ul>
<table>
<?php foreach($category['Category'] as $key => $value): ?>
    <tr>
        <td class="key"><?php echo $key ?></td>
        <td class="value"><?php echo $value ?></td>
    </tr>
<?php endforeach; ?>
</table>

