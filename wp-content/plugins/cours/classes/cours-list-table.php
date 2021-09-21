<?php
class CoursListTable extends WP_List_Table
{

    function get_data()
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'cours';
        $results    = $wpdb->get_results("SELECT wp.id,firstname,lastname,wp.post_title,email,phone,cours_id,meta_value FROM $table_name 
        left join wp_posts as wp on cours_id = wp.ID 
        left join wp_postmeta as wpm on wpm.post_id = wp.ID 
        where wp.post_type = 'cours' and meta_key = 'dateCours'", ARRAY_A);
        return $results;
    }

    function get_columns()
    {
        $columns = array(
            'firstname'     => 'FirstName',
            'lastname'      => 'Lastname',
            'post_title'    => 'Cours',
            'meta_value'    => 'Date',
            'email'         => 'Email',
            'phone'         => 'Phone'
        );
        return $columns;
    }

    function prepare_items()
    {
        $data = $this->get_data();
        $columns    = $this->get_columns();
        $hidden     = array();
        $sortable   = $this->get_sortable_columns();
        $this->_column_headers = array($columns, $hidden, $sortable);
        usort($data, array($this,'usort_reorder'));
        $this->items = $data;
    }

    function get_sortable_columns()
    {
        $sortable_columns = array(
            'id' => array('id', false),
        );
        return $sortable_columns;
    }

    function column_default($item, $column_name)
    {
        switch ($column_name) {
            case 'firstname':
            case 'lastname':
            case 'phone':
            case 'post_title':
            case 'meta_value':
            case 'email':
                return $item[$column_name];
            default:
                return print_r($item, true); //Show the whole array for troubleshooting purposes
        }
    }

    function usort_reorder($a, $b) {
		$orderby = (!empty($_GET['orderby'])) ? $_GET['orderby'] : 'meta_value';
		$order = (!empty($_GET['order'])) ? $_GET['order'] : 'desc';
		$result = strcmp($a[$orderby], $b[$orderby]);
		return ($order === 'asc') ? $result : -$result;
	}
}