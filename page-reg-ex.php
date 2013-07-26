<?php

	$qs = array();
	$qs[] = '<reports#1234';
	$qs[] = '#1234';
	$qs[] = '<3#my-post';

	$splits = '/#+';

	shuffle($qs);
	$q = $qs[0];

	$terms = preg_split($splits.'/', $q, -1, PREG_SPLIT_DELIM_CAPTURE);
	print_r($terms);