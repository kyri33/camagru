<?php

    require_once('database.php');
    error_reporting(E_ALL);
	ini_set('display_errors', 1);

try {
	$conn = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
	echo "Connected successfully ";
} catch (PDOException $e) {
	die("Connection failed: ".$e->getMessage());
}

    $sql_db_create = "CREATE DATABASE IF NOT EXISTS ".$DB_NAME;
    $conn->query($sql_db_create);

    $conn->query("USE $DB_NAME");

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

    $conn->query($sql_table_create);

    $sql_table_create =
            "CREATE TABLE IF NOT EXISTS tbl_posts
            ( id int NOT NULL AUTO_INCREMENT,
            userId int NOT NULL,
            image varchar(64),
            post_date TIMESTAMP NOT NULL,
            PRIMARY KEY (id)
            );";

    $conn->query($sql_table_create);

	$sql_table_create =
		"CREATE TABLE IF NOT EXISTS tbl_comments
		(id int NOT NULL AUTO_INCREMENT,
		userId int NOT NULL,
		postId int NOT NULL,
		comment TEXT NOT NULL,
		PRIMARY KEY (id)
		);";
	$conn->query($sql_table_create);

    $sql_table_create =
        "CREATE TABLE IF NOT EXISTS tbl_likes
        (id int NOT NULL AUTO_INCREMENT,
        userId int NOT NULL,
        postId int NOT NULL,
        PRIMARY KEY (id)
        );";
    $conn->query($sql_table_create);

    if (!file_exists("../images/")) {
        mkdir("../images");
    }

    echo "Successfully created";
 ?>
