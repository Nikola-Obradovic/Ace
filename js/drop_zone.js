Dropzone.autoDiscover = false;

// Initialize Dropzone
let myDropzone = new Dropzone("#my-dropzone", {
    url: "../includes/upload.php", // Set the url for your upload script
    uploadMultiple: true,
    parallelUploads: 10, // Number of files to upload in parallel
    maxFiles: 10, // Maximum number of files Dropzone will handle
    acceptedFiles: 'image/*', // Optional: Restrict file types (e.g., images only)

});
