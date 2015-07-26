<?php

echo"
<html xmlns='http://www.w3.org/1999/xhtml' lang='en' xml:lang='en'>
<head>
    	<script type='text/javascript' src='http://code.jquery.com/jquery-latest.js'></script> 
	<script type='text/javascript'>

function toggleStatus() {
    if ($('#toggleElement').is(':checked')) {
        $('#elementsToOperateOn :input').attr('disabled', false);
		$('#elementsToOperateOnB :input').attr('disabled', true);
    }   
}
function toggleStatusB() {
    if ($('#toggleElementB').is(':checked')) {
        $('#elementsToOperateOnB :input').attr('disabled', false);
		$('#elementsToOperateOn :input').attr('disabled', true);
    } 
}
function infotabStatus() {
    if ($('#toggleInfoTab').is(':checked')) {
        $('#infotabelement :input').attr('disabled', false);
    } else {
	$('#infotabelement :input').attr('disabled', true);
	}
}

function extchargeStatus() {
    if ($('#toggleExtcharge').is(':checked')) {
        $('#extchargeElement :input').attr('disabled', false);
        $('#extchargeElement2 :input').attr('disabled', false);
    } else {
	$('#extchargeElement :input').attr('disabled', true);
        $('#extchargeElement2 :input').attr('disabled', true);
      
	}
}

function priceTextStatus() {
    if ($('#togglepricetext').is(':checked')) {
        $('#pricetextElement :input').attr('disabled', false);
            } else {
	$('#pricetextElement :input').attr('disabled', true);
          
	}
}

function homePagePostsStatus() {
    if ($('#toggleHomeposts').is(':checked')) {
        $('#homepostsElement :input').attr('disabled', false);
            } else {
	$('#homepostsElement :input').attr('disabled', true);
          
	}
}

function searchPagePostsStatus() {
    if ($('#togglesearchposts').is(':checked')) {
        $('#searchpostsElement :input').attr('disabled', false);
            } else {
	$('#searchpostsElement :input').attr('disabled', true);
          
	}
}
function excerptStatus() {
    if ($('#toggleexcerpt').is(':checked')) {
        $('#excerptElement :input').attr('disabled', false);
            } else {
	$('#excerptElement :input').attr('disabled', true);
          
	}
}
function spamStatus() {
    if ($('#togglespam').is(':checked')) {
        $('#spamElement :input').attr('disabled', false);
            } else {
	$('#spamElement :input').attr('disabled', true);
          
	}
}
function AfooterStatus() {
    if ($('#toggleAfooter').is(':checked')) {
        $('#AfooterElement :input').attr('disabled', false);
            } else {
	$('#AfooterElement :input').attr('disabled', true);
          
	}
}

function revisionsStatus() {
    if ($('#toggleRevisions').is(':checked')) {
        $('#revisionsElement :input').attr('disabled', false);
            } else {
	$('#revisionsElement :input').attr('disabled', true);
          
	}
}
function trashStatus() {
    if ($('#toggleTrash').is(':checked')) {
        $('#trashElement :input').attr('disabled', false);
            } else {
	$('#trashElement :input').attr('disabled', true);
          
	}
}
function rssdelayStatus() {
    if ($('#toggleRssdelay').is(':checked')) {
        $('#rssdelayElement :input').attr('disabled', false);
            } else {
	$('#rssdelayElement :input').attr('disabled', true);
          
	}
}
function gglAnlyticsStatus() {
    if ($('#togglegglAnlytics').is(':checked')) {
        $('#gglAnlyticselement :input').attr('disabled', false);
            } else {
	$('#gglAnlyticselement :input').attr('disabled', true);
          
	}
}



function start(){
    toggleStatus();
    toggleStatusB();
    infotabStatus();
    extchargeStatus();
    priceTextStatus();
    homePagePostsStatus();
    searchPagePostsStatus();
    excerptStatus();
    spamStatus();
    AfooterStatus();
    revisionsStatus();
    trashStatus();
    rssdelayStatus();
    gglAnlyticsStatus();
    }
</script>
</head>
";
