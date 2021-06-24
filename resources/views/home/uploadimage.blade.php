@extends('layouts.app')
@section('content')

    <link href="/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="/css/fileinput-rtl.css" media="all" rel="stylesheet" type="text/css"/>
    <script src="/js/fileinput.js" type="text/javascript"></script>

    <script src="/js/locales/fa.js" type="text/javascript"></script>
    <script src="/js/themes/fa/theme.js" type="text/javascript"></script>
    <div id="wrap_all">
        <div class="dashboard chap_container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">خانه</a></li>
                    <li class="breadcrumb-item active"><a >آپلود فایل</a></li>
                </ol>
            </nav>
            <div id="chap_content">
                <div class="section">
                    <div class="chap_row">
                        <div class="file-loading">
                            <input id="file" name="images[]" type="file" multiple>
                            @csrf
                        </div>
                        <script>
                            var j = jQuery.noConflict();
                            
                            
                                j("#file").fileinput({
                                    theme: 'fa',
                                    language: 'fa',
                                    allowedFileExtensions: ['jpg'],
                                    uploadUrl: "{{ route('uploadfile2') }}",
                                    maxFileCount: 5,
                                    initialPreviewAsData: true, // identify if you are sending preview data only and not the raw markup
                                    initialPreviewFileType: 'image', // image is the default and can be overridden in config below
                                    initialPreview: <?php if($resimages != 1 ){echo $resimages ; }else{ echo '[]';}?>,
                                    initialPreviewConfig:[<?php
                                            if($urls != 1){
                                        foreach($urls as $url) {
                                                $urlss[] =$url;
                                                                                    }
                                        echo implode(',',$urlss);
                                        }?>]

                                });


                        </script>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="clearfix"></div>
    <div class="block - init block - border - color">
        <div class="row row - 70"></div>
    </div>
    <style>
        .file-input{
            width: 100%;
        }
        .file-drop-zone {
            margin: 0;
        }
        .delimg {
            position: absolute;
            left: 0%;
            z-index: 36;
            top: 50%;
            background: #0009;
            width: 100%;
            text-align: center;
            padding: 10px 0;
            color: #fff;
        }
        .delimg:hover {
            text-decoration: none;
            background:#000;
            color:#DFDADA
        }
     

        .krajee-default.file-preview-frame {
            width: 18.5%;
            -webkit-transition: all 1000ms ease;
            -moz-transition: all 1000ms ease;
            -ms-transition: all 1000ms ease;
            -o-transition: all 1000ms ease;
            transition: all 1000ms ease;
        }

        .krajee-default.file-preview-frame .kv-file-content {
            width: 100% !important;
            height: 160px;
        }
        .krajee-default.file-preview-frame:hover {
            box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22) !important;
        }

        .file-preview {
            border:none !important; 
        }
        .krajee-default .file-caption-info{direction: ltr;}
        .text-info.file-upload-stats {
    top: 15px;
    position: relative;
}

@media (max-width: 500px){
    
        .krajee-default.file-preview-frame {
            width: 100%;
        }
}




    </style>
@endsection