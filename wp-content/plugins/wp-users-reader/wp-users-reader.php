<?php
/*
*   Plugin Name: WP users Reader
*   Description: plugin to read the MySQL DB Posts table - GUTENBERG COMPATIBLE
*   Version: 5.2 
*   Author: Alexis Herrera
*   File: wp-users-reader.php
*   Folder to create: users-tbl-reader
*   Short code: [wp-users-reader-shortcode]
*/
   
  add_shortcode( 'wp-users-reader-shortcode', 'wp_users_reader_entry_point' );


function wp_users_reader_entry_point ( $attributes ) {
	
	global $wpdb;
 
 	$output = "";

	//Use the concatinaiton operator to join the table prefix to the word comments
	// to create the correct db prefix + table name
	//
	$tableName =   $wpbd->prefix . "users"; 

	//Echo out the $tablename varaible, which is the db prefix + table name
	//
	//$output .= "$tableName" . "<br>";
	  
	//Query the vomments table and assign the returned array of table row objects
	// to the $result variable
	//
	$result = $wpbd->get_results( "SELECT * FROM $tableName");

    //Echo out a table header using start string values
    //
	$output .= "<table border=\"1\">";
	$output .= "<tr>";
	$output .= "<th>" . "ID"        . "</th>" 
		    . "<th>"  . "Login"    . "</th>" 
			. "<th>"  . "Nicename" . "</th>"
			. "<th>"  . "Email" . "</th>"
			. "<th>"  . "Status" . "</th>"    
		    . "<th>"  . "DisplayName"     . "</th>";
		    
	$output .= "</tr>";

	//Iterate the array of DB row objects and put them in HTML table cells
	// 
	foreach($result as $row)  {
	 $output .= "<tr>";
	
	 //Each table row column data item is accessed using it's column name 
	 // 
	   $output .=   "<td>" . $row->ID . "</td>"
		  . "<td>" . $row->post_Login . "</td>"
		  . "<td>" . $row->post_Nicename   . "</td>"
		  . "<td>" . $row->post_Email   . "</td>"
		  . "<td>" . $row->post_Status   . "</td>"
		  . "<td>" . $row->post_display_name  . "</td>";
		  
	   $output .= "</tr>";
	}

	$output .= "</table>";
	
	return $output;
}
?>