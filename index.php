<?php
$displayType = $_REQUEST['displayType']; // either 'project' or 'global'

switch($displayType) {
    case 'project':
        require_once APP_PATH_DOCROOT . 'ProjectGeneral/header.php';
        break;
    case 'global':
        require_once APP_PATH_DOCROOT . 'ControlCenter/header.php';
        break;
    default:
        die('You are not allowed to access this page');
}











?>
    <h2>Advanced Notifications</h2>
<hr/>

    <a class="btn" href="<?php echo $module->getUrl('addedit.php?displayType='.$displayType); ?>">Add New Notification</a>



<?php
switch($displayType) {
    case 'project':
        require_once APP_PATH_DOCROOT . 'ProjectGeneral/footer.php';
        break;
    case 'global':
        require_once APP_PATH_DOCROOT . 'ControlCenter/footer.php';
        break;
    default:
        die('You are not allowed to access this page');
}