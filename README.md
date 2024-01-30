## FontAwesome Category Icon Picker
simple free plugin for [osclass](https://osclass.org/)  php based platform which allows you to quickly create and manage your own free classifieds site.
___
#### Description
FontAwesome  category icon picker plugin, lets you assign fontawesome icons and colors to parent categories on your osclass website.

##### Example: 

![screenshot](https://www.dropbox.com/s/hbdmo510nnxhrhm/fa_category_plugin_screen-3.jpg?raw=1)
___
#### Installation
Simply clone the repo, copy fk_fontawesome_category_icons folder to your osclass  plugins folder
```
Path:
{your-path}/oc-content/plugins
```
go to admin panel -> manage plugins -> there find Social Connect -> click on install.
___
#### Configuration
Simply, choose the icon and color from the drop down menu, 
click save.
![screenshot](https://www.dropbox.com/s/o8cpzwyw1w2mi8m/fa_category_plugin_screen-2.jpg?raw=1)
___
#### Usage
Add the following code to where ever you want the icons to appear with categories
e.g in the `while loop` on main page `main.php`

```
 while ( osc_has_categories() ) {
  ...
 //pass the category id to the method to get an array of current iteration category icon and color. 
                
 $icon = FaIcons::newInstance()->fa_getIconById(osc_category_id());
```
then in `HTML` use the `<i>` tag for the icons to appear.
```                
<i class="<?php echo $icon['fa_icon']?>" style="color: <?php echo $icon['fa_color'] ?>;"></i>
```