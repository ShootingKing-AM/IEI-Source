<?php
	error_reporting(0);
	include('func.php');
	$title = "";
	set_time_limit(0);
	$ser    = "http://site24.way2sms.com/";
	$ckfile = tempnam("/tmp", "CURLCOOKIE");
	$login  = $ser . "Login1.action";
	$uid    = ******;
	$pwd    = ******;
	$to     = $m;
	$msg    = "IEI-your profile has been updated:UserName-" . $un . ",Mobile-" . $m . ",Full Name-" . $user;
	if (!$to)
	{
		$to = $uid;
	}
	if (!$msg)
	{
		$msg = rword(5) . rword(5) . rword(5) . rword(5) . rword(5);
	}
	$captcha = input($_REQUEST['captcha']);
	flush();
	if ($uid && $pwd)
	{
		$ibal  = "0";
		$sbal  = "0";
		$lhtml = "0";
		$shtml = "0";
		$khtml = "0";
		$qhtml = "0";
		$fhtml = "0";
		$te    = "0";
		flush();
		$loginpost = "gval=&username=" . $uid . "&password=" . $pwd . "&Login=Login";
		$ch        = curl_init();
		$lhtml     = post($login, $loginpost, $ch, $ckfile);
		////curl_close($ch);
		if (stristr($lhtml, 'Location: ' . $ser . 'vem.action') || stristr($lhtml, 'Location: ' . $ser . 'MainView.action') || stristr($lhtml, 'Location: ' . $ser . 'ebrdg.action'))
		{
			preg_match("/~(.*?);/i", $lhtml, $id);
			$id = $id['1'];
			if (!$id)
			{
				show('Login Failed. We Didnot Get Session Value.', 'darkred');
				goto end;
			}
			show('', 'darkgreen');
			goto bal;
		}
		elseif (stristr($lhtml, 'Location: http://site2.way2sms.com/entry'))
		{
			show('Login Failed. Invalid Login Details.', 'darkred');
			goto end;
		}
		else
		{
			show('Login Failed. Unknown Error Occured.', 'darkred');
			goto end;
		}
	bal:
		///$ch = curl_init();
		$msg   = urlencode($msg);
		$main  = $ser . "smstoss.action";
		$ref   = $ser . "sendSMS?Token=" . $id;
		$conf  = $ser . "smscofirm.action?SentMessage=" . $msg . "&Token=" . $id . "&status=0";
		$post  = "ssaction=ss&Token=" . $id . "&mobile=" . $to . "&message=" . $msg . "&Send=Send Sms&msgLen=" . strlen($msg);
		$mhtml = post($main, $post, $ch, $ckfile, $proxy, $ref);
		if (stristr($mhtml, 'smscofirm.action?SentMessage='))
		{
		}
		else
		{
			show('Error in Sending SmS.', 'darkred');
		}
		curl_close($ch);
	end:
		echo "</div>";
		flush();
	}
	header('Location: ../profile.php');