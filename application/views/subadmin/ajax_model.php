<script>
    // image validation
    function imageValidate(element, maxWidth, maxHeight, sizeKb) {
        const file = element.files[0];
        const maxSizeInKbytes = sizeKb * 1024; // Maximum file size allowed (5MB)
        const allowedTypes = ['image/jpeg', 'image/png', 'image/jpg']; // Allowed image types
        const fileType = file.type;
        if (!allowedTypes.includes(fileType)) {
            var nextSibling = element.nextElementSibling;
            nextSibling.textContent = 'Allowed types are: ' + allowedTypes.join(', ');
            element.value = '';
            return;
        }

        if (file.size > maxSizeInKbytes) {
            var nextSibling = element.nextElementSibling;
            nextSibling.textContent = 'Image size exceeds the maximum limit of ' + maxSizeInKbytes / 1024 + ' Kbytes.';
            element.value = '';
            return;
        }

        const reader = new FileReader();
        reader.onload = function(event) {
            const img = new Image();
            img.onload = function() {
                const width = this.width;
                const height = this.height;
                if (width <= maxWidth && height <= maxHeight) {
                    var nextSibling = element.nextElementSibling;
                    nextSibling.textContent = '';
                    return;
                } else {
                    var nextSibling = element.nextElementSibling;
                    nextSibling.textContent = `Image dimensions should not exceed ${maxWidth}x${maxHeight} pixels.`;
                    element.value = '';
                    return;
                }
            };
            img.src = event.target.result;
        };
        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>