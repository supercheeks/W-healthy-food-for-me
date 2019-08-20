<?php
function alert($msg)
{
    echo "<script>alert('".$msg."');</script>";
}

function move($add)
{
    echo "<script>location.href='".$add."';</script>";
}

function parseStringToArray($str, $mode)
{
    if($str == "") return array();
    
    $arr = explode("?", $str);
    
    if($mode > 0)
    {
        foreach($arr as $aKey => $a)
        {
            $arr[$aKey] = explode(";", $a);

            if($mode > 1)
            {
                foreach($arr[$aKey] as $aKey2 => $a2) 
                {
                    $arr[$aKey][$aKey2] = explode("!", $a2);
                }
            }
        }
    }
    
    return $arr;
}
?>