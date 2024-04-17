document.addEventListener("DOMContentLoaded", function() {
    const existingButton = document.getElementById('button');
    if (existingButton) {
        existingButton.addEventListener('click', function() {
            window.location.href = 'indani.php?name=' + animeName;
        });
    }
});
