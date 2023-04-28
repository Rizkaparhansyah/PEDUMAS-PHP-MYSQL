<!DOCTYPE html>
<html>

<head>
    <title>PEDUMAS</title>
    <script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <link href="node_modules/flowbite/dist/flowbite.css" rel="stylesheet">
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
</head>

<body class="dark:bg-gray-700">