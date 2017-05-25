<?php

/**
 *
 * Dynmic_menu.php
 *
 */
class Modules {

    private $ci;                // for CodeIgniter Super Global Reference.
    private $id_menu = 'class="page-sidebar navbar-collapse collapse"';
    private $li_menu = 'class="page-sidebar-menu"';
    private $class_menu = 'class="page-sidebar-menu"';
    private $siblings_menu = 'class="sub-menu"';
    private $class_parent = 'class="parent"';
    private $class_last = 'class="last"';
    private $hasChild = 'hasChild';

    // --------------------------------------------------------------------

    /**
     * PHP5        Constructor
     *
     */
    function __construct() {
        $this->ci = & get_instance();    // get a reference to CodeIgniter.
        //$this->ci->load->model('Common');
    }

    // --------------------------------------------------------------------

    /**
     * build_menu($table, $type)
     *
     * Description:
     *
     * builds the Dynaminc dropdown menu
     * $table allows for passing in a MySQL table name for different menu tables.
     * $type is for the type of menu to display ie; topmenu, mainmenu, sidebar menu
     * or a footer menu.
     *
     * @param    string    the MySQL database table name.
     * @param    string    the type of menu to display.
     * @return    string    $html_out using CodeIgniter achor tags.
     */
    function build_menu($table = '', $type = '0', $role_id, $license_key, $selected_module, $selected_menu) {
        $menu = array();
//        echo $table."\n";
//        echo $role_id;
//        exit;
        $this->ci->db->from($table);
        // use active record database to get the menu.
		//$this->ci->db->where('show_menu', 1);
		//$this->ci->db->where('license_key', $license_key);
        $this->ci->db->order_by('sort', 'asc');
        $query = $this->ci->db->get();

        if ($query->num_rows() > 0) {
            // `id`, `title`, `link_type`, `page_id`, `module_name`, `url`, `uri`, `dyn_group_id`, `position`, `target`, `parent_id`, `show_menu`

            foreach ($query->result() as $row) {
                $menu[$row->module_id]['id'] = $row->module_id;
				$menu[$row->module_id]['module'] = $row->module_name;
                $menu[$row->module_id]['link'] = $row->link_type;
                $menu[$row->module_id]['uri'] = $row->uri;
                $menu[$row->module_id]['position'] = $row->position;
                $menu[$row->module_id]['target'] = $row->target;
                $menu[$row->module_id]['parent'] = $row->parent_id;
                $menu[$row->module_id]['is_parent'] = $row->is_parent;
                $menu[$row->module_id]['show'] = $row->show_menu;
            }
        }

        $query->free_result();    // The $query result object will no longer be available
        // ----------------------------------------------------------------------
        // now we will build the dynamic menus.
        $html_out = "\t" . '<div ' . $this->id_menu . ' >' . "\n";
        
        
         
        /**
         * check $type for the type of menu to display.
         *
         * ( 0 = top menu ) ( 1 = horizontal ) ( 2 = vertical ) ( 3 = footer menu ).
         */
        switch ($type) {
            case 0:            // 0 = top menu
                break;

            case 1:            // 1 = horizontal menu
                $html_out .= "\t\t" . '<ul ' . $this->class_menu . '>' . "\n";
                break;

            case 2:            // 2 = sidebar menu
                $html_out .= "\t\t" . '<ul ' . $this->class_menu . ' ' . $this->li_menu . '>' . "\n";
                break;

            case 3:            // 3 = footer menu
                break;

            default:        // default = horizontal menu
                $html_out .= "\t\t" . '<ul ' . $this->class_menu . '>' . "\n";

                break;
        }
        //custom for avant template
				$html_out .= '<li class="sidebar-toggler-wrapper">';
					$html_out .= '<div class="sidebar-toggler hidden-phone"></div>';
				$html_out .= '</li>';
				$html_out .= '<li class="sidebar-search-wrapper">';
					$html_out .= '<form class="sidebar-search" action="extra_search.html" method="POST">';
						$html_out .= '<div class="form-container">';
							$html_out .= '<div class="input-box">';
								$html_out .= '<a href="javascript:;" class="remove"></a>';
								$html_out .= '<input type="text" placeholder="Search...">';
								$html_out .= '<input type="button" class="submit" value=" ">';
							$html_out .= '</div>';
						$html_out .= '</div>';
					$html_out .= '</form>';
				$html_out .= '</li>';
         
        //if($data['module'] == "Dashboard"){
            $html_out .= '<li class="open"><a title="Dashboard" href="' . site_url() . 'dashboard"><span>Dashboard</span></a></li>';            
        //}
        
        //end costum
        // loop through the $menu array() and build the parent menus.
        for ($i = 1; $i <= count($menu); $i++) {
            if (is_array($menu[$i])) {    // must be by construction but let's keep the errors home
                $isOpen = ($menu[$i]['module'] == $selected_module) ? 'active' : '';
                 
                //if (hasPermission($menu[$i]['module'])) {
                    if ($menu[$i]['show'] && $menu[$i]['parent'] == 0) {    // are we allowed to see this menu?
                        if ($this->get_childs($menu, $i, $role_id, $license_key, $selected_module, $selected_menu)) {

                            if ($menu[$i]['parent'] == 0) {
                                // CodeIgniter's anchor(uri segments, text, attributes) tag.'<i class="'.$menu[$i]['icon'].'"></i> <span>'.
                                $html_out .= "\t\t\t" . '<li class="' . $this->hasChild . ' ' . $isOpen . '">' . anchor(site_url($menu[$i]['uri']), '<i class="' . $menu[$i]['icon'] . '"></i> <span>' . $menu[$i]['title'] . '</span>', $this->class_parent);
                            } else {
                                $html_out .= "\t\t\t" . '<li class="' . $isOpen . '>' . anchor(site_url($menu[$i]['uri']), '<span>' . $menu[$i]['module_name'] . '</span>');
                            }
                            // loop through and build all the child submenus. 
                            $html_out .= $this->get_childs($menu, $i, $role_id, $license_key, $selected_module, $selected_menu);
                        }
                        $html_out .= '</li>' . "\n";
                    }
                //}
            } else {
                exit(sprintf('menu nr %s must be an array', $i));
            }
        }
        $html_out .= "\t\t" . '</ul>' . "\n";
        $html_out .= "\t" . '</div>' . "\n";

        return $html_out;
    }

    // --------------------------------------------------------------------

    /**
     * get_childs($menu, $parent_id) - SEE Above Method.
     *
     * Description:
     *
     * Builds all child submenus using a recurse method call.
     *
     * @param    mixed    $menu    array()
     * @param    string    $parent_id    id of parent calling this method.
     * @return    mixed    $html_out if has subcats else FALSE
     */
    function get_childs($menu, $parent_id, $role_id, $license_key, $selected_module, $selected_menu) {
        $has_subcats = FALSE;

//        echo "<pre>";
//        print_r($data);
//        exit;        
        
        $html_out = '';
        //$html_out .= "\n\t\t\t\t".'<div>'."\n";
        $isSubBlock = ($menu[$parent_id]['module'] == $selected_module) ? 'style="display:block;"' : 'style="display:none;"';

        $html_out .= "\t\t\t\t\t" . '<ul ' .$this->siblings_menu . ' ' . $isSubBlock . '>' . "\n";

        for ($i = 1; $i <= count($menu); $i++) {
            $isSubOpen = ($menu[$i]['module'] == $selected_menu) ? 'active' : '';

            //if (hasPermission($menu[$i]['permission'])) {
                //if($menu[$i]['permission'] == 'Report.ReportCenter.manage')exit;
                //-----------   

                if ($menu[$i]['show'] && $menu[$i]['parent'] == $parent_id) {    // are we allowed to see this menu? $menu[$i]['show'] && 
                    $has_subcats = TRUE;

                    if ($menu[$i]['is_parent'] == TRUE) {
                        // CodeIgniter's anchor(uri segments, text, attributes) tag.
                        $attr = array(
                            'class' => $this->class_parent,
                            'target' => $menu[$i]['target']
                        );

                        $html_out .= "\t\t\t\t\t\t" . '<li class="' . $this->hasChild . ' ' . $isSubOpen . '">' . anchor(site_url($menu[$i]['uri']), '<span>' . $menu[$i]['module_name'] . '</span>', $attr);
                    } else {
                        $attr = array(
                            'target' => $menu[$i]['target'],
                            'title' => $menu[$i]['title']
                        );
                        
                        $html_out .= "\t\t\t\t\t\t" . '<li class="' . $isSubOpen . '">' . anchor(site_url($menu[$i]['uri']), '<span>' . $menu[$i]['module_name'] . '</span>', $attr);
                        
                    }

                    // Recurse call to get more child submenus.
                    $html_out .= $this->get_childs($menu, $i, $role_id, $license_key, $selected_module, $selected_menu);

                    $html_out .= '</li>' . "\n";
                }
            //}
        }

        $html_out .= "\t\t\t\t\t" . '</ul>' . "\n";
        //$html_out .= "\t\t\t\t".'</div>' . "\n";

        return ($has_subcats) ? $html_out : FALSE;
    }

}

// ------------------------------------------------------------------------
// End of Dynamic_menu Library Class.

// ------------------------------------------------------------------------
/* End of file Dynamic_menu.php */
/* Location: ../application/libraries/Dynamic_menu.php */ 