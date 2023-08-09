$(document).ready(function () {
    const initializeAttachment = () => {
        const attachmentInput = document.getElementById("attachmentInput");
        const attachmentPreview = document.querySelector(".attachment-preview");
        const removeAllButton = document.getElementById("removeAllButton");
        let selectedFilesArray = []; // Array to store selected files

        function handleFileInputChange(event) {
            const files = event.target.files;
            attachmentPreview.innerHTML = ""; // Clear existing previews
            selectedFilesArray = []; // Reset the selected files array

            if (files.length > 0) {
                // Show the attachment preview div and Remove All button if files are selected
                attachmentPreview.style.display = "flex";
                removeAllButton.style.display = "block";
            } else {
                // Hide the attachment preview div and Remove All button if no files are selected
                attachmentPreview.style.display = "none";
                removeAllButton.style.display = "none";
            }

            for (const file of files) {
                const reader = new FileReader();

                reader.onload = (e) => {
                    const filePreview = document.createElement("div");
                    filePreview.classList.add("file-preview-item");

                    const imagePreview = document.createElement("img");
                    imagePreview.src = e.target.result;
                    imagePreview.classList.add("attachment-image");
                    imagePreview.style.maxWidth = "100px"; // Adjust image max-width
                    imagePreview.style.maxHeight = "100px"; // Adjust image max-height

                    const fileName = document.createElement("span");
                    fileName.textContent = file.name;
                    fileName.style.textAlign = "center"; // Center the file name

                    filePreview.appendChild(imagePreview);
                    filePreview.appendChild(fileName);

                    // Adjust file preview item styles
                    filePreview.style.display = "flex";
                    filePreview.style.flexDirection = "column";
                    filePreview.style.alignItems = "left";
                    filePreview.style.gap = "5px";

                    attachmentPreview.appendChild(filePreview);
                    selectedFilesArray.push(file);

                    // Check if the number of selected files exceeds the limit
                    const maxFiles = 2;
                    if (selectedFilesArray.length > maxFiles) {
                        // Show SweetAlert error
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "You can only select up to two files.",
                        });
                        // Clear the selected files
                        removeAllPreviews();
                    }
                };

                reader.readAsDataURL(file);
            }
        }

        function removeAllPreviews() {
            attachmentPreview.innerHTML = ""; // Clear all previews
            attachmentPreview.style.display = "none"; // Hide the attachment preview div
            removeAllButton.style.display = "none"; // Hide the Remove All button
            attachmentInput.value = ""; // Clear the file input value (optional, to reset the input)
            selectedFilesArray = []; // Reset the selected files array
            updateAttachmentInput();
        }

        function updateAttachmentInput() {
            const dataTransfer = new DataTransfer();
            for (const file of selectedFilesArray) {
                dataTransfer.items.add(file);
            }
            attachmentInput.files = dataTransfer.files;
        }

        attachmentInput.addEventListener("change", handleFileInputChange);
        removeAllButton.addEventListener("click", removeAllPreviews);
    };

    // Call the function to initialize the attachment behavior
    initializeAttachment();
});
