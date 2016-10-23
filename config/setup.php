<?php

    require_once('database.php');

    $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD);
    if (!$conn)
        die("Connection failed ".mysqli_connect_error());

    $sql_db_create = "CREATE DATABASE IF NOT EXISTS ".$DB_NAME;
    if (!mysqli_query($conn, $sql_db_create))
        die("Error creating database ".mysqli_error($conn));

    mysqli_select_db($conn, $DB_NAME);

    $sql_table_create =
        "CREATE TABLE IF NOT EXISTS tbl_users
        ( id int NOT NULL AUTO_INCREMENT,
        email varchar(128) NOT NULL,
        password varchar(512) NOT NULL,
        username varchar(128) NOT NULL,
        protect varchar(128) NOT NULL,
        reset varchar(128) DEFAULT '1',
        PRIMARY KEY (id)
        );";

    if (!mysqli_query($conn, $sql_table_create))
        die("Error creating tbl_users ".mysqli_error($conn));

    $sql_table_create =
            "CREATE TABLE IF NOT EXISTS tbl_posts
            ( id int NOT NULL AUTO_INCREMENT,
            userId int NOT NULL,
            image varchar(64),
            post_date TIMESTAMP NOT NULL,
            PRIMARY KEY (id)
            );";

    if (!mysqli_query($conn, $sql_table_create))
		die("Error creating tbl_posts ".mysqli_error($conn));

	$sql_table_create =
		"CREATE TABLE IF NOT EXISTS tbl_comments
		(id int NOT NULL AUTO_INCREMENT,
		userId int NOT NULL,
		postId int NOT NULL,
		comment TEXT NOT NULL,
		PRIMARY KEY (id)
		);";
	if (!mysqli_query($conn, $sql_table_create))
		die ("Error creating tbl_comments ".mysqli_error($conn));

    $sql_table_create =
        "CREATE TABLE IF NOT EXISTS tbl_likes
        (id int NOT NULL AUTO_INCREMENT,
        userId int NOT NULL,
        postId int NOT NULL,
        PRIMARY KEY (id)
        );";
    if (!mysqli_query($conn, $sql_table_create))
        die ("Error creating tbl_likes ".mysqli_error($conn));

    if (!file_exists("../images/")) {
        mkdir("../images");
    }

    echo "Successfully created";
 ?>
