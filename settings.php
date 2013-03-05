<div class="wrap">
<div id="icon-options-general" class="icon32"><br></div><h2>Wp Catalogue Settings</h2>
<div class="wpc-left-liquid">
<div class="wpc-left">
		<div class="wpc-headings"><h3>Settings</h3></div>
		<div class="wpc-inner">
		<p class="description">Adjust the basic presentation of your product catalogue here. It is important to set this up before you start uploading products so the plugin knows what size to generate thumbnails and product images </p>
       <p class="description">You can further customize the the of your product catalogue in your theme css. </p>
		<form method="post" action="options.php">
		<?php settings_fields( 'baw-settings-group' ); ?>
            <table class="form-table" id="catalogue-settings-tabls">
               <tbody>
                <tr>
                <th scope="row"><label for="grid_rows">Grid Rows</label></th>
                <td>

                <select id="grid_rows" name="grid_rows">
                	<option value="2" <?php if(get_option('grid_rows')==2){echo 'selected="selected"';} ?> >2</option>
                    <option value="3" <?php if(get_option('grid_rows')==3){echo 'selected="selected"';} ?>>3</option>
                    <option value="4" <?php if(get_option('grid_rows')==4){echo 'selected="selected"';} ?>>4</option>
                    <option value="5" <?php if(get_option('grid_rows')==5){echo 'selected="selected"';} ?>>5</option>
                    <option value="6" <?php if(get_option('grid_rows')==6){echo 'selected="selected"';} ?>>6</option>
                    <option value="7" <?php if(get_option('grid_rows')==7){echo 'selected="selected"';} ?>>7</option>
                    <option value="8" <?php if(get_option('grid_rows')==8){echo 'selected="selected"';} ?>>8</option>
                    <option value="9" <?php if(get_option('grid_rows')==9){echo 'selected="selected"';} ?>>9</option>
                    <option value="10" <?php if(get_option('grid_rows')==10){echo 'selected="selected"';} ?>>10</option>
                </select>
                <span>products per row</span>
                </td>
                </tr>
                <tr valign="top">
                <th scope="row"><label for="pagination">Pagination </label></th>
                <td>
                	<input name="pagination" type="text" id="pagination" value="<?php if(get_option('pagination') or get_option('pagination')==0){ echo get_option('pagination'); }else {echo 20;} ?>" size="15">
               		<span>products per page (use 0 for unlimited)</span>
                </td>
                </tr>
                <tr>
                <th scope="row"><label>Gallery Image</label></th>
                <td>
                <input name="image_height" type="text" id="image_height" value="<?php if(get_option('image_height')){ echo get_option('image_height'); }else {echo 358;} ?>" size="10">&nbsp;&nbsp;&nbsp;<span>Height</span>&nbsp;&nbsp;&nbsp;
                <input name="image_width" type="text" id="image_width" value="<?php if(get_option('image_width')){ echo get_option('image_width'); }else {echo 500;} ?>" size="10">&nbsp;&nbsp;&nbsp;<span>Width</span><br>
                 <select id="croping" name="croping">
                	<option value="image_scale_crop" <?php if(get_option('croping')=='image_scale_crop'){echo 'selected="selected"';} ?>>Scale & Crop</option>
                    <option value="image_scale_fit" <?php if(get_option('croping')=='image_scale_fit'){echo 'selected="selected"';} ?>>Scale To Fit</option>
                </select>
                </td>
                </tr>
                <tr>
                <th scope="row"><label>Thumbnail</label></th>
                <td>
                <input name="thumb_height" type="text" id="thumb_height" value="<?php if(get_option('thumb_height')){ echo get_option('thumb_height'); }else {echo 151;} ?>" size="10">&nbsp;&nbsp;&nbsp;<span>Height</span>&nbsp;&nbsp;&nbsp;
                <input name="thumb_width" type="text" id="thumb_width" value="<?php if(get_option('thumb_width')){ echo get_option('thumb_width'); }else {echo 212;} ?>" size="10">&nbsp;&nbsp;&nbsp;<span>Width</span><br>
                 <select id="croping" name="tcroping">
                	<option value="thumb_scale_crop" <?php if(get_option('tcroping')=='thumb_scale_crop'){echo 'selected="selected"';} ?>>Scale & Crop</option>
                    <option value="thumb_scale_fit" <?php if(get_option('tcroping')=='thumb_scale_fit'){echo 'selected="selected"';} ?>>Scale To Fit</option>
                </select>
                </td>
                </tr>
				<tr valign="top">
                <th scope="row"><label for="pagination">Show Next/Prev Links </label></th>
                <td>
				<input type="radio" name="next_prev" value="1" <?php if(get_option('next_prev')==1){echo 'checked="checked"';} ?> />Yes &nbsp;&nbsp;&nbsp; <input type="radio" name="next_prev" value="0" <?php if(get_option('next_prev')==0){echo 'checked="checked"';} ?>/>No<br /> 
                 <span></span>
                </td>
                </tr>
                </tbody></table>
<p class="submit"><input type="submit" name="submit" id="submit" class="button-primary" value="Save Changes"></p></form>
		<br class="clear">
		</div>
		<br class="clear">
</div> 
</div>
<div class="wpc-right-liquid">
<table cellpadding="0" class="widefat donation" style="margin-bottom:10px; border:solid 2px #008001;" width="50%">
            	<thead>
                	<th scope="col"><strong style="color:#008001;">Help Improve This Plugin!</strong></th>
                </thead>
                <tbody>
                	<tr>
                    	<td style="border:0;">Enjoyed this plugin? All donations are used to improve and further develop this plugin. Thanks for your contributaion.</td>
                    </tr>
                    <tr>
                    	<td style="border:0;"><form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">

<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="A74K2K689DWTY">
<input type="image" src="https://www.paypalobjects.com/en_AU/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal — The safer, easier way to pay online.">
<img alt="" border="0" src="https://www.paypalobjects.com/en_AU/i/scr/pixel.gif" width="1" height="1">
</form></td>
                    </tr>
                    <tr>
                    	<td style="border:0;">you can also help by <a href="#">rating this plugin on wordpress.org</a></td>
                    </tr>
                </tbody>
            </table>
            <table cellpadding="0" class="widefat" border="0">
            	<thead>
                	<th scope="col">Need Support</th>
                </thead>
                <tbody>
                	<tr>
                    	<td style="border:0;">If you are having problems with plugin please talk about them on <a href="#">Support Forums</a></td>
                    </tr>
                </tbody>
            </table>
</div>
<br class="clear">
</div>