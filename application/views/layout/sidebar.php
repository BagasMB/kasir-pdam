    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">


            <!-- Menu -->
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="<?= base_url('home') ?>" class="app-brand-link">
                        <i class="fa-regular fa-laugh-wink fa-2xl" style="font-size: xx-large;"></i>
                        <span class="app-brand-text text-primary demo menu-text fw-bolder ms-2"> pdam</span>
                    </a>

                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <!-- Dashboard -->
                    <?php $menu = $this->uri->segment(1);
                    $menu2 = $this->uri->segment(2); ?>
                    <li class="menu-item <?php if ($menu == 'home') {
                                                echo "active";
                                            } ?>">
                        <a href="<?= base_url('home') ?>" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Dashboard</div>
                        </a>
                    </li>

                    <li class="menu-header small text-uppercase"><span class="menu-header-text">Pelanggan</span></li>
                    <li class="menu-item <?php if ($menu == 'pelanggan') {
                                                echo "active";
                                            } ?>">
                        <a href="<?= base_url('pelanggan') ?>" class="menu-link">
                            <i class="menu-icon tf-icons fa-solid fa-people-line"></i>
                            <div data-i18n="Analytics">Daftar Pelanggan</div>
                        </a>
                    </li>
                    <?php if ($user['user_role'] == 'Kasir') : ?>
                        <li class="menu-header small text-uppercase"><span class="menu-header-text">Penggunaan Air</span></li>
                        <li class="menu-item  <?php if ($menu2 == 'input') {
                                                    echo "active";
                                                } ?>">
                            <a href="<?= base_url('penggunaanair/input') ?>" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-detail"></i>
                                <div data-i18n="Analytics">Input Penggunaan</div>
                            </a>
                        </li>
                        <li class="menu-item  <?php if ($menu2 == 'sudahBayar') {
                                                    echo "active";
                                                } ?>">
                            <a href="<?= base_url('penggunaanair/sudahBayar') ?>" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-detail"></i>
                                <div data-i18n="Analytics">Sudah Bayar</div>
                            </a>
                        </li>
                        <li class="menu-item <?php if ($menu2 == 'belumBayar') {
                                                    echo "active";
                                                } ?>">
                            <a href="<?= base_url('penggunaanair/belumBayar') ?>" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-detail"></i>
                                <div data-i18n="Analytics">Belum Bayar</div>
                            </a>
                        </li>

                        <li class="menu-header small text-uppercase"><span class="menu-header-text">Transaksi</span></li>
                        <li class="menu-item <?php if ($menu == 'transaksi') {
                                                    echo "active";
                                                } ?>">
                            <a href="<?= base_url('transaksi') ?>" class="menu-link">
                                <i class='menu-icon tf-icons bx bx-wallet'></i>
                                <div data-i18n="Analytics">Pembayaran</div>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if ($user['user_role'] == 'Admin') : ?>
                        <li class="menu-header small text-uppercase"><span class="menu-header-text">User</span></li>
                        <li class="menu-item <?php if ($menu == 'user') {
                                                    echo "active";
                                                } ?>">
                            <a href="<?= base_url('user') ?>" class="menu-link">
                                <i class="menu-icon tf-icons fa-solid fa-users"></i>
                                <div data-i18n="Analytics">Daftar User</div>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </aside>
            <!-- / Menu -->