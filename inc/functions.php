<?php

function normalizeString( $str ) 
{
	$str  = trim($str);
	$str  = str_replace("\r", "\n", $str);
	$str  = preg_replace( array( '/\n+/', '/[ \t]+/' ), array( "\n", ' ' ), $str );
	return $str;
}


function getEmails($max_pages = 10,$lang="en")
{
$max_results = 100;

$use_keywords = false;
/*add a keyword or two separate by +'s 
	for example this will work: $keywords="make+money";
	but this will not: $keywords="make money";
*/
$keywords="hello";

for ($i = 1; $i <= $max_pages; $i++) 
{
  if (!$use_keywords) 
  {
		$keywords = "";
  } 
$file = file_get_contents(
"http://search.twitter.com/search?page=".$i."&rpp=".$max_results."&ands=".$keywords."&ors=gmail.com+yahoo.com+msn.com+gmx.ch+gmx.net+gmx.de+aol.com+hotmail.com&lang=".$lang);

$file = strip_tags($file);
 
preg_match_all("([a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+(?:[A-Z]{2}|com|org|net|gov|ch|biz|info|mobi|name|de|jobs|museum)\b)siU", $file, $matches);
}

return array_unique($matches[0]);
}



function cutString($text, $nChars = 130, $suffix = '…' )
	{
		if (mb_strlen($text ) <= $nChars )
		{
			return $text;
		}
		return mb_substr($text, 0, $nChars - mb_strlen($suffix ) ) . $suffix;
	}

function getRandomColor()
{
    for ($i = 0; $i<6; $i++)
    {
        $c .=  dechex(rand(0,15));
    }
    return "$c";
} 


function randomImage()
{
$total = "3";
$file_type = ".jpg";
$image_folder = "inc/images/";
$start = "1";
$random = mt_rand($start, $total);
$image_name = "inc/images/".$random . $file_type;

return $image_name;
//echo "<img src=\"$image_folder/$image_name\" alt=\"$image_name\" />";

}




?>
