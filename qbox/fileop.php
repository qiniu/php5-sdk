<?php

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
