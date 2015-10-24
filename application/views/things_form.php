<h2 style="margin-top:0px">Things <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
                <label for="varchar">title <?php echo form_error('thg_title') ?></label>
                <input type="text" class="form-control" name="thg_title" id="thg_title" placeholder="thg_title" value="<?php echo $thg_title; ?>" />
            </div>
	    <div class="form-group">
                <label for="tgh_description">description <?php echo form_error('tgh_description') ?></label>
                <textarea class="form-control" rows="3" name="tgh_description" id="tgh_description" placeholder="tgh_description"><?php echo $tgh_description; ?></textarea>
            </div>
	    <div class="form-group">
                <label for="varchar">image <?php echo form_error('tgh_image') ?></label>
                <input type="text" class="form-control" name="tgh_image" id="tgh_image" placeholder="tgh_image" value="<?php echo $tgh_image; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">geo <?php echo form_error('tgh_geo') ?></label>
                <input type="text" class="form-control" name="tgh_geo" id="tgh_geo" placeholder="tgh_geo" value="<?php echo $tgh_geo; ?>" />
            </div>
	    <div class="form-group">
                <label for="varchar">address <?php echo form_error('tgh_address') ?></label>
                <input type="text" class="form-control" name="tgh_address" id="tgh_address" placeholder="tgh_address" value="<?php echo $tgh_address; ?>" />
            </div>
	    <div class="form-group">
                <label for="int">popularity <?php echo form_error('tgh_popularity') ?></label>
                <input type="text" class="form-control" name="tgh_popularity" id="tgh_popularity" placeholder="tgh_popularity" value="<?php echo $tgh_popularity; ?>" />
            </div>
	    <div class="form-group">
                <label for="int">tty <?php echo form_error('tgh_tty_id') ?></label>
                <input type="text" class="form-control" name="tgh_tty_id" id="tgh_tty_id" placeholder="tgh_tty_id" value="<?php echo $tgh_tty_id; ?>" />
            </div>
	    <div class="form-group">
                <label for="datetime">created <?php echo form_error('tgh_created_at') ?></label>
                <input type="text" class="form-control" name="tgh_created_at" id="tgh_created_at" placeholder="tgh_created_at" value="<?php echo $tgh_created_at; ?>" />
            </div>
	    <input type="hidden" name="thg_id" value="<?php echo $thg_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('things') ?>" class="btn btn-default">Cancel</a>
	</form>