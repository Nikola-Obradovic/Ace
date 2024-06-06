Dropzone.autoDiscover = false;

// Initialize Dropzone
function initializeDropzone(selector, options) {
    const element = document.querySelector(selector);
    if (element) {
        new Dropzone(element, options);
    }
}


initializeDropzone("#my-dropzone", {
    url: "../includes/upload.php", // Set the url for your upload script
    uploadMultiple: true,
    parallelUploads: 10, // Number of files to upload in parallel
    maxFiles: 10, // Maximum number of files Dropzone will handle
    acceptedFiles: 'image/*', // Optional: Restrict file types (e.g., images only)

});

initializeDropzone("#my-dropzone-pfp", {
    url: "../includes/upload_pfp.php",
    uploadMultiple: false,
    parallelUploads: 1,
    maxFiles: 1,
    acceptedFiles: 'image/*',
});
