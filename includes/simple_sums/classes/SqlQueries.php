<?php
/**
 * Created by PhpStorm.
 * User: ctec2907
 * Date: 25/02/19
 * Time: 20:39
 */

class SqlQueries
{
    public function __construct(){}

    public function __destruct(){}

    public static function queryInsertUserData()
    {
        $sql_query_string  = 'INSERT INTO user_data';
        $sql_query_string .= ' SET';
        $sql_query_string .= ' client_port = :clientport,';
        $sql_query_string .= ' user_agent = :useragent,';
        $sql_query_string .= ' calculation_type = :calculation_type,';
        $sql_query_string .= ' value1 = :value1,';
        $sql_query_string .= ' value2 = :value2';

        return $sql_query_string;
    }

    public static function queryGetUserData()
    {
        $sql_query_string  = 'SELECT client_port, user_agent, calculation_type,';
        $sql_query_string .= ' value1, value2, timestamp';
        $sql_query_string .= ' FROM user_data';
        return $sql_query_string;
    }
}
