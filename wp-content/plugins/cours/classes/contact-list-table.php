<?php

class ContactListTable extends WP_List_Table
{

    function get_data()
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'contacts';
        $results    = $wpdb->get_results("SELECT * FROM $table_name", ARRAY_A);
        return $results;
    }

    function get_columns()
    {
        $columns = array(
            'firstname' => 'FirstName',
            'lastname'  => 'Lastname',
            'comment'   => 'Comment',
            'phone'     => 'Phone',
            'email'     => 'Email'
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
            case 'id':
            case 'firstname':
            case 'lastname':
            case 'phone':
            case 'email':
            case 'comment':
                return $item[$column_name];
            default:
                return print_r($item, true); //Show the whole array for troubleshooting purposes
        }
    }

    function usort_reorder($a, $b) {
		$orderby = (!empty($_GET['orderby'])) ? $_GET['orderby'] : 'id';
		$order = (!empty($_GET['order'])) ? $_GET['order'] : 'asc';
		$result = strcmp($a[$orderby], $b[$orderby]);
		return ($order === 'asc') ? $result : -$result;
	}
}
