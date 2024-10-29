<?php
function Beagle_WP_Page_Content()
{
	// define('__ROOT__', dirname(dirname(__FILE__)));
	require_once(sanitize_file_name('style.php'));
	require_once(sanitize_file_name('progressRound.php'));
	require_once(sanitize_file_name('script.php'));
	require_once(sanitize_file_name('gplLicense.php'));
	$beagleUrl = "https://beaglesecurity.com/";
	$beagleHelp = "https://help.beaglesecurity.com/article/30/where-to-find-access-token-and-application-token";
	$beagleDetReport = "https://beaglesecurity.com/dashboard/home";
	$beagleHeaderImage = "https://cdn.beaglesecurity.com/assets/brand/png/beagle-blue.png";

?>

	<div class="header">
		<a href=<?php echo esc_url($beagleUrl); ?> target="_blank">
			<img src="<?php echo $beagleHeaderImage; ?>" alt="Beagle Security">
		</a>
	</div>
	<?php
	global $wpdb;
	$Beagle_WP_scan_table = $wpdb->prefix . "beagleScanData";
	$getDataFromDb = $wpdb->get_results("SELECT * FROM $Beagle_WP_scan_table");
	if (!$getDataFromDb) { ?>
		<form method="POST" class="input-form font-monte">
			<div class="form-group access">
				<label class="label mb-0">Access token</label>
				<input class="form-control" type="text" minlength="32" name="access_token" id="access_token" placeholder="Enter Access Token" required>
			</div>
			<div class="form-group appdiv">
				<label class="label my-0">Application token</label>
				<input class="form-control" type="text" minlength="32" name="application_token" placeholder="Enter Application Token" id="application_token" required>
			</div>
			<div class="form-group m-auto">
				<button class="startBtn" type="submit" name="startVerify" onclick="BeagleWP_Token_Input()">
					<span id="continueSave">CONTINUE</span>
					<span id="spinnerSave" style="display: none;" class="loaderFirst"></span>
				</button>
			</div>
			<div class="form-group help">
				<a href="<?php echo esc_url($beagleHelp); ?>" target="_blank">Need help on tokens?</a>
			</div>
		</form>
	<?php
	}
	if ($getDataFromDb) { ?>
		<div class="row w-100 justify-content-center font-monte">
			<div class="container mx-auto">
				<div class="col-sm-12 d-flex mb-2 w-100 mx-auto head-main">
					<div class="col-sm p-0 app-image my-auto">
						<div class="application-image">
						</div>
					</div>
					<div class="col-sm-10 px-4 my-auto">
						<div class="row w-100">
							<span class="col-sm-5 d-block">
								<div class="row titledomain">
									<?php echo $getDataFromDb[0]->title; ?>
								</div>
								<div class="row urldomain">
									<div class="form-group px-0">
										<label class="form-check-label"><?php echo $getDataFromDb[0]->url; ?></label>
										<?php
										if ($getDataFromDb[0]->verified == 1) {
											echo '<span class="dashicons dashicons-yes verify-icon ml-2" title="Domain verification completed successfully."></span>';
										}?>
									</div>
								</div>
							</span>
							<span class="col-sm-7 d-flex my-auto">
								<?php
								if ($getDataFromDb[0]->verified == 0) {
									echo '<span class="dashicons dashicons-no-alt close-icon " title="Domain verification not completed." id="notverifyiedicon"></span>';
									if ($getDataFromDb[0]->autoVerify == 0) {
										echo '<button class="btn verify-domain my-auto" id="verifyDomain" onclick="BeagleWP_verifyDomain_ByUser()">
									VERIFY DOMAIN</button>
									<button class="btn verify-domain my-auto startVerify" id="verifyDomainHide" disabled>
									<span class="spinner-border spinner-border-sm my-auto" role="status" aria-hidden="true"></span>
									<span class="my-auto">Verifying...</span>
									</button>
									';
									} else {
										echo '<span class="my-auto">
										<span class="errorMsg my-auto">Domain verification failed!</span>
										<span onclick="BeagleWP_show_Msg()" class="dashicons dashicons-info-outline infoicon my-auto"></span>
									</span>';
									}
								}
								?>
								<span id="verifyError" class="my-auto" style="display: none;">
									<span class="errorMsg my-auto" id="verificationFailMsg">Domain verification failed!</span>
									<span onclick="BeagleWP_show_Msg()" class="dashicons dashicons-info-outline infoicon my-auto"></span>
								</span>
							</span>
						</div>
					</div>
					<div class="col-sm  p-0 my-auto d-flex justify-content-end">
						<?php
						if ($getDataFromDb[0]->runningStatus == "notRunning") {
							echo '<span class="dashicons dashicons-trash delete-icon" title="remove test" onclick="BeagleWP_delete_Confirm()"></span>';
						} else {
							echo '<span class="dashicons dashicons-trash delete-icon-hide" title="Test in running status"></span>';
						}
						?>
					</div>
				</div>
				<form method="POST" class="col-sm-12 d-flex justify-content-center test-box">
					<?php
					if ($getDataFromDb[0]->verified == "0") {
						echo '<button class="btn hidden-test" disabled>START TEST</button>';
					} else {
						if ($getDataFromDb[0]->runningStatus == "Running") {
							echo '<button type="submit" name="stopBeagleTest" class="btn stop-test">STOP TEST</button>';
						} else {
							if ($getDataFromDb[0]->status == "completed") {
								echo '<button type="submit" name="restartBeagleTest" class="btn start-test">RESTART TEST</button>';
							} else {
								echo '<button type="submit" name="startBeagleTest" class="btn start-test">START TEST</button>';
							}
						}
					}
					?>
				</form>
				<?php
				if ($getDataFromDb[0]->verified == "1" && $getDataFromDb[0]->runningStatus == "Running") { ?>
					<div class="col-sm-12 d-block justify-content-center status-box" id="statusbar">
						<div class="row">
							<div class="col-sm-6">
								<span class="ststustest" id="status"></span>
								<span class="test-msg" id="message"></span>
							</div>
							<div class="col-sm-6 d-flex justify-content-end">
							</div>
						</div>
						<div class="row">
							<div class="col-md-11 progressdiv my-auto">
								<div class="progress">
									<div id="progress" class="progress-bar" role="progressbar"></div>
								</div>
							</div>
							<div class="col-md-1 reloadicon my-auto float-left">
								<span name="statusGet" id="statusGet" onclick="BeagleWP_getStatus_Data()" class="dashicons dashicons-image-rotate rotate-icon reload-icon"></span>
								<span class="loadingRe" style="display: none;" id="spinner">
									<div class="loader"></div>
								</span>
							</div>
						</div>
					</div>
				<?php
				} ?>
				<div class="row px-3 resultblock" id="resultData">
					<div class="col-sm-12 score progressround d-flex justify-content-center">
						Your score is
					</div>
					<div class="col-sm-12 pt-2 progressround d-flex justify-content-center">
						<div class="c100 small" id="progressClass">
							<span id="progressCount"></span>
							<div class="slice">
								<div class="bar"></div>
								<div class="fill" id="fill"></div>
							</div>
						</div>
					</div>
					<div class="row p-0 m-0  w-100">
						<div class="col px-0 py-2 gentxt" id="resulttext">
							Last test result
						</div>
						<div class="col px-0 py-2 d-flex justify-content-end gendate align-items-baseline">
							Generated date: <span id="genDate"></span>
						</div>
					</div>
					<div class="col-sm-2 m-auto critical">
						<div class="row m-auto justify-content-center countnumber" id="criticalBug">

						</div>
						<div class="row m-auto justify-content-center counttext">
							Critical
						</div>
					</div>
					<div class="col-sm-2 m-auto high">
						<div class="row m-auto justify-content-center countnumber" id="highBug">

						</div>
						<div class="row m-auto justify-content-center counttext">
							High
						</div>
					</div>
					<div class="col-sm-2 m-auto medium">
						<div class="row m-auto justify-content-center countnumber" id="mediumBug">

						</div>
						<div class="row m-auto justify-content-center counttext">
							Medium
						</div>
					</div>
					<div class="col-sm-2 m-auto low">
						<div class="row m-auto justify-content-center countnumber" id="lowBug">

						</div>
						<div class="row m-auto justify-content-center counttext">
							Low
						</div>
					</div>
					<div class="col-sm-2 m-auto verylow">
						<div class="row m-auto justify-content-center countnumber" id="verylowBug">

						</div>
						<div class="row m-auto justify-content-center counttext">
							Very Low
						</div>
					</div>
					<div class="col-sm-2 m-auto total">
						<div class="row m-auto justify-content-center countnumber" id="totalBug">

						</div>
						<div class="row m-auto justify-content-center counttext">
							Total
						</div>
					</div>
					<div class="col-sm-12 pt-2 progressround d-flex justify-content-end">
						<div class="goto">For a detailed test report, go to <a href="<?php echo esc_url($beagleDetReport); ?>" target="_blank">Beagle Security</a></div>
					</div>
				</div>
			</div>
		</div>
		<?php
		if ($getDataFromDb[0]->verified == "1" && $getDataFromDb[0]->status != "completed") { ?>
			<script>
				function BeagleWP_getStatus_Data() {
					document.getElementById("statusGet").style.display = "none";
					document.getElementById("spinner").style.display = "block";
					BeagleWP_get_Data();
				}
				BeagleWP_get_Data();
				var timerVar = setInterval(BeagleWP_get_Data, 10000);
				<?php 
				if($getDataFromDb[0]->status == "completed"){?>
  					clearInterval(timerVar);
				<?php } ?>
			</script>
		<?php } else if ($getDataFromDb[0]->verified == "1" && $getDataFromDb[0]->status == "completed") { ?>
			<script>
				BeagleWP_get_Result();	
			</script>
<?php }
	}
}
