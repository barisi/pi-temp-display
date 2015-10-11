<?php
/**
 * Created by PhpStorm.
 * User: Barisi
 * Date: 09/10/2015
 * Time: 17:56
 */
include('../models/Readings.php');

$action = new Readings();
if ($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['save'])){
    if($_POST['action_id'] != null && $_POST['action_party'] != null && $_POST['recommended_by'] != null && $_POST['mcdr_id'] != null){
        if($action->createReading($_POST) == true){
            header('Location: ../../views/actions/index.php?add=success');
        }
        else{
            header('Location: ../../views/actions/index.php?add=failure');
        }
    }
    else{
        header('Location: ../../views/actions/add.php?status=failure');
    }
}
else if ($_SERVER["REQUEST_METHOD"]=="GET" && isset($_GET['delete'])){
    if($action->deleteReading($_GET['id']) == true){
        header('Location: ../../views/actions/index.php?delete=success');
    }
    else {
        header('Location: ../../views/actions/index.php?delete=failed');
    }
}
else if ($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['update'])){
    if($_POST['action_id'] != null && $_POST['action_party'] != null && $_POST['recommended_by'] != null && $_POST['mcdr_id'] != null){
        if($action->updateReading($_POST) == true){
            header('Location: ../../views/actions/index.php?update=success');
        }
        else {
            header('Location: ../../views/actions/index.php?update=failed');
        }
    }
    else{
        header('Location: ../../views/actions/edit.php?status=failure&id='.$_POST['id']);
    }
}
?>
