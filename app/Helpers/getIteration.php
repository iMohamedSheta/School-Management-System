


<?php


function getIteration($loop_name,$loop)
{
     return ($loop_name->currentPage() - 1) * $loop_name->perPage() + $loop->index + 1;

}


