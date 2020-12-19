<?php

// the redirect function
function redirect($page)
{
	header('Location:' .URLROOT .'/'. $page);
}