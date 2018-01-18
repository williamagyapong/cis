<?php
require_once 'settings.php';
$member = new Member();
$user = new User();
function test()
{
	return 454;
}
if(test()!=0) echo 'zero';
else
 echo 'not zero';
$result = DBHandler::getInstance()->select("SELECT * FROM members")->all();
$result = DBHandler::getInstance()->select("SELECT languages, JSON_EXTRACT(languages, '$.id'), g FROM members WHERE JSON_EXTRACT(languages, '$.id') > 1")->all();
//print_array($result);
?>


<input type="text" name="father" list="members">
<datalist id="members">
	<option value="Theophilus" >
	<option value="Anokye">
	<option value="Boakye Duku">
	<option value="Owusu Ankomah">
</datalist>

function popUpModal2(url='', id='') {
        // show modal
        $('#cis_modal1').show();
        $('#cis_modal1 .content').load(url, {unique_id:id})
            $('#cis_modal1 .w3-modal-content').animate({height: "90%"},500,function(){
           $('#cis_modal1 .w3-modal-content').animate({width: "70%"},500,function(){
             //render(data, '#cis_modal1 .content');
        });
      });
    
    
    }
