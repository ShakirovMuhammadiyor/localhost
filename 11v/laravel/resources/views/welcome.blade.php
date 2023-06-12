<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.3/css/bootstrap.min.css" integrity="sha512-oc9+XSs1H243/FRN9Rw62Fn8EtxjEYWHXRvjS43YtueEewbS6ObfXcJNyohjHqVKFPoXXUxwc+q1K7Dee6vv9g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.3/js/bootstrap.min.js" integrity="sha512-8qmis31OQi6hIRgvkht0s6mCOittjMa9GMqtK9hes5iEQBQE/Ca6yGE5FsW36vyipGoWQswBj/QBm2JR086Rkw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <style>body{margin-top:20px;background:#f5f5f5}.blog-post{-webkit-transition:.2s cubic-bezier(.68, -.55, .27, 1.55);transition:.2s cubic-bezier(.68, -.55, .27, 1.55)}.blog-post .blog-img .overlay,.blog-post .blog-img .post-meta{position:absolute;opacity:0;-webkit-transition:.2s;transition:.2s}.blog-post .blog-img .overlay{top:0;right:0;bottom:0;left:0}.blog-post .blog-img .post-meta{bottom:5%;right:5%;z-index:1}.blog-post .blog-img .post-meta .read-more:hover,.blog-post .content .author .name:hover,.blog-post .content .title:hover{color:#6dc77a!important}.blog-post .content h1,.blog-post .content h2,.blog-post .content h3,.blog-post .content h4,.blog-post .content h5,.blog-post .content h6{line-height:1.2}.blog-post .content .title{font-size:18px}.blog-post:hover{-webkit-box-shadow:0 0 5px rgba(0,0,0,.15);box-shadow:0 0 5px rgba(0,0,0,.15)}.blog-post:hover .blog-img .overlay{opacity:.65}.blog-post:hover .blog-img .post-meta{opacity:1}.blog-post .post-meta .like i,.profile-post .like i{-webkit-text-stroke:2px #dd2427;-webkit-text-fill-color:transparent}.blog-post .post-meta .like:active i,.blog-post .post-meta .like:focus i,.profile-post .like:active i,.profile-post .like:focus i{-webkit-text-stroke:0px #dd2427;-webkit-text-fill-color:#dd2427}.avatar.avatar-ex-sm{height:36px}.shadow{-webkit-box-shadow:0 0 5px rgba(0,0,0,.15)!important;box-shadow:0 0 5px rgba(0,0,0,.15)!important}.para-desc{max-width:600px}.text-muted{color:#8492a6!important}.section-title .title{letter-spacing:.5px;font-size:30px}</style>
    <div class="container mt-100" style="margin-top: 50px;">
    <div class="row">
        <div class="col-12 text-center">
            <div class="section-title mb-4 pb-2">
                <h4 class="title mb-4">{{ __("Latest Blog") }}</h4>
                <p class="text-muted para-desc mx-auto mb-0">
                    @foreach ($languages as $lang_name => $lang_prefix)
                        <a href="{{ url('/'.$lang_prefix) }}" class="mr-2">{{ __($lang_name." (".strtoupper($lang_prefix).")") }}</a>
                    @endforeach
                </p>
            </div>
        </div><!--end col-->
    </div><!--end row-->

    <div class="row">
        @foreach ($data as $item)
            <div class="col-lg-4 col-md-6 mt-4 pt-2">
                <div class="blog-post rounded border">
                    <div class="blog-img d-block overflow-hidden position-relative">
                        <img src="{{ $item->image }}" class="img-fluid rounded-top" alt="">
                        <div class="overlay rounded-top bg-dark"></div>
                    </div>
                    <div class="content p-3">
                        <small><a class="text-primary">{{ $item->subject }}</a></small>
                        <h4 class="mt-2"><a class="text-dark title">{{ $item->title }}</a></h4>
                        <p class="text-muted mt-2">{{ $item->body }}</p>
                    </div>
                </div><!--end blog post-->
            </div><!--end col-->
        @endforeach
    </div><!--end row-->
</div>
</body>
</html>