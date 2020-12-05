<?php

    // from https://gist.github.com/LogIN-/b2f072d02ad716e9272e

	function getsign($day,$month) {
		if(($month==1 && $day>20)||($month==2 && $day<20)) {
			$mysign = "aquarius";
		}
		if(($month==2 && $day>18 )||($month==3 && $day<21)) {
			$mysign = "pisces";
		}
		if(($month==3 && $day>20)||($month==4 && $day<21)) {
			$mysign = "aries";
		}
		if(($month==4 && $day>20)||($month==5 && $day<22)) {
			$mysign = "taurus";
		}
		if(($month==5 && $day>21)||($month==6 && $day<22)) {
			$mysign = "gemini";
		}
		if(($month==6 && $day>21)||($month==7 && $day<24)) {
			$mysign = "cancer";
		}
		if(($month==7 && $day>23)||($month==8 && $day<24)) {
			$mysign = "leo";
		}
		if(($month==8 && $day>23)||($month==9 && $day<24)) {
			$mysign = "virgo";
		}
		if(($month==9 && $day>23)||($month==10 && $day<24)) {
			$mysign = "libra";
		}
		if(($month==10 && $day>23)||($month==11 && $day<23)) {
			$mysign = "scorpio";
		}
		if(($month==11 && $day>22)||($month==12 && $day<23)) {
			$mysign = "sagittarius";
		}
		if(($month==12 && $day>22)||($month==1 && $day<21)) {
			$mysign = "capricorn";
		}
		return $mysign;
		// test
	}

?>