<?php

include '../config/database.config.php';

//holt die Informationen für das Dashboard-Grid

$sql_select_data_for_dashboard = 
"select 
(em.Estate_Meta_Price_Per_Squaremeters * em.Estate_Meta_Surface_Size) + em.Estate_Meta_Additional_Costs as [Gesamtmiete],
(em.Estate_Meta_Price_Per_Squaremeters * em.Estate_Meta_Surface_Size) as [Kaltmiete],
zc.City, 
zc.ZipCode,
et.Estate_Type,
a.Address_Street, 
a.Address_Street_Number, 
a.Address_Country_Code,
em.Estate_Meta_Surface_Size, 
em.Estate_Meta_Rooms_Count, 
em.Estate_Meta_Bathroom_Count,
em.Estate_Meta_Price_Per_Squaremeters,
em.Estate_Meta_Additional_Costs
from Estates e 
join Estate_Meta em on e.Estate_metaID = em.Estate_MetaID
join Addresses a on e.AddressID = a.AddressID
join Estates_In_Landlords eil on eil.EstateID = e.EstateID
join EstateType et on e.Estate_TypeID = et.Estate_TypeID
join ZipCodes zc on a.ZipCodeID = zc.ZipCodeID"

$result_dashboard_data = mysqli_query($connection, $sql_select_data_for_dashboard);
