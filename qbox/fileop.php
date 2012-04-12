<?php

/**
 * func MakeStyleURL(url string, templPngFile string, params string, quality int) => (urlMakeStyle string)
 */
function QBox_FileOp_MakeStyleURL($url, $templPngFile, $params, $quality = 85) {
	return $url . '/stylePreview/' . QBox_Encode($templPngFile) . '/params/' . QBox_Encode($params) . '/quality/' . $quality;
}

/**
 * func ImagePreviewURL(url string, thumbType int) => (urlImagePreview string)
 */
function QBox_FileOp_ImagePreviewURL($url, $thumbType) {
	return $url . '/imagePreview/' . $thumbType;
}

/**
 * func ImageInfoURL(url string) => (urlImageInfo string)
 */
function QBox_FileOp_ImageInfoURL($url) {
	return $url . '/imageInfo';
}
