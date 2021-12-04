<?php
function Action($act, $msg)
{
	return '<div class="alert bg-' . $act . ' text-center text-white mt-2">' . $msg . '</div>';
}
