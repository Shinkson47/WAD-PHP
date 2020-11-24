<?php
/**
 * ResultModel.php
 *
 * PHP program to perform simple calculations
 *
 * class to perform the requested calculation using the user-entered parameters
 * after validation and sanitisation
 *
 * @author CF Ingrams - cfi@dmu.ac.uk
 * @copyright De Montfort University
 *
 * @package simple_sums
 */

class ResultModel
{
    private $calculation_type;
    private $value_1;
    private $value_2;
    private $result;
    private $validate_error_flag;

    public function __construct()
    {
        $this->calculation_type = '';
        $this->value_1 = null;
        $this->value_2 = null;
        $this->result = null;
        $this->validate_error_flag = false;
    }

    public function __destruct() {}

    public function setValues($validate_result)
    {
        $this->value_1 = $validate_result['sanitised-value-1'];
        $this->value_2 = $validate_result['sanitised-value-2'];
        $this->calculation_type = $validate_result['sanitised-calculation-type'];
        $this->validate_error_flag = $validate_result['validate-error'];
    }

    public function getCalculationResult()
    {
        return $this->result;
    }

    /**
     * perform the required calculation - format any result that is of type
     * float with 3 decimal places
     */
    public function calculation()
    {
        $calculation_type_message = '';
        $calculation_result = null;
        $calculation_type = $this->calculation_type;
        $value_1 = $this->value_1;
        $value_2 = $this->value_2;

        if ($this->validate_error_flag === true)
        {
            $calculation_type = '';
        }

        switch ($calculation_type)
        {
            case 'addition':
                $calculation_result = $value_1 + $value_2;
                $calculation_type_message = 'Adding';
                break;
            case 'subtraction':
                $calculation_result = $value_1 - $value_2;
                $calculation_type_message = 'Subtracting';
                break;
            case 'multiplication':
                $calculation_result = $value_1 * $value_2;
                $calculation_type_message = 'Multiplying';
                break;
            case 'division':
                $calculation_result = $value_1 / $value_2;
                $calculation_type_message = 'Dividing';
                break;
            default:
                break;
        }

        if (!is_integer($calculation_result))
        {
            $calculation_result = number_format($calculation_result, 3, '.', ',');
        }

        $this->result['calculation_type_message'] = $calculation_type_message;
        $this->result['calculation-result'] = $calculation_result;
    }

    /**
     * Store calculation values and other user details in a database,
     * but only if there were no errors in validating the user inputs
     *
     * Return error messages if the database was not accessible.
     *
     */
    public function storeUserData()
    {
        $information_storage_error = true;

        if ($this->validate_error_flag !== true)
        {
            $client_port = $_SERVER['REMOTE_PORT'];
            $user_agent = $_SERVER['HTTP_USER_AGENT'];

            $database = Factory::buildObject('DatabaseWrapper');
            $database->connectToDatabase();

            $query = SqlQueries::queryInsertUserData();

            $parameters = [
                ':clientport' => $client_port,
                ':useragent' => $user_agent,
                ':calculation_type' => $this->calculation_type,
                ':value1' => $this->value_1,
                ':value2' => $this->value_2,
            ];

            $database->safeQuery($query, $parameters);

            $information_storage_messages = $database->getDatabaseResultMessages();
            $information_storage_error = $information_storage_messages['database-query-execute-error'];
        }

        return $information_storage_error;
    }
}

