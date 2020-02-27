<template>
    <form id="form1" runat="server">
        <section class="banner" role="banner">

            <header id="header">
                <div class="header-content clearfix">
                    <a class="logo" href="#contact">
                        <img src="images/logo.png" alt=""></a>
                    <nav class="navigation" role="navigation">
                        <ul class="primary-nav">
                            <li><a class="login" href="/reg">ورود/ثبت نام</a></li>
                        </ul>
                    </nav>
                    <a href="#contact" class="nav-toggle">منو<span></span></a>
                </div>
                <!-- header content -->
            </header>
            <!-- header -->

            <div class="container">
                <div class="col-md-10 col-md-offset-1">
                    <div class="banner-text text-center">
                        <h1>سامانه هواداری تیم های ملی فوتبال ایران</h1>
                    </div>
                    <!-- banner text -->
                </div>
            </div>
        </section>
        <!-- /banner -->

        <!-- Contact -->
        <section id="contact" class="space100">
            <div class="container">
                <div class="row">
                    <div class="headingsyle">
                        <h1><span>ثبت نام</span></h1>
                    </div>
                    <div class="text-center">
                        <h1>سامانه هواداری تیم های ملی فوتبال ایران</h1>
                        <h3>شما میتوانید از طریق دکمه های زیر ثبت نام کنید</h3>
                        <a href="/reg" class="btn btn-large login">ورود/ثبت نام</a> 
                    </div>
                </div>
                <!-- ./end row -->
                <div class="row">
                    <div class="col-md-12">
                        <div id="main-contact-form" class="contact-form">
                            <!-- form  بخش ثبت نام رو در این قسمت کپی کن-->

                            <!-- ./form -->
                        </div>
                    </div>
                </div>
                <!-- ./end row -->
            </div>
        </section>
        <!-- End Contact -->


        <footer class="footer">
                <div class="footer-top">
                    <div class="container">
                        <div class="row">

                            <div class="footer-col col-md-4">
                                <h5>ارتباط با ما</h5>
                            <p>contactus</p>
                            </div>
                            <div class="footer-col col-md-4">

                            </div>
                            <div class="footer-col col-md-4">
                                <h5> درباره کمیته هواداری فوتبال</h5>
                            <p>aboutus</p>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- footer top -->
                <div class="footer-bottom">
                    <div class="container">
                        <div class="col-md-12">
                                <p>
                                    copyright
                                </p>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- footer -->
    </form>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
