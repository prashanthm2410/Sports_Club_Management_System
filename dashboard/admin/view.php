<?php
	require '../../include/db_conn.php';
	page_protect();
    CREATE VIEW male_members_view AS
    SELECT
    `Sl.No`,
    `Membership Expiry`,
    `Member ID`,
    `Name`,
    `Contact`,
    `E-Mail`,
    `Gender`,
    `Joining Date`,
    `Action`
    FROM users
    WHERE `Gender` = 'Male';
    CREATE VIEW female_members_view AS
    SELECT
    `Sl.No`,
    `Membership Expiry`,
    `Member ID`,
    `Name`,
    `Contact`,
    `E-Mail`,
    `Gender`,
    `Joining Date`,
    `Action`
    FROM users
    WHERE `Gender` = 'Female';
    
    SELECT * FROM male_members_view;
    
    
    SELECT * FROM female_members_view;
?>
    
