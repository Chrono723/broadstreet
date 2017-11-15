<template>
    <div class="total-drop-zone">
        <!-- DropZone -->
        <div class="drop-zone-container" id="input-hidden">
            <div class="drop-zone-form  OverLord-Shadow-Main Ol-Panel-Dark-Cyan-Dotted">
                <form enctype="multipart/form-data"
                      v-bind:action="url"
                      method="POST"
                      class="dropzone image-manager__dropzone"
                      :id="paramName"
                >
                    <div class="fallback">
                        <input name="file" type="file" multiple />
                    </div>
                    <input v-if="requestMethod ==='PUT'" type="hidden" name="_method" value="PUT">
                </form>
            </div>
        </div>

        <!-- Preview Box -->
        <div v-show="showPreview === true" class="preview-container">
            <div class="drop-zone-form  OverLord-Shadow-Main Ol-Panel-Dark-Cyan-Dotted">
                <div id="Preview" class="Preview">
                    <div class="preview-text">
                        <span class="preview-title-text"> Name: </span>{{fileInfo.name}}
                    </div>
                    <div class="preview-text">
                        <span class="preview-title-text"> Size: </span>{{fileInfo.size}}
                    </div>
                    <div class="preview-text">
                        <span class="preview-title-text"> status: </span>{{fileInfo.status}}
                    </div>
                    <div class="preview-text">
                        <span class="preview-title-text"> type: </span>{{fileInfo.type}}
                    </div>

                </div>
            </div>

        </div>

    </div>

</template>

<script>

    export default{
        props:{
            'url':{type: String, required: true},
            'param-name':{type: String, required: true },
            'main-form':{'default': null},

            'request-method':{type: String, 'default': 'POST' },
            'max-filesize':{type: Number, 'default': 1024 },
            'accepted-files':{type: String, 'default': null },
            'auto-process-queue':{type: Boolean, 'default': true},
            'upload-multiple':{type: Boolean, 'default': false},
            'previews-container':{type: String, 'default': null},
            'hidden-input-container':{type: String, 'default': '#input-hidden'},
            'max-files':{type: Number, 'default': 1},
            'method':{type: String, 'default': 'POST'},
            'create-image-thumbnails':{type: Boolean, 'default': true},
            'max-thumbnail-filesize':{type: Number, 'default': 10},
            'thumbnail-width':{type: Number, 'default': 120},
            'thumbnail-height':{type: Number, 'default': 120},
            'thumbnail-method':{type: String, 'default': 'crop'},
            'resize-width':{type: [Number, null], 'default': null},
            'resize-height':{type: [Number, null], 'default': null},
            'resize-mime-type':{type: [String, null], 'default': null},
            'resizeQuality':{type: Number, 'default': .8},
            'resize-method':{type: String, 'default': 'contain'},
            'filesize-base':{type: Number, 'default': 1000},
            'params':{type: Object, 'default': function(){}},
            'clickable':{type: Boolean, 'default': true},
            'ignore-hidden-files':{type: String, 'default': 'yes'},
            'auto-queue':{type: String, 'default': 'on'},
            'add-remove-links':{type: String, 'default': 'on'},
            'capture':{'default': null},
            'rename-file':{'default': null},
            'force-fallback':{'default': false},

            'dict-default-message':{type: String, 'default': 'Drop files here to upload'},
            'dict-fallback-message':{type: String, 'default': "Your browser does not support drag'n'drop file uploads."},
            'dict-fallback-text':{type: String, 'default': 'Please use the fallback form below to upload your files like in the olden days.'},
            'dict-file-too-big':{type: String, 'default': "File is too big ({{filesize}}MiB). Max filesize: {{maxFilesize}}MiB."},
            'dict-invalid-file-type':{type: String, 'default': "You can't upload files of this type."},
            'dic-response-error':{type: String, 'default': "Server responded with {{statusCode}} code."},
            'dict-cancel-upload':{type: String, 'default': "Cancel upload"},
            'dict-cancel-upload-confirmation':{type: String, 'default': "Are you sure you want to cancel this upload?"},
            'dict-remove-file':{type: String, 'default': "Remove file"},
            'dict-remove-file-confirmation':{ 'default': null},
            'dict-max-files-exceeded':{type: String, 'default': "You can not upload any more files."},
            //'dict-file-size-units':{ 'default': { tb: "TB", gb: "GB", mb: "MB", kb: "KB", b: "b" }},

        } ,
        data(){
            return{
                DropZone: null,
                csrfToken: document.head.querySelector('meta[name="csrf-token"]').content,
                csrfHeader: {'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content},
                showPreview: false,
                fileInfo:{
                    name:null,
                    size:null,
                    status:null,
                    type:null,
                    width: null,
                    height: null,
                }
            }
        },
        mounted(){
            this.initDropzone(this);

        },
        methods:{
            initDropzone: function(component) {
                component.DropZone =  new Dropzone("#"+ component.paramName, {
                    paramName: component.paramName,
                    maxFilesize: component.maxFilesize,
                    acceptedFiles: component.acceptedFiles,
                    autoProcessQueue: component.autoProcessQueue,
                    uploadMultiple: component.uploadMultiple,
                    method: component.method,
                    previewsContainer: component.previewsContainer,
                    hiddenInputContainer: component.hiddenInputContainer,
                    maxFiles: component.maxFiles,
                    headers: component.csrfHeader,
                    createImageThumbnails: component.createImageThumbnails,
                    maxThumbnailFilesize: component.maxThumbnailFilesize,
                    thumbnailWidth: component.thumbnailWidth,
                    thumbnailHeight: component.thumbnailHeight,
                    thumbnailMethod: component.thumbnailMethod,
                    resizeWidth: component.resizeWidth,
                    resizeHeight: component.resizeHeight,
                    resizeMimeType: component.resizeMimeType,
                    resizeQuality: component.resizeQuality,
                    resizeMethod: component.resizeMethod,
                    filesizeBase: component.filesizeBase,
                    params: component.params,
                    clickable: component.clickable,
                    ignoreHiddenFiles: component.ignoreHiddenFiles,
                    autoQueue: component.autoQueue,
                    addRemoveLinks: component.addRemoveLinks,
                    capture: component.capture,
                    renameFile: component.renameFile,
                    forceFallback: component.forceFallback,
                    dictDefaultMessage: component.dictDefaultMessage,
                    dictFallbackMessage: component.dictFallbackMessage,
                    dictFallbackText: component.dictFallbackText,
                    dictFileTooBig: component.dictFileTooBig,
                    dictInvalidFileType: component.dictInvalidFileType,
                    dictResponseError: component.dictResponseError,
                    dictCancelUpload: component.dictCancelUpload,
                    dictCancelUploadConfirmation: component.dictCancelUploadConfirmation,
                    dictRemoveFile: component.dictRemoveFile,
                    dictRemoveFileConfirmation: component.dictRemoveFileConfirmation,
                    dictMaxFilesExceeded: component.dictMaxFilesExceeded,
                    //dictFileSizeUnits: component.dictFileSizeUnits,

                    init: function() {
                        console.log('Drop Zone Initialized');
                        this.on("addedfile", function (file) {
                            // Display File information before Uploading.
                        });
                        this.on("sending", function(file, xhr, formData) {
                            // Attach Data to the form to send out within the request.
                            formData.append("image",'cover_art');
                            formData.append("image_file", file);
                            formData.append("image_name", file.name);

                            formData.append("beatName", component.mainForm.beatName.text);
                            formData.append("beatIsEnabled", component.mainForm.beatIsEnabled.data);
                            formData.append("beatIsHighQuality", component.mainForm.beatIsHighQuality.data);
                            formData.append("beatArtist", component.mainForm.beatArtist.text);
                            formData.append("beatDescription", component.mainForm.beatDescription.text);
                            formData.append("beatType", component.mainForm.beatType.data);
                            formData.append("beatGenre", component.mainForm.beatGenre.data);
                            formData.append("beatBitRate", component.mainForm.beatBitRate.data);
                            formData.append("beatSampleRate", component.mainForm.beatSampleRate.data);
                        });
                        this.on("totaluploadprogress", function (progress) {
                            console.log("progress ", progress);
                        });
                        this.on("queuecomplete", function(){
                            console.log('File queue complete');
                        });
                    },
                    success: function(file, response){
                        console.log("Successfully uploaded");
                        component.$emit('StatusResponse', response);
                    },
                    accept: function(file, done){
                        component.showPreview = true;
                        component.fileInfo.name = file.name;
                        component.fileInfo.size = file.size;
                        component.fileInfo.status = file.status;
                        component.fileInfo.type = file.type;
                        component.fileInfo.width = file.width;
                        component.fileInfo.height = file.height;
                        done();
                    },
                    error: function(file, response){
                        console.log('error!', response)
                    }

                });

            }
        }
    }
</script>
