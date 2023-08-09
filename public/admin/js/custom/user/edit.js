$(document).ready(function () {
    const initializeEditAttachment = () => {
        const editAttachmentInput = document.getElementById(
            "edit_attachmentInput"
        );
        const editAttachmentPreview = document.querySelector(
            ".edit_attachment-preview"
        );
        const editRemoveAllButton = document.getElementById(
            "edit_removeAllButton"
        );
        let selectedEditFilesArray = []; // Array to store selected files

        function handleEditFileInputChange(event) {
            const files = event.target.files;
            editAttachmentPreview.innerHTML = ""; // Clear existing previews
            selectedEditFilesArray = []; // Reset the selected files array

            if (files.length > 0) {
                // Show the attachment preview div and Remove All button if files are selected
                editAttachmentPreview.style.display = "flex";
                editRemoveAllButton.style.display = "block";
            } else {
                // Hide the attachment preview div and Remove All button if no files are selected
                editAttachmentPreview.style.display = "none";
                editRemoveAllButton.style.display = "none";
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

                    editAttachmentPreview.appendChild(filePreview);
                    selectedEditFilesArray.push(file);

                    // Check if the number of selected files exceeds the limit
                    const maxFiles = 2;
                    if (selectedEditFilesArray.length > maxFiles) {
                        // Show SweetAlert error
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "You can only select up to two files.",
                        });
                        // Clear the selected files
                        removeAllEditPreviews();
                    }
                };

                reader.readAsDataURL(file);
            }
        }

        function removeAllEditPreviews() {
            editAttachmentPreview.innerHTML = ""; // Clear all previews
            editAttachmentPreview.style.display = "none"; // Hide the attachment preview div
            editRemoveAllButton.style.display = "none"; // Hide the Remove All button
            editAttachmentInput.value = ""; // Clear the file input value (optional, to reset the input)
            selectedEditFilesArray = []; // Reset the selected files array
            updateEditAttachmentInput();
        }

        function updateEditAttachmentInput() {
            const dataTransfer = new DataTransfer();
            for (const file of selectedEditFilesArray) {
                dataTransfer.items.add(file);
            }
            editAttachmentInput.files = dataTransfer.files;
        }

        editAttachmentInput.addEventListener(
            "change",
            handleEditFileInputChange
        );
        editRemoveAllButton.addEventListener("click", removeAllEditPreviews);
    };
    // Call the function to initialize the edit attachment behavior
    initializeEditAttachment();
});
