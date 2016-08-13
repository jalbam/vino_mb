<?php
    //Si no estan seteadas las variables de SESSION, se setean:
    if (!isset($HTTP_SESSION_VARS["name"])) { $HTTP_SESSION_VARS["name"] = ""; }
    if (!isset($HTTP_SESSION_VARS["last_name"])) { $HTTP_SESSION_VARS["last_name"] = ""; }
    if (!isset($HTTP_SESSION_VARS["street"])) { $HTTP_SESSION_VARS["street"] = ""; }
    if (!isset($HTTP_SESSION_VARS["city"])) { $HTTP_SESSION_VARS["city"] = ""; }
    if (!isset($HTTP_SESSION_VARS["zip_code"])) { $HTTP_SESSION_VARS["zip_code"] = ""; }
    if (!isset($HTTP_SESSION_VARS["contact_email"])) { $HTTP_SESSION_VARS["contact_email"] = ""; }

    //Si no estan seteadas las variables de POST, se setean igual que las de SESSION:
    if (!isset($HTTP_POST_VARS["name"])) { $HTTP_POST_VARS["name"] = $HTTP_SESSION_VARS["name"]; }
    if (!isset($HTTP_POST_VARS["last_name"])) { $HTTP_POST_VARS["last_name"] = $HTTP_SESSION_VARS["last_name"]; }
    if (!isset($HTTP_POST_VARS["street"])) { $HTTP_POST_VARS["street"] = $HTTP_SESSION_VARS["street"]; }
    if (!isset($HTTP_POST_VARS["city"])) { $HTTP_POST_VARS["city"] = $HTTP_SESSION_VARS["city"]; }
    if (!isset($HTTP_POST_VARS["zip_code"])) { $HTTP_POST_VARS["zip_code"] = $HTTP_SESSION_VARS["zip_code"]; }
    if (!isset($HTTP_POST_VARS["contact_email"])) { $HTTP_POST_VARS["contact_email"] = $HTTP_SESSION_VARS["contact_email"]; }
?>
<center>
<form method="post" action="<?php echo $this_file; ?>?<?php echo $sid_get; ?>" style="display:inline;">
    <input type="hidden" name="form_sent" value="ok">
    <table border="0" cellspacing="0" cellpadding="2">
        <tr>
            <td align="right">
                <?php echo $form_name_label; ?>:
            </td>
            <td>
                <input type="text" name="name" value="<?php echo $HTTP_POST_VARS["name"]; ?>">
            </td>
        </tr>
        <tr>
            <td align="right">
                <?php echo $form_last_name_label; ?>:
            </td>
            <td>
                <input type="text" name="last_name" value="<?php echo $HTTP_POST_VARS["last_name"]; ?>">
            </td>
        </tr>
        <tr>
            <td align="right">
                <?php echo $form_street_label; ?>:
            </td>
            <td>
                <input type="text" name="street" value="<?php echo $HTTP_POST_VARS["street"]; ?>">
            </td>
        </tr>
        <tr>
            <td align="right">
                <?php echo $form_city_label; ?>:
            </td>
            <td>
                <input type="text" name="city" value="<?php echo $HTTP_POST_VARS["city"]; ?>">
            </td>
        </tr>
        <tr>
            <td align="right">
                <?php echo $form_zip_code_label; ?>:
            </td>
            <td>
                <input type="text" name="zip_code" value="<?php echo $HTTP_POST_VARS["zip_code"]; ?>"><br>
            </td>
        </tr>
        <tr>
            <td align="right">
                <?php echo $form_contact_email_label; ?>:
            </td>
            <td>
                <input type="text" name="contact_email" value="<?php echo $HTTP_POST_VARS["contact_email"]; ?>"><br>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <center><input type="submit" name="send_button" value="<?php echo $send_button_label; ?>"></center>
            </td>
        </tr>
    </table>
</form>
</center>
