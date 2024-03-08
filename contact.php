<?php include('includes/header.php') ?>



<section class="page-title" style="background-image: url(images/background/page-title.jpg);">
	<div class="auto-container">
		<div class="title-outer">
			<h1 class="title">Contact Us</h1>
			<ul class="page-breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li>Contact</li>
			</ul>
		</div>
	</div>
</section>
<!-- test -->
<section class="contact-anshu">
	<div class="container">
		<div class="row mb-5" data-cues="slideInUp" data-disabled="true">
			<div class="col-lg-6" data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">
				<div class="title-wrap pe-lg-5">
					<h2 class="title md-title mb-lg-0">Let us know your reason for<span class="color3"> contacting</span> </h2>
				</div>
			</div>
			<div class="col-lg-6" data-cue="slideInUp" data-show="true" style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 180ms; animation-direction: normal; animation-fill-mode: both;">
				<div class="text-wrap">
					<p class="mb-lg-0 sort-cls"></p>
					<div class="ans-div">We would love to hear from you! Reach out to us with any questions, inquiries, or feedback. Our dedicated team is here to assist you. Fill out the query form and let's get started on your visa journey!</div>
					<p></p>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="contact-details ansh-cnt">
	<div class="container ">
		<div class="row">
		<div class="col-xl-4 col-lg-6">
				<div class="contact-details__right">
					<ul class="list-unstyled contact-details__info">
						<li>
							<div class="icon">
								<span class="lnr-icon-phone-plus"></span>
							</div>
							<div class="text">
								<h6>Have any question?</h6>
								<a href="tel:9999130118"><span>Free</span>+91-9999130118</a>
							</div>
						</li>
						<li>
							<div class="icon">
								<span class="lnr-icon-envelope1"></span>
							</div>
							<div class="text">
								<h6>Write email</h6>
								<a href="mailto:visa.sevenseas@gmail.com">visa.sevenseas@gmail.com</span></a>
							</div>
						</li>
						<li>
							<div class="icon">
								<span class="lnr-icon-location"></span>
							</div>
							<div class="text">
								<h6>Visit anytime</h6>
								<span>15A/44 B-8, W E A Partap Chamber-2, Saraswati Marg, Karol Bagh, New Delhi-110005</span>
							</div>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-xl-6 offset-xl-2 col-lg-6">
				<div class="sec-title">
					<span class="sub-title">Send us email</span>
					<h2>Feel free to write</h2>
				</div>

				<form id="contact_form" name="contact_form" class="sort-form" action="includes/sendmail.php" method="post">
					<div class="row">
						<div class="col-sm-6">
							<div class="mb-3">
								<input name="form_name" class="form-control" type="text" placeholder="Enter Name">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="mb-3">
								<input name="form_email" class="form-control required email" type="email" placeholder="Enter Email">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="mb-3">
								<input name="form_subject" class="form-control required" type="text" placeholder="Enter Subject">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="mb-3">
								<input name="form_phone" class="form-control" type="text" placeholder="Enter Phone">
							</div>
						</div>
					</div>
					<div class="mb-3">
						<textarea name="form_message" class="form-control required" rows="7" placeholder="Enter Message"></textarea>
					</div>
					<div class="mb-3">
						<input name="form_botcheck" class="form-control" type="hidden" value="">
						<button type="submit" class="theme-btn btn-style-one" data-loading-text="Please wait..."><span class="btn-title">Send message</span></button>
						<button type="reset" class="theme-btn btn-style-one bg-theme-color5"><span class="btn-title">Reset</span></button>
					</div>
				</form>

			</div>
			
		</div>
	</div>
</section>


<section>
	<div class="container-fluid p-0">
		<div class="row">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3501.423933494803!2d77.18572177445293!3d28.647022575656823!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d02992ef8dccb%3A0xe3f5d8f53d187a68!2sPratap%20Chambers%202%2C%20Saraswati%20Marg%2C%20Block%2015A%2C%20WEA%2C%20Karol%20Bagh%2C%20Delhi%2C%20110005!5e0!3m2!1sen!2sin!4v1709198642653!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
		</div>
	</div>
</section>

<?php include('includes/footer.php') ?>