<?php 
echo"<script>
    window.onload = function () {
        // Get the last part of the current path (everything after the last slash)
        const currentPath = window.location.pathname.substring(window.location.pathname.lastIndexOf(\'/\') + 1);

        const buttons = document.querySelectorAll(\'.button\');

        buttons.forEach(button => {
            const link = button.querySelector(\'a\');

            if (link) {
                // Get the last part of the href path
                const linkPath = new URL(link.getAttribute(\'href\'), window.location.origin).pathname;
                const linkLastPart = linkPath.substring(linkPath.lastIndexOf(\'/\') + 1);

                // Compare the last parts of the paths
                if (linkLastPart === currentPath) {
                    button.classList.add(\'active\');
                } else {
                    button.classList.remove(\'active\');
                }
            }
        });
    };</script>"

?>