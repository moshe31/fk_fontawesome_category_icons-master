<?php
if( Params::getParam('plugin_action') == 'done' ) {
        
        //Sort the form data
        $category_id = $_POST['category-id'];
        $icon = $_POST['icon-input'];
        $color = $_POST['icon-color'];

        $data = array();

        for ($i = 0; $i < count($category_id); $i++) {
            array_push($data, array('fa_pk_i_id' => $category_id[$i], 
                                    'fa_icon' => $icon[$i], 
                                    'fa_color' => $color[$i]));
        } 
    
        FaIcons::newInstance()->fa_addCategoryIcons($data);

        if(osc_version()<300) {
            echo '<div style="text-align:center; font-size:22px; background-color:#00bb00;"><p>' . __('Changes saved succesfully.', 'fk_category_icons') . '.</p></div>' ;
        } else {
            osc_add_flash_ok_message(__('Changes saved succesfully.', 'fk_category_icons'), 'admin');
            
        }
    }

?>
<!-- styles -->
<link rel="stylesheet" href="<?php echo osc_plugin_url(__FILE__)?>/styles.css">


<div class="container">
    <div class="col">
    <!-- category icons card -->
        <div class="card">
            <h2 class="header">Font Awesome Icon Picker</h2>
            <form name="fa_icons_form" id="fa_icons_form" action="<?php echo osc_admin_base_url(true) ; ?>" method="POST"
                enctype="multipart/form-data">
                <input type="hidden" name="page" value="plugins" />
                <input type="hidden" name="action" value="renderplugin" />
                <input type="hidden" name="file" value="fk_fontawesome_category_icons/admin/config.php" />
                <input type="hidden" name="plugin_action" value="done" />
                <?php osc_goto_first_category();

                while(osc_has_categories()){ 
                $icon = FaIcons::newInstance()->fa_getIconById(osc_category_id());?>

                <div class="category">

                    <button class="iconpicker dropdown-toggle" data-iconset="fontawesome5" role="iconpicker">
                        <i id="main-icon" class="<?php echo $icon['fa_icon']?>" style="color: <?php echo $icon['fa_color'] ?>;"></i>
                        <input type="hidden" id="category-id" name="category-id[]" value="<?php echo osc_category_id(); ?>">
                        <input type="hidden" id="icon-input" name="icon-input[]" value="<?php echo $icon['fa_icon']?>">
                        <input type="hidden" id="icon-color-input" name="icon-color[]" value="<?php echo $icon['fa_color'] ?>">
                        <i id="caret" class="fa fa-caret-down"></i>
                    </button>

                    <span class="category-name">
                        <?php echo osc_category_name();?></span>
                </div>

                <?php } ?>
                <button id="submit" type="submit" class="btn btn-submit">Save</button>
            </form>
        </div>

        <div class="the-guy">
            by <a href="https://www.github.com/farhankk360/osclass-fontawesome-category-icons-plugin/" target="_blank">Farhan Ullah</a>
        </div>
    </div>

    <div class="col">
    <!-- Plugin description -->
        <div class="card">
            <h2 class="header">Description</h2>
            <p>Simple <strong>FontAwesome icon picker</strong> plugin, lets you assign fontawesome icons and colors to parent categories.</p>

            <h3>Usage</h3>
                <p>To use the plugin, simply choose the icons from drop down, choose the color, and save.</p>
                <p>You can use the following methods in your site, to get the icons.</p>

                <pre>//pass the category id to the method to get an array of current category icon and color. 
                <br/> $icon = FaIcons::newInstance()->fa_getIconById(osc_category_id());
                </pre>

                <pre>//in html. 
                <br/>&lt;i class="&lt;?php echo $icon['fa_icon']?&gt;" style="color: &lt;?php echo $icon['fa_color'] ?&gt;;"&gt;&lt;/i&gt;
                </pre>

                <h3>Remove</h3>
                <p>To remove the plugin, first uninstall from admin menu, then remove the above mentioned methods from your html pages</p>
        </div>
    </div>

</div>

<!-- icons dropdown menu -->
<div id="icons-dropdown" class="dropdown-content">
    <i class="fa fa-search search-input-icon"></i>
    <input type="text" placeholder="Search icons" id="icons-search">
    <table class="icons-table">
        <tbody id="icons-data">
            <!-- icons data goes here   -->
        </tbody>
        <tfoot>
            <tr>
                <td>
                    <p>Choose a color : <input type="color" name="" id="color-picker"> </p>
                </td>
            </tr>
        </tfoot>
    </table>
</div>

<!-- Js -->
<script src="<?php echo osc_plugin_url(__FILE__)?>/script.js"></script>