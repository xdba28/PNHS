<?php
// OneFileCMS Language Settings v3.6.09

$_['LANGUAGE'] = 'English';
$_['LANG'] = 'EN';

// If no translation or value is desired for a particular setting, do not delete
// the actual setting variable, just set it to an empty string.
// For example:  $_['some_unused_setting'] = '';
//
// Remember to slash-escape any single quotes that may be within the text:  \'
// The back-slash itself may or may not also need to be escaped:  \\
//
// If present as a trailing comment, "## NT ##" means 'Needs Translation'.
//
// These first few settings control a few font and layout settings.
// In some instances, some langauges may use significantly longer words or phrases than others.
// So, a smaller font or less spacing may be desirable in those places to preserve page layout.
$_['front_links_font_size']  = '1.0em';   //Buttons on Index page.
$_['front_links_margin_L']   = '1.0em';
$_['MCD_margin_R']           = '1.0em';   //[Move] [Copy] [Delete] buttons
$_['button_font_size']       = '0.9em';   //Buttons on Edit page.
$_['button_margin_L']        = '0.7em';
$_['button_padding']         = '4px 4px 4px 4px'; //T R B L  ,or,   V H   if only two values.
$_['image_info_font_size']   = '1em';     //show_img_msg_01  &  _02
$_['image_info_pos']         = '';        //If 1 or true, moves the info down a line for more space.
$_['select_all_label_size']  = '.84em';   //Font size of $_['Select_All']
$_['select_all_label_width'] = '72px';    //Width of space for $_['Select_All']

$_['HTML']    = 'HTML';
$_['WYSIWYG'] = 'WYSIWYG'; //...

$_['Admin']      = 'Admin';
$_['bytes']      = 'bytes';
$_['Cancel']     = 'Cancel';
$_['cancelled']  = 'cancelled';
$_['Close']      = 'Close';
$_['Copy']       = 'Copy';
$_['Copied']     = 'Copied';
$_['Create']     = 'Create';
$_['Date']       = 'Date';
$_['Delete']     = 'Delete';
$_['DELETE']     = 'DELETE';
$_['Deleted']    = 'Deleted';
$_['Edit']       = 'Edit';
$_['Enter']      = 'Enter';
$_['Error']      = 'Error';
$_['errors']     = 'errors';
$_['ext']        = '.ext';    //## NT ## filename[.ext]ension
$_['File']       = 'File';
$_['files']      = 'files';
$_['Folder']     = 'Folder';
$_['folders']    = 'folders';
$_['From']       = 'From';
$_['Group']      = 'Group';   //## NT ## as of 3.6.09
$_['Hash']       = 'Hash';
$_['Invalid']    = 'Invalid'; //## NT ## as of 3.5.23
$_['Move']       = 'Move';
$_['Moved']      = 'Moved';
$_['Name']       = 'Name';    //...
$_['on']         = 'on';
$_['off']        = 'off';
$_['Owner']      = 'Owner';   //## NT ## as of 3.6.09
$_['Password']   = 'Password';
$_['Rename']     = 'Rename';
$_['reset']      = 'Reset';
$_['save_1']     = 'Save';
$_['save_2']     = 'SAVE CHANGES';
$_['Size']       = 'Size';
$_['Source']     = 'Source';  //## NT ##
$_['successful'] = 'successful';
$_['To']         = 'To';
$_['Upload']     = 'Upload';
$_['Username']   = 'Username';
$_['View']       = 'View';

$_['Log_In']             = 'Log In';
$_['Log_Out']            = 'Log Out';
$_['Admin_Options']      = 'Administration Options';
$_['Are_you_sure']       = 'Are you sure?';
$_['View_Raw']           = 'View Raw'; //## NT ### as of 3.5.07
$_['Open_View']          = 'Open/View in browser window';
$_['Edit_View']          = 'Edit / View';
$_['Wide_View']          = 'Wide View';
$_['Normal_View']        = 'Normal View';
$_['Word_Wrap']          = 'Word Wrap'; //## NT ## as of 3.5.19
$_['Line_Wrap']          = 'Line Wrap'; //## NT ## as of 3.5.20
$_['Upload_File']        = 'Upload File';
$_['New_File']           = 'New File';
$_['Ren_Move']           = 'Rename / Move';
$_['Ren_Moved']          = 'Renamed / Moved';
$_['folders_first']      = 'folders first'; //## NT ##
$_['folders_first_info'] = 'Sort folders first, but don\'t change primary sort.'; //## NT ##
$_['New_Folder']         = 'New Folder';
$_['Ren_Folder']         = 'Rename / Move Folder';
$_['Submit']             = 'Submit Request';
$_['Move_Files']         = 'Move File(s)';
$_['Copy_Files']         = 'Copy File(s)';
$_['Del_Files']          = 'Delete File(s)';
$_['Selected_Files']     = 'Selected Folders and Files';
$_['Select_All']         = 'Select All';
$_['Clear_All']          = 'Clear All';
$_['New_Location']       = 'New Location';
$_['No_files']           = 'No files selected.';
$_['Not_found']          = 'Not found';
$_['Invalid_path']       = 'Invalid path'; //## NT ##
$_['must_be_decendant']  = '$DEFAULT_PATH must be a decendant of, or equal to, $ACCESS_ROOT'; //## NT ## as of 3.5.23
$_['Update_failed']      = 'Update failed';
$_['Working']            = 'Working - please wait...'; //## NT ##
$_['Enter_to_edit']      = '[Enter] to edit'; //## NT ## as of 3.6.07
$_['Press_Enter']        = 'Press [Enter] to save changes. Press [Esc] or [Tab] to cancel.'; //## NT ## as of 3.6.07
$_['Permissions_msg_1']  = 'Permissions must be exactly 3 or 4 octal digits (0-7)'; //## NT ## as of 3.6.07

$_['verify_msg_01']     = 'Session expired.';
$_['verify_msg_02']     = 'INVALID POST';
$_['get_get_msg_01']    = 'File does not exist:';
$_['get_get_msg_02']    = 'Invalid page request:';
$_['check_path_msg_02'] = '"dot" or "dot dot" path segments are not permitted.';
$_['check_path_msg_03'] = 'Path or filename contains an invalid character:';
$_['ord_msg_01']        = 'A file with that name already exists in the target directory.';
$_['ord_msg_02']        = 'Saving as';
$_['rCopy_msg_01']      = 'A folder can not be copied into one of its own sub-folders.';
$_['show_img_msg_01']   = 'Image shown at ~';
$_['show_img_msg_02']   = '% of full size (W x H =';

$_['hash_txt_01']   = 'The hashes generated by this page may be used to manually update $HASHWORD in OneFileCMS, or in an external config file.  In either case, make sure you remember the password used to generate the hash!';
$_['hash_txt_06']   = 'Type your desired password in the input field above and hit Enter.';
$_['hash_txt_07']   = 'The hash will be displayed in a yellow message box above that.';
$_['hash_txt_08']   = 'Copy and paste the new hash to the $HASHWORD variable in the config section.';
$_['hash_txt_09']   = 'Make sure to copy ALL of, and ONLY, the hash (no leading or trailing spaces etc).';
$_['hash_txt_10']   = 'A double-click should select it...';
$_['hash_txt_12']   = 'When ready, logout and login.';
$_['pass_to_hash']  = 'Password to hash:';
$_['Generate_Hash'] = 'Generate Hash';

$_['login_msg_01a'] = 'There have been';
$_['login_msg_01b'] = 'invalid login attempts.';
$_['login_msg_02a'] = 'Please wait';
$_['login_msg_02b'] = 'seconds to try again.';
$_['login_msg_03']  = 'INVALID LOGIN ATTEMPT #';

$_['edit_note_00']  = 'NOTES:';
$_['edit_note_01a'] = 'Remember- ';
$_['edit_note_01b'] = 'is';
$_['edit_note_02']  = 'So save changes before the clock runs out, or the changes will be lost!';
$_['edit_note_03']  = 'With some browsers, such as Chrome, if you click the browser [Back] then browser [Forward], the file state may not be accurate. To correct, click the browser\'s [Reload].';

$_['edit_h2_1']   = 'Viewing:';
$_['edit_h2_2']   = 'Editing:';
$_['edit_txt_00'] = 'Edit disabled.'; //## NT ## as of 3.5.07
$_['edit_txt_01'] = 'Non-text or unkown file type. Edit disabled.';
$_['edit_txt_02'] = 'File possibly contains an invalid character. Edit and view disabled.';
$_['edit_txt_03'] = 'htmlspecialchars() returned an empty string from what may be an otherwise valid file.';
$_['edit_txt_04'] = 'This behavior can be inconsistant from version to version of php.';
$_['edit_txt_05'] = 'File is readonly.';

$_['too_large_to_edit_01'] = 'Edit disabled. Filesize >';
$_['too_large_to_edit_02'] = 'Some browsers (ie: IE) bog down or become unstable while editing a large file in an HTML <textarea>.';
$_['too_large_to_edit_03'] = 'Adjust $MAX_EDIT_SIZE in the configuration section of OneFileCMS as needed.';
$_['too_large_to_edit_04'] = 'A simple trial and error test can determine a practical limit for a given browser/computer.';
$_['too_large_to_view_01'] = 'View disabled. Filesize >';
$_['too_large_to_view_02'] = 'Click [View Raw] to view the raw/"plain text" file contents in a seperate browser window.'; //** NT ** changed wording as of 3.5.07
$_['too_large_to_view_03'] = 'Adjust $MAX_VIEW_SIZE in the configuration section of OneFileCMS as needed.';
$_['too_large_to_view_04'] = '(The default value for $MAX_VIEW_SIZE is completely arbitrary, and may be adjusted as desired.)';

$_['meta_txt_01'] = 'Filesize:';
$_['meta_txt_03'] = 'Updated:';

$_['edit_msg_01'] = 'File saved:';
$_['edit_msg_02'] = 'bytes written.';
$_['edit_msg_03'] = 'There was an error saving file.';

$_['upload_txt_03'] = 'Maximum size of each file:';
$_['upload_txt_01'] = '(php.ini: upload_max_filesize)';
$_['upload_txt_04'] = 'Maximum total upload size:';
$_['upload_txt_02'] = '(php.ini: post_max_size)';
$_['upload_txt_05'] = 'For uploaded files that already exist: ';
$_['upload_txt_06'] = 'Rename (to filename.ext.001 etc...)';
$_['upload_txt_07'] = 'Overwrite';

$_['upload_err_01'] = 'Error 1: File too large. From php.ini:';
$_['upload_err_02'] = 'Error 2: File too large. (Exceeds MAX_FILE_SIZE HTML form element)';
$_['upload_err_03'] = 'Error 3: The uploaded file was only partially uploaded.';
$_['upload_err_04'] = 'Error 4: No file was uploaded.';
$_['upload_err_05'] = 'Error 5:';
$_['upload_err_06'] = 'Error 6: Missing a temporary folder.';
$_['upload_err_07'] = 'Error 7: Failed to write file to disk.';
$_['upload_err_08'] = 'Error 8: A PHP extension stopped the file upload.';

$_['upload_error_01a'] = 'Upload Error. Total POST data (mostly filesize) exceeded post_max_size =';
$_['upload_error_01b'] = '(from php.ini)';

$_['upload_msg_02'] = 'Destination folder invalid:';
$_['upload_msg_03'] = 'Upload cancelled.';
$_['upload_msg_04'] = 'Uploading:';
$_['upload_msg_05'] = 'Upload successful!';
$_['upload_msg_06'] = 'Upload failed:';
$_['upload_msg_07'] = 'A pre-existing file was overwritten.';

$_['new_file_txt_01'] = 'File or Folder will be created in the current folder.';
$_['new_file_txt_02'] = 'Some invalid characters are:';
$_['new_file_msg_01'] = 'File or folder not created:';
$_['new_file_msg_02'] = 'Name contains an invalid character:';
$_['new_file_msg_04'] = 'File or folder already exists:';
$_['new_file_msg_05'] = 'Created file:';
$_['new_file_msg_07'] = 'Created folder:';

$_['CRM_txt_02'] = 'The new location must already exist.';
$_['CRM_txt_04'] = 'New Name';
$_['CRM_msg_01'] = 'Error - new parent location does not exist:';
$_['CRM_msg_02'] = 'Error - source file does not exist:';
$_['CRM_msg_03'] = 'Error - new file or folder already exists:';
$_['CRM_msg_05'] = 'Error during';

$_['delete_msg_03']   = 'Delete error:';
$_['session_warning'] = 'Warning: Session timeout soon!';
$_['session_expired'] = 'SESSION EXPIRED';
$_['unload_unsaved']  = ' Unsaved changes will be lost!';
$_['confirm_reset']   = 'Reset file and loose unsaved changes?';
$_['OFCMS_requires']  = 'OneFileCMS requires PHP';
$_['logout_msg']      = 'You have successfully logged out.';
$_['edit_caution_01'] = 'CAUTION';
$_['edit_caution_02'] = 'You are viewing the active copy of OneFileCMS.'; //## NT ## changed wording 3.5.07
$_['time_out_txt']    = 'Session time out in:';

$_['error_reporting_01'] = 'Display errors is'; //## NT ##
$_['error_reporting_02'] = 'Log errors is'; //## NT ##
$_['error_reporting_03'] = 'Error reporting is set to'; //## NT ##
$_['error_reporting_04'] = 'Showing error types'; //## NT ##
$_['error_reporting_05'] = 'Unexpected early output'; //## NT ##
$_['error_reporting_06'] = '(nothing, not even white-space, should have been output yet)'; //## NT ##

$_['admin_txt_00'] = 'Old Backup Found';
$_['admin_txt_01'] = 'A backup file was created in case of an error during a username or password change. Therefore, it may contain old information and should be deleted if not needed. In any case, it will be automatically overwritten on the next password or username change.';
$_['admin_txt_02'] = 'General Information';
$_['admin_txt_03'] = 'Session Path'; //## NT ## as of 3.5.23
$_['admin_txt_04'] = 'Connected to'; //## NT ## as of 3.5.23
$_['admin_txt_14'] = 'For a small improvement to security, change the default salt and/or method used by OneFileCMS to hash the password (and keep them secret, of course). Every little bit helps...';
$_['admin_txt_16'] = 'OneFileCMS can not be used to edit itself directly.  However, you can make a copy and edit it.'; //## NT ## Changed wording in 3.5.07

$_['pw_current'] = 'Current Password';
$_['pw_change']  = 'Change Password';
$_['pw_new']     = 'New Password';
$_['pw_confirm'] = 'Confirm New Password';

$_['un_change']  = 'Change Username';
$_['un_new']     = 'New Username';
$_['un_confirm'] = 'Confirm New Username';

$_['pw_txt_02'] = 'Password / Username rules:';
$_['pw_txt_04'] = 'Case-sensitive: "A" =/= "a"';
$_['pw_txt_06'] = 'Must contain at least one non-space character.';
$_['pw_txt_08'] = 'May contain spaces in the middle. Ex: "This is a password or username!"';
$_['pw_txt_10'] = 'Leading and trailing spaces are ignored.';
$_['pw_txt_12'] = 'In recording the change, only one file is updated: either the active copy of OneFileCMS, or - if specified, an external configuration file.';
$_['pw_txt_14'] = 'If an incorrect current password is entered, you will be logged out, but you may log back in.';

$_['change_pw_01'] = 'Password changed!';
$_['change_pw_02'] = 'Password NOT changed.';
$_['change_pw_03'] = 'Incorrect current password. Login to try again.';
$_['change_pw_04'] = '"New" and "Confirm New" values do not match.';
$_['change_pw_05'] = 'Updating';
$_['change_pw_06'] = 'external config file';
$_['change_pw_07'] = 'All fields are required.'; //## NT ##

$_['change_un_01'] = 'Username changed!';
$_['change_un_02'] = 'Username NOT changed.';

$_['mcd_msg_01'] = 'file(s) and/or folder(s) moved.';
$_['mcd_msg_02'] = 'file(s) and/or folder(s) copied.';
$_['mcd_msg_03'] = 'file(s) and/or folder(s) deleted.';

