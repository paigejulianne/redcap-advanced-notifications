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
<h3>Add / Edit Notification</h3>
<hr/>
<form method="post">
<?php
if ($displayType == "project") {
    $instruments = REDCap::getInstrumentNames();
    echo 'Form to apply to:  <select name="instrument">';
    foreach($instruments as $name => $label) {
        printf('<option value="%s" %s>%s</option>', $name, $selected, $label);
    }
    echo '</select><br/><br/>';
}
?>
    Execute the following actions when this condition is met:<br/>
    <textarea name="condition" id="code" cols="80" rows="5"></textarea>
    <br/><br/>
    <label><input type="checkbox" name="action" value="sendEmail"> Send an email</label><br/>
    <!-- from -->
    <!-- to -->
    <!-- cc -->
    <!-- bcc -->
    <!-- subject -->
    <!-- body -->
<?php if(($displayType == "project") && ($Proj->messaging_provider)):
    ?>
    <label><input type="checkbox" name="action" value="sendSMS"> Send an SMS message</label><br/>
    <!-- to -->
    <!-- body -->
<?php endif; ?>
    <label><input type="checkbox" name="action" value="lockForm"> Lock the Form</label><br/>
<?php if($displayType == "project"): ?>
    <label><input type="checkbox" name="action" value="setData"> Set record data</label><br/>
    <!-- growing table with dropdown of variable names on left column, input box on right column -->
<?php endif; ?>
    <button class="btn btn-primary" type="submit">Save</button>
</form>

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
