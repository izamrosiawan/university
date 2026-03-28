<?php
?>
<footer class="footer">
    <div class="container footer-grid">
        <div>
            <h3><?php bloginfo('name'); ?></h3>
            <p>SDN Wonokromo III Surabaya berkomitmen menghadirkan pendidikan dasar yang unggul, aman, dan menyenangkan.</p>
        </div>
        <div>
            <h4>Menu Cepat</h4>
            <p><a href="<?php echo esc_url(home_url('/')); ?>">Beranda</a></p>
            <p><a href="<?php echo esc_url(home_url('/profil-sekolah')); ?>">Profil Sekolah</a></p>
            <p><a href="<?php echo esc_url(home_url('/program')); ?>">Program Unggulan</a></p>
            <p><a href="<?php echo esc_url(home_url('/galeri')); ?>">Galeri</a></p>
            <p><a href="<?php echo esc_url(home_url('/berita')); ?>">Berita & Pengumuman</a></p>
        </div>
        <div>
            <h4>Hubungi Kami</h4>
            <p>Jl. Wonokromo III No. 12, Surabaya</p>
            <p>Telp: (031) 555-1234</p>
            <p>Email: info@sdnwonokromo3.sch.id</p>
            <?php if (is_active_sidebar('footer-kontak')) : ?>
                <?php dynamic_sidebar('footer-kontak'); ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="container">
        <small>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Semua hak dilindungi.</small>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
