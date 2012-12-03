<?php


require_once $smarty->_get_plugin_filepath('shared', 'make_timestamp');

function smarty_modifier_date($string, $format='%b %e, %Y') {
    if ($string != '') {
        $timestamp = smarty_make_timestamp($string);
    } elseif ($default_date != '') {
        $timestamp = smarty_make_timestamp($default_date);
    } else {
        return;
    }
    return DateToWords($timestamp, $format);
}


/* The functions takes the date as a timestamp */
function DateToWords($time, $format) {
	$_word = "";

	/* Get the difference between the current time
	 and the time given in days */
	$days = intval((time() - $time) / 86400);

	switch($days) {
		case -1: $_word = gettext("tomorrow");
			break;
		case 0: $_word = gettext("today");
			break;
		case 1: $_word = gettext("yesterday");
			break;
		case ($days >= 2 && $days <= 6):
			$_word = vsprintf(gettext("%d days ago"), array($days));
			break;
		case ($days >= 7 && $days <= 14):
			$_word= gettext("1 week ago");
			break;
		case ($days >= 14 && $days <= (365.25/12)):
			$_word = vsprintf(gettext("%d weeks ago"), array(intval($days / 7)));
			break;
		case ($days >= (365.25/12) && $days <= 2*(365.25/12)):
			$_word = gettext("1 month ago");
			break;
		case ($days >= 2*(365.25/12) && $days <= 365.25):
			$_word = vsprintf(gettext("%d months ago"), array(intval($days / (365.25/12))));
			break;
		case ($days >= 365.25 && $days <= 2*365.25):
			$_word = gettext("1 year ago");
			break;
		case ($days >= 2*365.25 && $days <= 2.5*365.25):
			$_word = gettext("2 years ago");
			break;
		default: return date($format, $time);
	}
	return $_word;
}

?>
