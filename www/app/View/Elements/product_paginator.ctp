<span class="paginator">
    <p><? echo $this->Paginator->numbers(array('first' => '<< First | ', 'last' => ' | Last >>')); ?></p>
    <p><? echo $this->Paginator->counter('Page {:page} of {:pages}. Displaying {:current} products of {:count} '); ?></p>
</span>