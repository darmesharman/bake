
<template>
        <header id="masthead" class="site-header">
            <div class="container">
                <div class="header-content">
                    <div class="site-branding">
                        <a href="/" class="custom-logo-link" rel="home" aria-current="page">
                            <img src="%D0%93%D0%BB%D0%B0%D0%B2%D0%BD%D0%B0%D1%8F%20%D1%81%D1%82%D1%80%D0%B0%D0%BD%D0%B8%D1%86%D0%B0%20-%20MyKid.kz_files/logo.png"
                                class="custom-logo" alt="MyKid.kz" width="218" height="62">
                        </a>
                    </div>
                    <nav class="menu-menu-1-container">
                        <ul id="menu-menu-1" class="site-menu">
                            <li id="menu-item-17"
                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-2 current_page_item menu-item-17">
                                <!-- <a href="/" aria-current="page">Главная</a> -->
                                    <router-link class="mr-4" to='/vue/home' exact>Главная</router-link>

                            </li>
                            <li id="menu-item-194"
                                class="menu-item menu-item-type-post_type_archive menu-item-object-company menu-item-194">
                               <!--  <a href="{{ route('companies.index') }}">Все компании</a> -->
                                    <router-link class="mr-4" to='/vue/companies' exact>Все компании</router-link>
                                    
                            </li>
                            <li id="menu-item-21"
                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-21">
                                <!-- <a href="https://mykid.init.kz/blog">Блог</a> -->
                                    <router-link class="mr-4" to='/vue/blog' exact>Блог</router-link>

                            </li>
                            <li id="menu-item-22"
                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-22">
                                <!-- <a href="#">Карта</a> -->
                                    <router-link class="mr-4" to='/vue/maps' exact>Карта</router-link>

                            </li>
                            <li id="menu-item-23"
                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-23">
                                 <!-- <a href="#">Контакты</a> -->
                                    <router-link class="mr-4" to='/vue/contacts' exact>Контакты</router-link>

                            </li>
                        </ul>
                    </nav>
                    <div class="btns">
                        
                        <div class="line">
                            <!-- <a href="{{ route('companies.create') }}" class="btn icon-add">Добавить компанию</a> -->1
                            <!-- <a href="https://mykid.init.kz/dashboard" class="btn bordered-theme icon-user">Личный кабинет</a> -->1
                        </div>

                    </div>

                   

                    
                </div>

                 <div class="nav-login">
                    <div class="nav-login-container">
                        
                        <form action="#">
                            <div class="data">
                                <label>Email or Phone</label>
                                <input type="text" required>
                            </div>
                            <div class="data">
                                <label>Password</label>
                                <input type="password" required>
                            </div>
                            <div class="btn">
                                <div class="inner"></div>
                                <button type="submit">
                                    login
                                </button>
                            </div>
                            <div class="signup-link">
                            Not a member? 
                                <a href="#">Signup now</a>
                            </div>
                        </form>
                    </div>
                    </div>

            
            </div>
        </header>
</template>



<script>

    export default {
        props: {

        },
        components: {
        },
        sockets: {
           
        },
        methods: {
         
      },
  mounted() {
  }
}
</script>

<style scoped>
 .nav-login {
     position: absolute;
     right:0;
     height: 240px;
     width: 180px;
     /* z-index:  999; */
     background-color: red;
 }
 
 .nav-login-container {
     
     position: relative;
     margin: 5px;
     padding: 5px;
     background-color:azure; overflow-wrap: break-word;
  box-shadow: 0 0 8px rgba(0,0,0,0.1);

     
 }

 .nav-login-form{
 }
 .nav-login-hidden {
     display: none;
 }

</style>
