<?php



/*

  +----------------------------------------------------------------------+

  | ThumbnaiI Image v.: 0.1 (05.12.2006)                                 |

  +----------------------------------------------------------------------+

  | Generate thumbnail images                                            |

  +----------------------------------------------------------------------+  

  | Author: Stigmat <multzone@inbox.ru>                                  |

  +----------------------------------------------------------------------+

*/



class SmartThumb {



// get

var $PathImgOld;

var $PathImgNew;

var $NewWidth;

var $NewHeight;



// tmp

var $mime;


public function __construct()
{
	
}

function imagejpeg_new ($NewImg,$path_img) {

if ($this->mime == 'image/jpeg' or $this->mime == 'image/pjpeg') imagejpeg($NewImg,$path_img);

elseif ($this->mime == 'image/gif') imagegif($NewImg,$path_img);

elseif ($this->mime == 'image/png') imagepng($NewImg,$path_img);

else return(false);

return(true);

}



function imagecreatefromjpeg_new($path_img) {

if ($this->mime == 'image/jpeg' or $this->mime == 'image/pjpeg') $OldImg=imagecreatefromjpeg($path_img);

elseif ($this->mime == 'image/gif') $OldImg=imagecreatefromgif($path_img);

elseif ($this->mime == 'image/png') $OldImg=imagecreatefrompng($path_img);

else return(false);

return($OldImg);

}



function create_thumbnail_images() {

$PathImgOld = $this->PathImgOld;

$PathImgNew = $this->PathImgNew;

$NewWidth = $this->NewWidth;

$NewHeight = $this->NewHeight;



$Oldsize = @getimagesize($PathImgOld);

$this->mime = $Oldsize['mime'];

$OldWidth = $Oldsize[0];

$OldHeight = $Oldsize[1];



if ($NewHeight=='' and $NewWidth!='') {

$NewHeight = ceil(($OldHeight*$NewWidth)/$OldWidth);

}

elseif ($NewWidth=='' and $NewHeight!='') {

$NewWidth = ceil(($OldWidth*$NewHeight)/$OldHeight);

}

elseif ($NewHeight=='' and $NewWidth=='') {

return(false);

}



$OldHeight_castr = ceil(($OldWidth*$NewHeight)/$NewWidth);

$castr_bottom = ($OldHeight-$OldHeight_castr)/2;



$OldWidth_castr = ceil(($OldHeight*$NewWidth)/$NewHeight);

$castr_right = ($OldWidth-$OldWidth_castr)/2;



if ($castr_bottom>0) {

$OldWidth_castr = $OldWidth;

$castr_right = 0;

}

elseif ($castr_right>0) {

$OldHeight_castr = $OldHeight;

$castr_bottom = 0;

}

else {

$OldWidth_castr = $OldWidth;

$OldHeight_castr = $OldHeight;

$castr_right = 0;

$castr_bottom = 0;

}



$OldImg=$this->imagecreatefromjpeg_new($PathImgOld);

if ($OldImg) 
{
		$NewImg_castr=imagecreatetruecolor($OldWidth_castr,$OldHeight_castr);
		if($this->mime == 'image/png')
		{
			$background = imagecolorallocate($NewImg_castr, 0, 0, 0);
			imagecolortransparent($NewImg_castr, $background);
			imagealphablending($NewImg_castr, false);
			imagesavealpha($NewImg_castr, true);
		}
		elseif($this->mime == 'image/gif')
		{
			$background = imagecolorallocate($NewImg_castr, 0, 0, 0);
			imagecolortransparent($NewImg_castr, $background);
		}
		if ($NewImg_castr) 
		{
			imagecopyresampled($NewImg_castr,$OldImg,0,0,$castr_right,$castr_bottom,$OldWidth_castr,$OldHeight_castr,$OldWidth_castr,$OldHeight_castr);	
			$NewImg=imagecreatetruecolor($NewWidth,$NewHeight);
			if($this->mime == 'image/png')
			{
				$background = imagecolorallocate($NewImg, 0, 0, 0);
				imagecolortransparent($NewImg, $background);
				imagealphablending($NewImg, false);
				imagesavealpha($NewImg, true);
			}
			elseif($this->mime == 'image/gif')
			{
				$background = imagecolorallocate($NewImg, 0, 0, 0);
				imagecolortransparent($NewImg, $background);
			}
			if ($NewImg) 
			{
				imagecopyresampled($NewImg,$NewImg_castr,0,0,0,0,$NewWidth,$NewHeight,$OldWidth_castr,$OldHeight_castr);
				imagedestroy($NewImg_castr);
				imagedestroy($OldImg);
				if (!$this->imagejpeg_new($NewImg,$PathImgNew)) 
					return (false);
				imagedestroy($NewImg);
			}
		}
}
else 
{
	return(false);
}
return(true);

}



}



?> 