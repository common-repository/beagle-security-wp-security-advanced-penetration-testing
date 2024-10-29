<?php
include sanitize_file_name('bootstrap.php');
?>

<style>

	.font-monte {
		font-family: 'Montserrat', sans-serif;
	}

	.header {
		width: 100%;
		margin: 4rem auto 1rem auto;
		justify-content: center !important;
		display: flex;
		overflow-x: hidden;
		overflow-y: auto;
	}

	.header a {
		text-decoration: none;
	}

	.header a img {
		outline: none;
	}

	.header img {
		width: 200px;
		height: auto;
	}

	.errormsg p {
		padding: 1rem;
		color: #fff;
		position: fixed;
		background-color: red;
		top: 3rem;
		right: 0px;
		font-size: 14px;
		font-family: "Georgia";
		font-weight: 500;
		width: 300px;
		z-index: 999;
	}

	.message p {
		padding: 1rem;
		color: #fff;
		background-color: green;
		position: fixed;
		top: 3rem;
		right: 0px;
		font-size: 14px;
		font-family: "Georgia";
		font-weight: 500;
		width: 300px;
		z-index: 999;
	}

	.input-form {
		width: 25rem;
		margin: 2rem auto;
		justify-content: center !important;
		display: block;
		padding: 1rem;
	}

	.help {
		padding-top: 1rem;
		font-size: 12px;
		color: #006eeb;
		text-decoration: none;
	}

	.help a {
		text-decoration: none;
		outline: none !important;
	}

	.help a:focus {
		text-decoration: none;
		outline: none !important;
	}

	.label {
		font-size: 14px;
		color: #676767;
		margin: 24px 0 10px 0px;
		font-weight: 400;
	}

	.form-control {
		display: flex;
		width: 100%;
		border-radius: 4px;
		padding: 0.5rem 1rem !important;
		margin-top: 10px;
		font-size: 14px;
		height: 50px;
		background-color: #f5f5f5;
		border: 1px solid #cfd8dc;
	}

	.access {
		margin-bottom: 24px !important;
	}

	.form-group {
		display: block;
		width: 100%;
		margin: auto;
	}

	.appdiv {
		margin-bottom: 46px;
	}

	.startBtn {
		background-color: #14bc53;
		border: 1px solid #1fca5f;
		border-radius: 4px;
		padding: 12px 16px;
		color: #fff;
		font-size: 16px;
		font-weight: 600;
		width: 100%;
		position: relative;
		display: flex;
		justify-content: center;
		align-items: center;
		transition: all .2s ease-in-out;
		cursor: pointer;
	}

	.startBtn:focus {
		outline: transparent;
	}

	.container {
		padding: 7px;
		overflow-x: hidden;
		margin-top: 52px;
		width: 50rem;
		background-color: #f2f4f8;
		border-radius: 12px;
		box-shadow: 0px 1px 4px 0px #d2d2d2;
		padding-bottom: 2rem;
	}

	.head-main {
		height: 135px;
		background-color: #ffffff;
		border-radius: 8px;
		box-shadow: 0px 2px 3px 0px #d0d0d0;
		padding: 2rem;
	}

	.head-block {
		padding: auto 24px !important;
	}

	.titledomain {
		font-size: 18px;
		color: #3d3d3d;
		line-height: 25px;
		white-space: nowrap;
		overflow: hidden;
		text-overflow: ellipsi
	}

	.urldomain {
		font-size: 14px;
		color: #006eeb;
		white-space: nowrap;
		overflow: hidden;
		text-overflow: ellipsi
	}

	.app-image {
		max-width: 50px;
	}

	.delete-icon {
		height: 36px;
		width: 36px;
		background-color: #e9e9e9;
		border-radius: 50%;
		padding: 8px 4px;
		color: #eb0000;
		cursor: pointer;
	}

	.delete-icon:hover {
		box-shadow: 0px 1px 6px 0px;
	}

	.delete-icon-hide {
		height: 36px;
		width: 36px;
		background-color: #e9e9e9;
		border-radius: 50%;
		padding: 8px 4px;
		color: #a0a0a0;
		cursor: pointer;
	}

	.verify-icon {
		height: 16px;
		width: 16px;
		border: 1px solid #1cd160;
		border-radius: 50%;
		border-radius: 50%;
		color: #1cd160;
		font-size: 12px;
		margin-left: 10px !important;
		margin-top: 3px !important;
		padding: 1px  !important;
	}

	.close-icon {
		height: 36px;
		width: 36px;
		border-radius: 50%;
		padding: 6px 4px;
		color: #eb0000;
		border: 2px solid #eb0000;
	}

	.errorMsg {
		font-family: 'Montserrat';
		font-size: 12px;
		color: #eb0000;
		margin-left: 20px;
	}

	.infoicon {
		color: #3fa9f5;
		cursor: pointer;
		margin-left: 8px;
	}

	.btn {
		height: 52px;
		width: 168px;
		border-radius: 8px;
		color: #fff;
	}

	.start-test {
		background-color: #006eeb;
	}

	.hidden-test {
		background-color: #006eeb;
		opacity: 0.5;
	}

	.stop-test {
		background-color: #eb0000;
	}

	.btn:hover {
		color: #fff;
		font-weight: 500;
	}

	.verify-domain {
		height: 32px;
		background-color: #e6f4ff;
		border: 1px solid #d7edff;
		border-radius: 4px;
		color: #1f1f1f !important;
		margin-left: 20px;
		font-size: 12px;
		width: 135px;
	}

	.verify-domain:hover {
		box-shadow: 0px 1px 6px 0px #006eeb;
	}

	.verify-domain:focus {
		outline: transparent;
	}

	.test-box {
		padding: 1.5rem;
	}

	.status-box {
		padding-left: 14px;
	}

	.ststustest {
		text-transform: uppercase;
		font-family: 'Montserrat';
		font-size: 14px;
		color: #676767;
	}

	.test-msg {
		font-family: 'Montserrat';
		font-size: 14px;
		color: #1f1f1f;
	}

	.reload-icon {
		cursor: pointer;
		height: 30px;
		width: 30px;
		background-color: #ffffff;
		font-size: 20px;
		color: #006eeb;
		border-radius: 50%;
		padding: 5px;
	}

	.score {
		font-size: 14px;
	}

	.progressdiv {
		width: 90%;
	}

	.progress {
		background-color: #dfe4ef;
	}

	.progress-bar {
		background-color: #006eeb;
	}

	.progress,
	.progress-bar {
		font-size: 10px;
		border-radius: 10px;
	}

	.reloadicon {
		width: 10%;
	}

	.critical {
		background-color: #F24747;
		border: 1px solid #F24747;
		border-radius: 8px 0px 0px 8px;
		padding-top: 14px;
		padding-bottom: 12px;
	}

	.high {
		background-color: #EE9336;
		border: 1px solid #EE9336;
		padding-top: 14px;
		padding-bottom: 12px;
	}

	.medium {
		background-color: #FDC431;
		border: 1px solid #FDC431;
		padding-top: 14px;
		padding-bottom: 12px;
	}

	.low {
		background-color: #4CAE4C;
		border: 1px solid #4CAE4C;
		padding-top: 14px;
		padding-bottom: 12px;
	}

	.verylow {
		background-color: #357ABD;
		border: 1px solid #357ABD;
		padding-top: 14px;
		padding-bottom: 12px;
	}

	.total {
		background-color: #ffffff;
		border: 1px solid #DFE4EF;
		border-radius: 0px 8px 8px 0px;
		padding-top: 14px;
		padding-bottom: 12px;
	}

	.total .countnumber {
		color: #000;
		font-weight: 500;
		font-size: 24px;
		line-height: 0.95;
	}

	.countnumber {
		color: #fff;
		font-weight: 500;
		font-size: 24px;
		line-height: 0.95;
	}

	.total .counttext {
		font-size: 12px;
		padding-top: 8px;
		color: #006eeb;
	}

	.counttext {
		font-size: 12px;
		padding-top: 5px;
		color: #fff;
	}

	.startVerify {
		display: none;
	}

	.spinner-border {
		width: 20px;
		height: 20px;
		margin: auto;
	}

	.resultblock {
		display: none;
	}

	.loadingRe {
		display: flex;
		cursor: pointer;
		height: 30px;
		width: 30px;
		background-color: #ffffff;
		font-size: 20px;
		color: #006eeb;
		border-radius: 50%;
		padding: 5px;
	}

	.gendate {
		font-size: 12px;
		color: #1f1f1f;
	}

	.gentxt {
		font-size: 14px;
		color: #1f1f1f;
	}

	.gentxt span {
		font-size: 12px;
		color: #676767;
	}

	.goto {
		font-size: 12px;
	}

	.goto a {
		text-decoration: none;
	}

	.loader {
		border: 5px solid transparent;
		background-color: transparent;
		border-radius: 50%;
		border-top: 3px solid #006eeb;
		width: 20px;
		height: 20px;
		-webkit-animation: spin 2s linear infinite;
		/* Safari */
		animation: spin 2s linear infinite;
	}

	.loaderFirst {
		border: 5px solid transparent;
		background-color: transparent;
		border-radius: 50%;
		border-top: 5px solid #fff;
		width: 20px;
		height: 20px;
		-webkit-animation: spin 2s linear infinite;
		/* Safari */
		animation: spin 2s linear infinite;
	}

	/* Safari */
	@-webkit-keyframes spin {
		0% {
			-webkit-transform: rotate(0deg);
		}

		100% {
			-webkit-transform: rotate(360deg);
		}
	}

	@keyframes spin {
		0% {
			transform: rotate(0deg);
		}

		100% {
			transform: rotate(360deg);
		}
	}

	/* cyrillic-ext */
	@font-face {
		font-family: 'Montserrat';
		font-style: normal;
		font-weight: 400;
		src: url(https://fonts.gstatic.com/s/montserrat/v15/JTUSjIg1_i6t8kCHKm459WRhyzbi.woff2) format('woff2');
		unicode-range: U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;
	}

	/* cyrillic */
	@font-face {
		font-family: 'Montserrat';
		font-style: normal;
		font-weight: 400;
		src: url(https://fonts.gstatic.com/s/montserrat/v15/JTUSjIg1_i6t8kCHKm459W1hyzbi.woff2) format('woff2');
		unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
	}

	/* vietnamese */
	@font-face {
		font-family: 'Montserrat';
		font-style: normal;
		font-weight: 400;
		src: url(https://fonts.gstatic.com/s/montserrat/v15/JTUSjIg1_i6t8kCHKm459WZhyzbi.woff2) format('woff2');
		unicode-range: U+0102-0103, U+0110-0111, U+0128-0129, U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
	}

	/* latin-ext */
	@font-face {
		font-family: 'Montserrat';
		font-style: normal;
		font-weight: 400;
		src: url(https://fonts.gstatic.com/s/montserrat/v15/JTUSjIg1_i6t8kCHKm459Wdhyzbi.woff2) format('woff2');
		unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
	}

	/* latin */
	@font-face {
		font-family: 'Montserrat';
		font-style: normal;
		font-weight: 400;
		src: url(https://fonts.gstatic.com/s/montserrat/v15/JTUSjIg1_i6t8kCHKm459Wlhyw.woff2) format('woff2');
		unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
	}


	.application-image {
		margin: auto;
		width: 50px;
		height: 50px;
		background-size: 138px 50px;
		background-repeat: no-repeat;
		background-image: url('https://cdn.beaglesecurity.com/assets/brand/png/beagle-blue.png');
	}
</style>