<?php $page = 'form-elements'; ?>
@extends('layout.mainlayout')
@section('content')
	<!-- ========================
		Start Page Content
	========================= -->

	<div class="page-wrapper">

		<!-- Start Content -->
		<div class="content">

			<!-- Page Header -->
			<div class="d-flex align-items-sm-center flex-sm-row flex-column gap-2 pb-3">
				<div class="flex-grow-1">
					<h4 class="fs-18 fw-semibold mb-0">Form Elements</h4>
				</div>

				<div class="text-end">
					<ol class="breadcrumb m-0 py-0">
						<li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
						
						<li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
						
						<li class="breadcrumb-item active">Form Elements</li>
					</ol>
				</div>
			</div>
			<!-- End Page Header -->
			
			<!-- start row -->
			<div class="row">
				<div class="col-xl-12">
					<div class="card">
						<div class="card-header">
							<h5 class="card-title">Input Types</h5>
						</div>
						<div class="card-body">
						
							<div class="row">
							
								<div class="col-lg-6">
									<div class="mb-3">
										<label for="input-label" class="form-label">Text</label>
										<input type="text" class="form-control" id="input">
									</div>
									<div class="mb-3">
										<label for="input-label" class="form-label">Form Input With Label</label>
										<input type="text" class="form-control" id="input-label">
									</div>
									<div class="mb-3">
										<label for="input-placeholder" class="form-label">Form Input With Placeholder</label>
										<input type="text" class="form-control" id="input-placeholder" placeholder="Placeholder">
									</div>
									<div class="mb-3">
										<label for="input-text" class="form-label">Type Text</label>
										<input type="text" class="form-control" id="input-text" placeholder="Text">
									</div>
									<div class="mb-3">
										<label for="input-number" class="form-label">Type Number</label>
										<input type="number" class="form-control" id="input-number" placeholder="Number">
									</div>
									<div class="mb-3">
										<label for="input-password" class="form-label">Type Password</label>
										<input type="password" class="form-control" id="input-password" placeholder="Password">
									</div>
									<div class="mb-3">
										<label for="input-email" class="form-label">Type Email</label>
										<input type="email" class="form-control" id="input-email" placeholder="Email@xyz.com">
									</div>
									<div class="mb-3">
										<label for="input-tel" class="form-label">Type Tel</label>
										<input type="tel" class="form-control" id="input-tel" placeholder="+1100-2031-1233">
									</div>
									<div class="mb-3">
										<label for="input-date" class="form-label">Type Date</label>
										<input type="date" class="form-control" id="input-date">
									</div>
									<div class="mb-3">
										<label for="input-week" class="form-label">Type Week</label>
										<input type="week" class="form-control" id="input-week">
									</div>
									<div class="mb-3">
										<label for="input-month" class="form-label">Type Month</label>
										<input type="month" class="form-control" id="input-month">
									</div>
									<div class="mb-3">
										<label for="input-time" class="form-label">Type Time</label>
										<input type="time" class="form-control" id="input-time">
									</div>
									<div class="mb-3">
										<label for="input-datetime-local" class="form-label">Type Datetime Local</label>
										<input type="datetime-local" class="form-control" id="input-datetime-local">
									</div>
									<div class="mb-3">
										<label for="text-area" class="form-label">Textarea</label>
										<textarea class="form-control" id="text-area" rows="4"></textarea>
									</div>

									<div class="mb-0">
										<label for="example-range" class="form-label">Range</label>
										<input class="form-range" id="example-range" type="range" name="range" min="0" max="100">
									</div>
								</div>
								
								<div class="col-lg-6">
									<div class="mb-3">
										<label for="input-search" class="form-label">Type Search</label>
										<input type="search" class="form-control" id="input-search" placeholder="Search">
									</div>
									<div class="mb-3">
										<label for="input-submit" class="form-label">Type Submit</label>
										<input type="submit" class="form-control" id="input-submit" value="Submit">
									</div>
									<div class="mb-3">
										<label for="input-reset" class="form-label">Type Reset</label>
										<input type="reset" class="form-control" id="input-reset">
									</div>
									<div class="mb-3">
										<label for="input-button" class="form-label">Type Button</label>
										<input type="button" class="form-control btn btn-primary" id="input-button" value="Button">
									</div>
									<div class="mb-3">
										<label class="form-label">Type Color</label>
										<input class="form-control form-input-color" type="color" value="#136bd0">
									</div>
									<div class="mb-3">
										<label for="input-file" class="form-label">Type File</label>
										<input class="form-control" type="file" id="input-file">
									</div>
									<div class="mb-3">
										<label class="form-label">Type Url</label>
										<input class="form-control" type="url" name="website" placeholder="http://example.com">
									</div>
									<div class="mb-3">
										<label for="input-disabled" class="form-label">Type Disabled</label>
										<input type="text" id="input-disabled" class="form-control" placeholder="Disabled input" disabled="">
									</div>
									<div class="mb-3">
										<label for="input-readonlytext" class="form-label">Input Readonly Text</label>
										<input type="text" readonly="" class="form-control-plaintext" id="input-readonlytext" value="email@example.com">
									</div>
									<div class="mb-3">
										<label for="disabled-readonlytext" class="form-label">Disabled Readonly Input
										</label>
										<input class="form-control" type="text" value="Disabled readonly input" id="disabled-readonlytext" aria-label="Disabled input example" disabled="" readonly="">
									</div>
									<div class="mb-3">
										<label class="form-label">Type Readonly Input</label>
										<input class="form-control" type="text" value="Readonly input here..." aria-label="readonly input example" readonly="">
									</div>
									<div class="mb-3">
										<label for="input-DataList" class="form-label">Datalist example</label>
										<input class="form-control" list="datalistOptions" id="input-DataList" placeholder="Type to search...">
										<datalist id="datalistOptions">
											<option value="San Francisco">
											</option>
											<option value="New York">
											</option>
											<option value="Seattle">
											</option>
											<option value="Los Angeles">
											</option>
											<option value="Chicago">
											</option>
										</datalist>
									</div>

										<div class="mb-3">
											<label for="example-select" class="form-label">Input Select</label>
											<select class="form-select" id="example-select">
												<option>1</option>
												<option>2</option>
												<option>3</option>
												<option>4</option>
												<option>5</option>
											</select>
										</div>

										<div class="mb-3">
											<label for="example-multiselect" class="form-label">Multiple Select</label>
											<select id="example-multiselect" multiple class="form-control">
												<option>1</option>
												<option>2</option>
												<option>3</option>
												<option>4</option>
												<option>5</option>
											</select>
										</div>
									<div class="mb-0">
										<label for="example-helping" class="form-label">Helping text</label>
										<input type="text" id="example-helping" class="form-control mb-1" placeholder="Helping text">
										<span class="help-block"><small>A block of help text that breaks onto a new line and may extend beyond one line.</small></span>
									</div>
								</div>
								
							</div>
						</div> <!-- end card-body -->
					</div> <!-- end card -->
				</div> <!-- end col -->

				<div class="col-xl-6">
					<div class="card card-h-100">
						<div class="card-header">
							<h5 class="card-title">Input Shapes</h5>
						</div>
						<div class="card-body">
							<div class="row gy-3">
								<div class="col-xl-12">
									<label for="input-noradius" class="form-label">Input With No Radius</label>
									<input type="text" class="form-control rounded-0" id="input-noradius" placeholder="No Radius">
								</div>
								<div class="col-xl-12">
									<label for="input-rounded" class="form-label">Input With Radius</label>
									<input type="text" class="form-control" id="input-rounded" placeholder="Default Radius">
								</div>
								<div class="col-xl-12">
									<label for="input-rounded-pill" class="form-label">Rounded Input</label>
									<input type="text" class="form-control rounded-pill" id="input-rounded-pill" placeholder="Rounded">
								</div>
							</div>
						</div> <!-- end card-body -->
					</div> <!-- end card -->
				</div> <!-- end col -->

				<div class="col-xl-6">
					<div class="card">
						<div class="card-header">
							<h5 class="card-title">Disabled forms</h5>
						</div>
						<div class="card-body">
							<form>
								<div class="mb-3">
									<label for="disabledTextInput" class="form-label">Disabled input
									</label>
									<input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input">
								</div>
								<div class="mb-3">
									<label for="disabledSelect" class="form-label">Disabled select menu
									</label>
									<select id="disabledSelect" class="form-select">
										<option>Disabled select</option>
									</select>
								</div>
								<div class="mb-3">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" id="disabledFieldsetCheck" disabled="">
										<label class="form-check-label" for="disabledFieldsetCheck">
											Can't check this
										</label>
									</div>
								</div>
								<div class="mb-3">
									<div class="form-check">
										<input class="form-check-input" type="radio" id="disabledFieldsetRadio" disabled="">
										<label class="form-check-label" for="disabledFieldsetRadio">
											Can't check this
										</label>
									</div>
								</div>
								<button type="submit" class="btn btn-primary">Submit</button>
							</form>
						</div> <!-- end card-body -->
					</div> <!-- end card -->
				</div> <!-- end col -->

				<div class="col-xl-6">
					<div class="card card-h-100">
						<div class="card-header">
							<h5 class="card-title">Input Sizing</h5>
						</div>
						<div class="card-body">
							<input class="form-control form-control-sm mb-3" type="text" placeholder=".form-control-sm" aria-label=".form-control-sm example">
							<input class="form-control mb-3" type="text" placeholder="Default input" aria-label="default input example">
							<input class="form-control form-control-lg" type="text" placeholder=".form-control-lg" aria-label=".form-control-lg example">
						</div> <!-- end card-body -->
					</div> <!-- end card -->
				</div> <!-- end col -->

				<div class="col-xl-6">
					<div class="card">
						<div class="card-header">
							<h5 class="card-title">File Input</h5>
						</div>
						<div class="card-body">
							<form>
								<div class="mb-3">
									<label for="formFile" class="form-label">Default file input example</label>
									<input class="form-control" type="file" id="formFile">
								</div>
								<div class="mb-3">
									<label for="formFileMultiple" class="form-label">Multiple files input example</label>
									<input class="form-control" type="file" id="formFileMultiple" multiple>
								</div>
								<div class="mb-3">
									<label for="formFileDisabled" class="form-label">Disabled file input example</label>
									<input class="form-control" type="file" id="formFileDisabled" disabled>
								</div>
								<div class="mb-3">
									<label for="formFileSm" class="form-label">Small file input example</label>
									<input class="form-control form-control-sm" id="formFileSm" type="file">
								</div>
								<div>
									<label for="formFileLg" class="form-label">Large file input example</label>
									<input class="form-control form-control-lg" id="formFileLg" type="file">
								</div>
							</form>
						</div> <!-- end card-body -->
					</div> <!-- end card -->
				</div> <!-- end col -->

			</div>
			<!-- end row -->

		</div> <!-- End Content -->

		@component('components.footer')
		@endcomponent

	</div>

	<!-- ========================
		End Page Content
	========================= -->
@endsection