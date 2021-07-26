<?php

    // Delete

    include_once "../database/queries.php";

    $queries = new Queries();

    $queries->delete($_GET['id']);

?>