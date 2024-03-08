<?php @session_start();
ob_start();

// Check if the unique ID is already set in the session


// $username = "micodetest_constavisa";
// $password = "jcQ?6RttZcgu";
// $server = "localhost";
// $db = "micodetest_constavisa";

$username = "root";
$password = "";
$server = "localhost";
$db = "seven_seas";
$base_url = "http://localhost/visa_uddan/";

$con = mysqli_connect($server, $username, $password, $db);

if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}


date_default_timezone_set("Asia/Kolkata");

$str = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
$urltoken = substr(str_shuffle($str), 0, 40);


$token = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz' . round(microtime(true));
$userTok = substr(str_shuffle($str), 0, 24);

$nameKey  = '1234567890' . round(microtime(true));
$nameKeyTok = substr(str_shuffle($nameKey), 0, 5);


if (!isset($_SESSION['unique_id'])) {
  // If not set, generate a new unique ID
  $unique_id = $nameKeyTok;

  // Store the unique ID in the session
  $_SESSION['unique_id'] = $unique_id;
} else {
  // If the unique ID is already set, retrieve it from the session
  $unique_id = $_SESSION['unique_id'];
}



function encrypt_decrypt($string, $action = 'encrypt')
{
  $encrypt_method = "AES-256-CBC";
  $secret_key = 'CI_1_0123_KG'; // user define private key
  $secret_iv = 'vAidg545222g27'; // user define secret key
  $key = hash('sha256', $secret_key);
  $iv = substr(hash('sha256', $secret_iv), 0, 16); // sha256 is hash_hmac_algo
  if ($action == 'encrypt') {
    $output = openssl_encrypt(json_encode($string), $encrypt_method, $key, 0, $iv);
    $output = base64_encode($output);
  } else if ($action == 'decrypt') {
    $output = json_decode(openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv));
  }
  return $output;
}


function authChecker($controller = 'admin', $function_name)
{
  global $con;
  try {
    if (is_array($function_name) && !empty($function_name)) {
      $InUser = $_SESSION['adminToken'];
      $AdminUserRoleid = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM `ec_employee` WHERE `email`='$InUser' "))['role_id'];
      $role_id = $AdminUserRoleid ?? 'not_found';

      if ($role_id) {
        $getRolesInfoQuery = "SELECT * FROM ec_roles_type WHERE id = $role_id";
        $getRolesInfoResult = mysqli_query($con, $getRolesInfoQuery);
        $getRolesInfo = mysqli_fetch_assoc($getRolesInfoResult);

        if ($getRolesInfo) {
          if ($getRolesInfo['vip'] == 'yes') {
            return true; // ALL OK || VIP USER or SUPER ADMIN
          }
        }

        $frontFunctionsQuery = "SELECT * FROM ec_functions WHERE controller_name = '$controller' AND function_name IN ('" . implode("','", $function_name) . "')";
        $frontFunctionsResult = mysqli_query($con, $frontFunctionsQuery);
        $frontFunctions = [];
        while ($row = mysqli_fetch_assoc($frontFunctionsResult)) {
          $frontFunctions[] = $row;
        }


        if ($frontFunctions) {
          $accessIDs = array_column($frontFunctions, 'id');
          $userPermissionQuery = "SELECT function_id FROM ec_set_permission WHERE role_id = $role_id";
          $userPermissionResult = mysqli_query($con, $userPermissionQuery);
          $userPermission = mysqli_fetch_assoc($userPermissionResult);

          if ($userPermission) {
            $functionStringList = $userPermission['function_id'];
            $function_ARRAY = explode(',', $functionStringList);

            if (count(array_intersect($accessIDs, $function_ARRAY)) > 0) {
              return true; // ALL OK
            } else {
              return false; // false;
            }
          } else {
            return false; // Permission ID Not Found
          }
        } else {
          return false; // Function ID Not Found
        }
      } else {
        return false; // Role ID Not Found
      }
    } else {
      return false;
    }
  } catch (\Exception $e) {
    return false;
  }
}


function _registerFunction($whereCondition)
{
  global $con;
  // print_r($whereCondition);
  try {
    // $builder = $db->table('sw_front_functions');
    // $builder->where($whereCondition);
    // $isExists = $builder->get()->getRow();
    $isExists = mysqli_num_rows(mysqli_query($con, "SELECT * from ec_functions WHERE function_name = '" . $whereCondition['function_name'] . "' AND category = '" . $whereCondition['category'] . "' AND status = '1'"));

    if ($isExists > 0) {
      // Function already exists
    } else {
      $date = date('Y-m-d H:i:s');
      $insert = mysqli_query($con, "INSERT INTO ec_functions ( function_name, category, controller_name, alias,  `status`, created_on) VALUES('" . $whereCondition['function_name'] . "', '" . $whereCondition['category'] . "', 'admin','" . $whereCondition['alias'] . "',   '1', '" . $date . "')");

      if (!is_array($whereCondition)) {
        $whereCondition = [];
      }
    }
  } catch (\PDOException $e) {
    // Handle the database exception here
    // For example, you can log the error, display a message, or perform other actions.
    // You can access the exception message using $e->getMessage() and other details if needed.
  } catch (\Exception $e) {
    // Handle other types of exceptions here, if necessary
  }
}


/*

var_dump(authChecker('admin', ['edit_category']));
*/

function noAccessPage()
{
  try {

    echo "<script>window.location.href='no-access.php'</script>";
  } catch (Exception $e) {
    echo '<h1>Exception</h1>';
    echo '<p>' . $e->getMessage() . '</p>';
  }
}


function isUserLoggedIn()
{
  if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
   
    return true;
  } else {
    return false;
  }
}

