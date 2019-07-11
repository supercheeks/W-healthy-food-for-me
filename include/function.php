<?php
function alert($msg)
{
    echo "<script>alert('".$msg."');</script>";
}

function move($add)
{
    echo "<script>location.href='".$add."';</script>";
}
?>