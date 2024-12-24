// Select elements
const dropArea = document.getElementById('drop-area');
const fileInput = document.getElementById('file-input');
const previewArea = document.getElementById('preview');

// Handle click to open file browser
dropArea.addEventListener('click', () => fileInput.click());

// Handle file input change
fileInput.addEventListener('change', handleFiles);

// Prevent default behavior for all drag events
['dragenter', 'dragover', 'dragleave', 'drop'].forEach(event => {
    dropArea.addEventListener(event, (e) => {
        e.preventDefault(); // Prevent default browser behavior
        e.stopPropagation(); // Stop propagation to avoid unwanted triggers
    });
});

// Highlight drop area on dragover
dropArea.addEventListener('dragover', () => dropArea.classList.add('active'));

// Remove highlight on dragleave
dropArea.addEventListener('dragleave', () => dropArea.classList.remove('active'));

// Handle drop files
dropArea.addEventListener('drop', (e) => {
    dropArea.classList.remove('active');
    const files = e.dataTransfer.files; // Get dropped files
    if (files.length) {
        handleFiles({ target: { files } }); // Pass files to the handler
    }
});

// Process and preview files
function handleFiles(event) {
    const files = event.target.files;
    [...files].forEach(previewFile);
}

// Generate image previews
function previewFile(file) {
    const reader = new FileReader();
    reader.readAsDataURL(file);

    reader.onloadend = () => {
        const img = document.createElement('img');
        img.src = reader.result;
        previewArea.appendChild(img);
    };
}
