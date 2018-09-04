<?php $title = 'A Propos'; ?>

<?php ob_start(); ?>
<article class="col-md-12">
    <div>
        <img class="float-right d-block" src="./public/images/visage1.png" alt="ma tete" />

        <h2 class="text-center">
            A propos...
        </h2>
        <p>
            Donec varius et turpis convallis tincidunt. Fusce vulputate, mauris in vestibulum placerat, ante justo iaculis est, ut accumsan lectus velit id nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Fusce sit amet nisi sit amet nisi imperdiet elementum. Phasellus tortor dolor, aliquet sit amet posuere eu, viverra vel eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut sollicitudin consequat nisl, nec consequat ante accumsan non. Sed volutpat dolor id felis dapibus, vitae sodales nulla posuere. Morbi in ligula nulla.
        </p>
        <p>
            Morbi mi justo, dictum eget mollis nec, venenatis vitae magna. Maecenas maximus massa at neque pulvinar placerat. Ut a interdum dui. Maecenas congue erat vitae mauris faucibus, et consequat dui facilisis. Donec pulvinar mauris posuere, sagittis ipsum at, bibendum tellus. Sed at consequat mi. In urna magna, tempor nec quam ut, sodales sagittis tortor. Nunc pharetra feugiat laoreet. Praesent convallis ac orci eu euismod.
        </p>
    </div>
    <div>
        <h2 class="text-center">
            Bibliographie
        </h2>
        <p>
            Proin non velit nibh. Suspendisse id ipsum scelerisque, sollicitudin nunc ac, convallis tortor. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Suspendisse in rhoncus purus. Integer ut quam ut elit imperdiet viverra vel a tellus. Mauris purus dui, laoreet quis porta vitae, congue vel orci. Nullam consectetur mollis lorem, sit amet mollis tortor. Ut sed varius purus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec auctor massa eu sagittis venenatis. Donec sed sem sed nisl interdum rutrum ac at mauris. Donec vulputate convallis nunc et viverra. Pellentesque placerat diam quis dignissim luctus. Nam nec ultricies erat, eget fermentum mi.
        </p>
    </div>
    <div>
        <h2 class="text-center">
            Filmographie
        </h2>
        <p>
            Pellentesque nulla orci, congue sed magna id, ultricies condimentum metus. Curabitur laoreet lacinia odio vitae scelerisque. Praesent leo ligula, luctus id neque eget, hendrerit porttitor metus. Phasellus at dapibus metus, vitae consectetur arcu. Quisque eget lectus viverra, euismod elit aliquam, varius lectus. Quisque scelerisque cursus nisi vitae efficitur. Quisque sit amet aliquam urna, vitae interdum diam. Ut et est orci. Ut vel purus lectus. Etiam pretium elit eu consectetur molestie. Fusce commodo mauris ante, sed ultricies augue volutpat vel. Fusce fermentum luctus pharetra.
        </p>
    </div>
</article>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>