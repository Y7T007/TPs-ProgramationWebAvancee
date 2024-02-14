<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>CV Generator</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/Application-Form.css">
    <link rel="stylesheet" href="assets/css/Multi-step-form.css">
    <link rel="stylesheet" href="assets/css/Navbar-Centered-Links-icons.css">
    <link rel="stylesheet" href="assets/css/Section-Title.css">
    <link rel="stylesheet" href="assets/css/Steps-Progressbar.css">
</head>

<body>
<nav class="navbar navbar-expand-md bg-body py-3">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="#"><span>Yassir WAHID (Y7T007)</span></a>
        <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-3">
            <span class="visually-hidden">Toggle navigation</span>
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navcol-3">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link active" href="#">TP-1</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Partie 1</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Partie 2</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="title-div" style="width: 509px;margin-top: 41px;">
    <h1>CV GENERATOR</h1>
</div>
<section style="margin-top: 44px;">
    <form action="expert.php" method="POST" enctype="multipart/form-data">

    <section></section>
    <div class="steps-progressbar">
        <ul>
            <li class="active">About</li>
            <li>Expertise</li>
            <li>Divers</li>
        </ul>
    </div>
    <h1 class="text-center text-capitalize" style="margin: 55px;">about</h1>
    <div class="container">
            <div class="form-group mb-3">
                <div class="row">
                    <div class="col">
                        <p><strong>First Name</strong>&nbsp;<span class="text-danger">*</span></p>
                        <input class="form-control" type="text" required="" name="firstName" placeholder="Ex. Yassir">
                    </div>
                    <div class="col">
                        <p><strong>Last Name</strong>&nbsp;<span class="text-danger">*</span></p>
                        <input class="form-control" type="text" required="" name="lastName" placeholder="Ex. Wahid">
                    </div>
                </div>
            </div>
            <div class="col" style="margin-top: 13px;margin-bottom: 25px;">
                <p><strong>Title</strong></p>
                <input class="form-control" type="text" required="" name="title" placeholder="Ex. Ensa Tetouan Computer Science's Student">
            </div>
                <div class="col" style="margin-top: 13px;margin-bottom: 25px;">
                    <p><strong>Description</strong></p><input class="form-control" type="text" required="" name="description" placeholder="Ex. Description">
                </div>
                <div class="form-group mb-3">
                    <div class="row">
                        <div class="col">
                            <p><strong>Date Of Birth</strong>&nbsp;<span class="text-danger">*</span></p><input class="form-control" type="date" required="" name="dob">
                        </div>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <p><strong>Email&nbsp;</strong><span class="text-danger">*</span></p><input class="form-control" type="email" name="email" placeholder="Ex. contact@yassir-wahid.tech">
                </div>
                <div class="form-group mb-3">
                    <p><strong>Phone (GSM)&nbsp;</strong><span class="text-danger">*</span></p><input class="form-control" type="tel" name="phone" placeholder="Ex. +212 612 345 678">
                </div>
                <div class="form-group mb-3">
                    <p><strong>Address&nbsp;</strong><span class="text-danger">*</span></p><input class="form-control" type="text" required="" name="address" placeholder="Ex. Room No-361, 33/1, 3rd Floor">
                </div>
                <div class="form-group mb-3"><p><strong>Your Picture </strong><span class="text-danger">*</span></p>
<div class="file">
            <!-- Upload image input-->
    <div class="form-group mb-3">
        <div class="file">
            <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                <input id="upload" type="file" onchange="readURL(this);" name="image" class="form-control border-0">
                <label id="upload-label" for="upload" class="font-weight-light text-muted">Choose file</label>
                <div class="input-group-append">
                    <label for="upload" class="btn btn-light m-0 rounded-pill px-4">
                        <i class="fa fa-cloud-upload mr-2 text-muted"></i>
                        <small class="text-uppercase font-weight-bold text-muted">Choose file</small>
                    </label>
                </div>
            </div>

            <!-- Uploaded image area -->
         
        </div>
    </div>

    <div class="justify-content-center d-flex form-group mb-3">
        <div id="submit-btn">
            <div class="row">
                <input class="btn btn-primary btn-light m-0 rounded-pill px-4" type="submit" style="min-width: 500px;" value="Next">
            </div>
        </div>
    </div>
    </form>
</section>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/Application-Form-Bootstrap-Image-Uploader.js"></script>
<script src="assets/js/Application-Form-submit-form.js"></script>
<script src="assets/js/Multi-step-form-script.js"></script>
<script>
    $(document).ready(function() {
    $('#application-form').on('submit', function(e) {
        e.preventDefault();
        // Add your form handling code here
        console.log('Form submitted');
    });
});
</script>
</body>

</html>