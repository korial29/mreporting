<?php

include ("../../../inc/includes.php");

global $LANG;
Session::checkLoginUser();


if (isset($_POST['saveConfig'])) {


    PluginMreportingMisc::saveSelectors($_POST['f_name']);

    $_REQUEST['f_name'] = $_POST['f_name'];
    $_REQUEST['short_classname'] = $_POST['short_classname'];
    PluginMreportingMisc::getSelectorValuesByUser();

    Html::back();


}else if (isset($_POST['addReports'])) {

    $dashboard = new PluginMreportingDashboard();
    $post = array('users_id' => $_SESSION['glpiID'], 'reports_id' => $_POST['report']);
    $dashboard->add($post);


    Html::back();

}else {
    Html::header($LANG['plugin_mreporting']["name"], '' ,"plugins", "mreporting");
    $dashboard = new PluginMreportingDashboard();
    $dashboard->showDashBoard();

    Html::footer();
}





