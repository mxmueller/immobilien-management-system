<?php

class buildEstateQuery
{

    function __construct()
    {
        $this->dashboard_fallback = 'Noch kein Objekt eingepflegt!';
        $this->detail_fallback = 'Bitte zuerst Objekte einpflegen!';
        $this->edit_exist_fallback = 'Der angefragte Eintrag ist nicht vorhanden!';
        $this->edit_user_fallback = 'Sie sind nicht berechtigt diesen Eintrag zu sehen!';
        $this->fallback = 'Unerwarteter Fehler';
    }

    private function db()
    {
        $servername = "127.0.0.1";
        $username = "root";
        $password = "";
        $database = "ims_local_instance";
        // Create connection
        return new mysqli($servername, $username, $password, $database);
    }

    public function dashboard()
    {
        $connection = $this->db();
        $logged_in_user = $_SESSION['user_id'];

        $sql = "SELECT * FROM estates_in_landlords WHERE LandlordID = $logged_in_user";
        $result = mysqli_query($connection, $sql);

        $counted_result = $result->num_rows;

        if ($counted_result == 0) {
            return $this->dashboard_fallback;
        } else {
            return $counted_result;
        }
    }

    public function edit($logged_in_user_id, $estate_request_id)
    {
        $connection = $this->db();

        // check if estate request exist
        $exist_query = "SELECT * FROM estates WHERE estates.estateID = $estate_request_id";
        $exist_query_result = mysqli_query($connection, $exist_query);

        if ($exist_query_result->num_rows == null) {
            return $this->edit_exist_fallback;
        }

        // check if user owns request
        $ownership_query = "SELECT LandlordID FROM estates_in_landlords WHERE EstateID = $estate_request_id";
        $ownership_query_result = mysqli_query($connection, $ownership_query);

        if ($ownership_query_result->num_rows > 0) {
            while ($ownership_row = $ownership_query_result
                ->fetch_assoc()
            ) {
                if ($ownership_row['LandlordID'] != $logged_in_user_id) {
                    return $this->edit_user_fallback;
                }
            }
        } else {
            return $this->fallback;
        }

        $mother_query =
            "SELECT *
            FROM estates
            JOIN addresses a on estates.AddressID = a.AddressID
            JOIN estate_meta em on estates.Estate_MetaID = em.Estate_MetaID
            WHERE estates.EstateID = $estate_request_id";

        $mother_query_result = mysqli_query($connection, $mother_query);
        return $mother_query_result;
    }

    public function overview()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
            $url = "https://";
        else
            $url = "http://";

        $url .= $_SERVER['HTTP_HOST'];
        $url .= $_SERVER['REQUEST_URI'];

        $host = parse_url($url, PHP_URL_SCHEME) . '://' . parse_url($url, PHP_URL_HOST);
        $root = 'immobilien-management-system';

        $connection = $this->db();
        $logged_in_user = $_SESSION['user_id'];

        $sql = "SELECT * FROM estates_in_landlords WHERE LandlordID = $logged_in_user";
        $result = mysqli_query($connection, $sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

                $search = $row['EstateID'];

                $join = "SELECT 
                estate_types.Estate_Type,
                addresses.ZipcodeID,
                addresses.Address_Street,
                addresses.Address_Street_Number,
                estates.EstateID
                FROM estates
                INNER JOIN estate_types ON estates.Estate_TypeID=estate_types.Estate_TypeID
                INNER JOIN addresses ON estates.AddressID=addresses.AddressID
                WHERE estates.EstateID = $search";

                $join_results = mysqli_query($connection, $join);

                if ($join_results->num_rows > 0) {

                    while ($join_entry = $join_results->fetch_assoc()) {

                        $path = "sites/estate-detail.sites.php?id=" . $join_entry['EstateID'] . "";
                        $link = $host . '/' . $root . '/' . $path;

                        $button = "<a class='btn btn-outline-info'
                        href='" . $link . "' target='_blank'>
                        Detailansicht / Bearbeiten
                        </a>";

                        $table = "<tr>
                        <th scope='row'>" . $join_entry['EstateID'] . "</th>
                        <td>" . $join_entry['ZipcodeID'] . "</td>
                        <td>" . $join_entry['Address_Street'] . "</td>
                        <td>" . $join_entry['Address_Street_Number'] . "</td>
                        <td>" . $button . "</td>
                        </tr>";

                        echo $table;
                    }
                }
            }
        } else {
            echo $this->detail_fallback;
        }
    }
}
