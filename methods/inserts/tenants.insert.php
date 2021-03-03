<?php

//Insert für die Tenants-Tabelle und damit verbundene Tabellen
if (isset( $_POST['submit'])) {

    include '../config/database.config.php';

    $submit_raw_data = array (
        'tenant_surname' => $_POST['tenant_surname'],
        'estateId' => $_POST['estateId']
    );

$sql_Tenants_Insert = "insert into Tenants
        (Tenant_Surname)
        values
        ('" . strval($submit_raw_data['tenant_surname']) . "')";

$result_tenant = mysqli_query($connection, $sql_Tenants_Insert);
$last_record_Tenant_Insert = mysqli_insert_id($connection);

//ACHTUNG: Typo in "TentantID" -> sollte eigentlich TenantID heißen ...
$sql_Tenants_In_Estate_Insert = "insert into Tentants_In_Estates
         (estateid, tentantid )
         values
         (".$submit_raw_data['estateid']. ",
         " .$last_record_Tenant_Insert . ") ";

$result_tenant = mysqli_query($connection, $sql_Tenants_In_Estate_Insert);

}