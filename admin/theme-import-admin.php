<?php
/**
 * Class to add our demo import section
 **/
class theme_import_admin {
    //properties
    //public $config = array();

    //methods

    public function __construct() {
		add_action('admin_menu', array($this, 'add_theme_import_section'));
	}

	/**
	 * Add the import menu item
    **/
	public function add_theme_import_section() {
		add_management_page(__('Import Theme Demo', 'twenty-five-north'), __('Import Theme Demo', 'twenty-five-north'), 
			'manage_options', 'importthemedemo',array($this, 'import_page_content') );
	}

	/** 
     * Page content
    **/
	public function import_page_content() {
	?>
	<div class="wrap">
        <h2><?php echo __('Import The Content From Live Demo', 'twenty-five-north'); ?></h2>
		<p class="import-desc">
		<?php echo __('Choosing to import the demo content will give you the settings and example posts, tags, theme options and categories similar to what is set up in the live theme previews.  Select the demo you would like to import below and click the button to begin.', 'twenty-five-north')  . '  ' . __('Please Note: Images used in the preview are strickty for the demo and are replaced with placeholder images.', 'twenty-five-north');?>
		</p>

        <p><b><label for="import-demo-choice"><?php echo __('Select The Demo to Import', 'twenty-five-north'); ?> </label></b>
			<select id="import-demo-choice" class="import-demo-choice">
				<option value="1"><?php echo __('Main Demo', 'twenty-five-north'); ?></option>
			</select>
		</p>
		<p>
			<a class="button-primary import-demo-button" href="#"><?php echo __('Import Demo', 'twenty-five-north'); ?></a>
			<?php wp_nonce_field('import_demo_content', 'import_demo_content', true, true); ?>
        </p>

		<div class="demo-import-wait-div hidden">
			<p>
			  <i><?php echo __('Please Wait, this could take a few moments...', 'twenty-five-north');?></i>
			  <br />
			  <br />
			  <img src="<?php echo get_template_directory_uri() . '/admin/images/animated_progress_bar.gif';?>" />
			  <br />
			  <br />
			  <?php echo __("Import in progress, please don't close the page. If this takes more than 10 minutes - leave the page, check if you are getting content (pages, posts, media), delete any menus under Appearance -> menus (these are the only item that will duplicate, come back and re-run. Repeat until you get the Success message.", 'twenty-five-north');?>
			</p>
		</div>
		
		
		<div class="demo-import-fail-div hidden">
            <p class="info-desc">
                <b><?php echo __('Warning!', 'twenty-five-north');?></b>
                <br /><br />
                <?php echo __('There was a problem importing the demo content, please try again. (Server could be unreachable)', 'twenty-five-north'); ?>
            </p>
        </div>

		<div class="demo-import-success-div hidden">
			<p class="info-desc">
				<b><?php echo __('Success!', 'twenty-five-north');?></b>
				<br /><br />
				<?php echo __('The Import has completed successfully!  Now you can start changing things to how you want using the customizer.', 'twenty-five-north'); ?>
			</p>
		</div>
				
			
    </div>
	<?php
	}
	
}
