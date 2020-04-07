<footer class="footer-site" id="footer">
    <div class="container">
        <div class="footer-top">
            <div class="row align-items-center text-center text-lg-left">
                <div class="col-lg-4 mb-2 mb-lg-0"><img src="/front/images/VID.png" alt="VID"></div>
                <div class="col-lg-8">

                    <ul class="nav-footer">
                        <li class="pl-4"><a href="#">Политика конфиценциальности</a></li>
                        <li><a href="#">Пользовательское соглашение</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-middle">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-6 col-md-4">
                            <h3 class="title-footer">Аккаунт</h3>
                            <ul class="links-footer">
                                @auth
                                    <li><a href="{{ route('site.account.index') }}">Мой кабинет</a></li>
                                @endauth
                                @guest
                                    <li><a href="#">Войти</a></li>
                                    <li><a href="#">Создать аккаунт</a></li>
                                @endguest
                            </ul>
                        </div>
                        <div class="col-6 col-md-4">
                            <h3 class="title-footer">Конкурсы</h3>
                            <ul class="links-footer">
                                <li><a href="#">Создание конкурса</a></li>
                                <li><a href="#">Каталог конкурсов</a></li>
                            </ul>
                        </div>
                        <div class="col-6 col-md-4">
                            <h3 class="title-footer">Компания</h3>
                            <ul class="links-footer">
                                <li><a href="#">О нас</a></li>
                                <li><a href="{{ route('site.blog.index') }}">Блог</a></li>
                                <li><a href="#">Контакты</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="newsletter">
                        <h3 class="title-footer">Рассылка</h3>
                        <p>Подпишись на <span class="name"><span>V</span>ID</span> и получай на уведомления о
                            новостях и акциях.</p>
                        <div class="form">
                            <input class="form-control" type="text" placeholder="Введите email адресс">
                            <button><i class="fa fa-envelope"></i></button>
                        </div>
                    </div>
                    <ul class="social-footer">
                        <li><a href="https://t.me/gde_podeshevle"><i class="fab fa-telegram"></i></a></li>
                        <li><a href="https://www.instagram.com/vid.market/"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-bottom d-md-flex text-center justify-content-between">
            <div class="copyright">© {{ now()->year }} <span class="text-green">V</span><span class="text-white">ID.</span>
                Спроектировано <span class="text-white">VID STUDIO</span>. Все права защищены.
            </div>
        </div>
    </div>
</footer>
