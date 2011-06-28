<?php
function bdw_get_images() {
 
    // Get the post ID
    $iPostID = $post->ID;
 
    // Get images for this post
    $arrImages =& get_children('post_type=attachment&post_mime_type=image&post_parent=' . $iPostID );
 
    // If images exist for this page
    if($arrImages) {
 
        // Get array keys representing attached image numbers
        $arrKeys = array_keys($arrImages);
 
        /******BEGIN BUBBLE SORT BY MENU ORDER************
        // Put all image objects into new array with standard numeric keys (new array only needed while we sort the keys)
        foreach($arrImages as $oImage) {
            $arrNewImages[] = $oImage;
        }
 
        // Bubble sort image object array by menu_order TODO: Turn this into std "sort-by" function in functions.php
        for($i = 0; $i < sizeof($arrNewImages) - 1; $i++) {
            for($j = 0; $j < sizeof($arrNewImages) - 1; $j++) {
                if((int)$arrNewImages[$j]->menu_order > (int)$arrNewImages[$j + 1]->menu_order) {
                    $oTemp = $arrNewImages[$j];
                    $arrNewImages[$j] = $arrNewImages[$j + 1];
                    $arrNewImages[$j + 1] = $oTemp;
                }
            }
        }
 
        // Reset arrKeys array
        $arrKeys = array();
 
        // Replace arrKeys with newly sorted object ids
        foreach($arrNewImages as $oNewImage) {
            $arrKeys[] = $oNewImage->ID;
        }
        ******END BUBBLE SORT BY MENU ORDER**************/
 
        // Get the first image attachment
        $iNum = $arrKeys[0];
 
        // Get the thumbnail url for the attachment
        $sThumbUrl = wp_get_attachment_thumb_url($iNum);
 
        // UNCOMMENT THIS IF YOU WANT THE FULL SIZE IMAGE INSTEAD OF THE THUMBNAIL
        //$sImageUrl = wp_get_attachment_url($iNum);
 
        // Build the <img> string
        $sImgString = '<a href="' . get_permalink() . '">' .
                            '<img src="' . $sThumbUrl . '" width="150" height="150" alt="Thumbnail Image" title="Thumbnail Image" />' .
                        '</a>';
 
        // Print the image
        echo $sImgString;
    }
}
?>